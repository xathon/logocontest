<?php
session_start();
include_once "helpers.php";

require __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::create(__DIR__, '.env');
$dotenv->load();
$dotenv->required(['DB_HOST', 'DB_NAME', 'DB_USER', 'DB_PASS', 'DB_PORT']);

$remote = mysqli_connect(getenv('DB_HOST'),
    getenv('DB_USER'),
    getenv('DB_PASS'),
    getenv('DB_NAME'));
if (mysqli_connect_errno()) {
    printf("Couldn't connect to database! %s\n", mysqli_connect_error());
    exit();
}

if(isset($_POST['selected'])) {
    //Store the Cantor number representing the IDs in the session.
    //Since ⟨k1, k2⟩ != ⟨k2, k1⟩, we always use the smaller ID as k1. That way we avoid duplicates.
    if($_POST['ID1'] < $_POST['ID2']) {
        array_push($_SESSION['completed'],cantor($_POST['ID1'],$_POST['ID2']));
    } else {
        array_push($_SESSION['completed'],cantor($_POST['ID2'],$_POST['ID1']));
    }

    $query = "UPDATE logos SET matchups = matchups + 1, won_matchups = won_matchups + 1 WHERE id = ";
    $query .= ($_POST['selected'] == $_POST['ID1'] ? $_POST['ID1'] : $_POST['ID2'])."; ";
    $q = mysqli_query($remote,$query);
    $query = "update logos set matchups = matchups + 1 where id = ";
    $query .= ($_POST['selected'] == $_POST['ID1'] ? $_POST['ID2'] : $_POST['ID1']).";";
    $q = mysqli_query($remote,$query);


    $query = "insert into matchups values ('" . $_POST['matchID'] . "', ";
    $query .= ($_POST['selected'] == $_POST['ID1'] ? $_POST['ID1'] : $_POST['ID2']).", ";
    $query .= ($_POST['selected'] == $_POST['ID1'] ? $_POST['ID2'] : $_POST['ID1']).",'";
    $query .= session_id()."',default);";
    $q = mysqli_query($remote,$query);

}

if(!isset($_SESSION['numberLogos'])){
    $query = "select count(id) from logos; ";
    $rCount = mysqli_query($remote,$query);
    $_SESSION['numberLogos'] = mysqli_fetch_assoc($rCount)['count(id)'];
    //echo "queried!";
}

if(!isset($_SESSION['completed'])){
    $_SESSION['completed'] = [];
}

if(!isset($_SESSION['highestID'])) {
    $query = "select id from logos order by id desc limit 1";
    $result = mysqli_query($remote,$query);
    $_SESSION['highestID'] = mysqli_fetch_assoc($result)['id'];
}


if(sizeof($_SESSION['completed']) > 20) {

    echo '<html>
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">

  <title>Redirecting...</title>
  <meta content="0; URL=thanks.php" http-equiv="refresh">
</head>
</html>';
    exit();
}

// To ensure that no logo pair is shown twice, we use a Cantor Pairing Function to store the information about the already shown pairs.
$imageID1=0;
$imageID2=0;
$maxcount= ($_SESSION['numberLogos'] * ($_SESSION['numberLogos'] - 1) / 2); //maximum retries, redundant?


for($i = 0; $i < $maxcount; $i++) {
    //get two different, random numbers
    do {
        $imageID1 = rand(1,$_SESSION['highestID']);
        $imageID2 = rand(1,$_SESSION['highestID']);

    } while ($imageID1 == $imageID2);

    // Check if Cantor value is in session variable
    if($imageID1 > $imageID2) {
        $tmp1 = $imageID2;
        $tmp2 = $imageID1;
    } else {
        $tmp1 = $imageID1;
        $tmp2 = $imageID2;
    }
    if(!in_array(cantor($tmp1,$tmp2),$_SESSION['completed'])) break;
}

$query = "select name,logo from logos where id = ".$imageID1." or id = ".$imageID2.";";
$rImg = mysqli_query($remote,$query);
if($imageID1 < $imageID2) {
    $Img1 = mysqli_fetch_assoc($rImg);
    $Img2 = mysqli_fetch_assoc($rImg);
} else {
    $Img2 = mysqli_fetch_assoc($rImg);
    $Img1 = mysqli_fetch_assoc($rImg);
}

if($Img1 == NULL || $Img2 == NULL) { //Workaround if a number has no associated ID in the database (e.g. a logo has been deleted)
    echo '<html>
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">

  <title>Redirecting...</title>
  <meta content="0; URL=vote.php" http-equiv="refresh">
</head>
</html>';
    exit();
}


echo '
<html>
<head>
    <link href="css/bootstrap.css" rel="stylesheet">
</head>
<body>
<div class="row">
    <div class="col-3">

    </div>
    <div class="col-6" style="text-align: center">
        <h1>Choose one!</h1>
        <h3>'.sizeof($_SESSION['completed']).'/20</h3>
    </div>

</div>
<div class="row">

    <form style="width: 100%" method="post">
    <div class="form-row">
        <div class="col-3">

    </div>
    <div class="col-3" style="text-align: center">
';



//image 1

echo '<input type="hidden" name="matchID" value="'.bin2hex(random_bytes(10)).'">';
echo '<input type="hidden" name="ID1" value="'.$imageID1.'">';
echo '<input type="hidden" name="ID2" value="'.$imageID2.'">';


echo '<div style="width: 100%"><img style="margin:20px" class="img-fluid" src="data:image/jpeg;base64,'.$Img1['logo'].'" width="50%" alt="'.$Img1['name'].'"></div>';
echo '<button class="btn btn-primary" type="submit" value="'.$imageID1.'" name="selected">'.$Img1['name'].'</button>';

echo '</div>
<div class="col-3" style="text-align: center;align-items: center">';
//image 2

echo '<div style="width: 100%"><img style="margin:20px" class="img-fluid" src="data:image/jpeg;base64,'.$Img2['logo'].'" width="50%" alt="'.$Img2['name'].'"></div>';
echo '<button class="btn btn-primary" type="submit" value="'.$imageID2.'" name="selected">'.$Img2['name'].'</button>';





echo '    </div>
    </div>
    </form>
</div>
</body>
</html>';
?>
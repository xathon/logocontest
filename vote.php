<?php
session_start();
include_once "helpers.php";
include_once "db_conn.php";

if(isset($_POST['selected'])) {
    //Store the Cantor number representing the IDs in the session.
    //Since ⟨k1, k2⟩ != ⟨k2, k1⟩, we always use the smaller ID as k1. That way we avoid duplicates.
    $alreadyInSession = false;
    if($_POST['ID1'] < $_POST['ID2']) {
         if(!in_array(cantor($_POST['ID1'],$_POST['ID2']),$_SESSION['completed'])) {
             array_push($_SESSION['completed'],cantor($_POST['ID1'],$_POST['ID2']));
         } else {
             $alreadyInSession = true;
         }

    } else {
        if(!in_array(cantor($_POST['ID2'],$_POST['ID1']),$_SESSION['completed'])) {
            array_push($_SESSION['completed'], cantor($_POST['ID2'], $_POST['ID1']));
        } else {
            $alreadyInSession = true;
        }
    }
    if(!$alreadyInSession) {
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

    unset($_POST);

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


if(sizeof($_SESSION['completed']) >= 20) {

    echo '<html lang="en">
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


do {
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

    $query = "select name,active from logos where id = ".$imageID1." or id = ".$imageID2.";";
    $rImg = mysqli_query($remote,$query);
    if($imageID1 < $imageID2) {
        $Img1 = mysqli_fetch_assoc($rImg);
        $Img2 = mysqli_fetch_assoc($rImg);
    } else {
        $Img2 = mysqli_fetch_assoc($rImg);
        $Img1 = mysqli_fetch_assoc($rImg);
    }
    unset($query);
} while ($Img1 == NULL || $Img2 == NULL || $Img1['active'] == 0 || $Img2['active'] == 0);


echo '
<html lang="en" prefix="og: https://ogp.me/ns#">
<head>
		<link rel="apple-touch-icon" sizes="180x180" href="https://elohell.gg/media/img/favicon/apple-touch-icon.png?v=1">
		<link rel="icon" type="image/png" sizes="32x32" href="https://elohell.gg/media/img/favicon/favicon-32x32.png?v=1">
		<link rel="icon" type="image/png" sizes="16x16" href="https://elohell.gg/media/img/favicon/favicon-16x16.png?v=1">
		<link rel="manifest" href="https://elohell.gg/media/img/favicon/site.webmanifest?v=1">
		<link rel="mask-icon" href="https://elohell.gg/media/img/favicon/safari-pinned-tab.svg?v=1" color="#e53e62">
		<link rel="shortcut icon" href="https://elohell.gg/media/img/favicon/favicon.ico?v=1">

<link href="css/style.css" rel="stylesheet">
    <link href="css/vote.style.css" rel="stylesheet">
    <link href="css/normalize.css" rel="stylesheet">
	<title>GitGud Logocontest</title>
	
	<meta property="og:title" content="GitGud Logocontest" />
	<meta property="og:type" content="website"/>
	<meta property="og:url" content="https://logos.elohell.gg/vote.php" />
	<meta property="og:image" content="https://elohell.gg/media/img/logos/ggs6/GG_V_C_Dark.png">
	<meta property="og:description" content="Vote for your favorite logos in the Elo Hell Zotac GitGud Tournament!">
	<meta name="theme-color" content="#FF882C">
	
	
</head>

<body>
<div class="container">

    
    <div class="text" style="text-align: center">
        <h1>Choose one!</h1>
        <h3>'.(sizeof($_SESSION['completed']) + 1).'/20</h3>
    </div>
    

    <div class="vs"><span>VS</span></div>

    <form style="width: 100%" method="post">
    <div class="logo__wrapper logo1">
';



//image 1
echo '<input type="hidden" name="userIP" value="'.sha1($_SERVER['REMOTE_ADDR']).'">';
echo '<input type="hidden" name="matchID" value="'.bin2hex(random_bytes(10)).'">';
echo '<input type="hidden" name="ID1" value="'.$imageID1.'">';
echo '<input type="hidden" name="ID2" value="'.$imageID2.'">';


echo '<div class="team__wrapper"><button class="btn" type="submit" value="'.$imageID1.'" name="selected"><h4>'.$Img1['name'].'</h4><img style="margin:20px" class="img-fluid" src="https://img.elohell.gg/overlay/teams/'.normalize_text($Img1['name']).'.png" width="50%" alt="'.$Img1['name'].'"></button></div>';

echo '</div>
<div class="logo__wrapper logo2">';
//image 2

echo '<div class="team__wrapper"><button class="btn"  type="submit" value="'.$imageID2.'" name="selected"><h4>'.$Img2['name'].'</h4><img style="margin:20px" class="img-fluid" src="https://img.elohell.gg/overlay/teams/'.normalize_text($Img2['name']).'.png" width="50%" alt="'.$Img2['name'].'"></button></div>';



$progress = sizeof($_SESSION['completed']) * 5;

echo '    </div>
    </div>
    </form>
    <div id="progress-bar" style="width: '.$progress.'%"></div>
</div>

</body>
</html>';
?>

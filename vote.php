<?php
session_start();
include_once "helpers.php";
include_once "db_conn.php";

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

#debug
#    $imageID1 = 264;
 #   $imageID2 = 351;


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


$progress = sizeof($_SESSION['completed']) * 5;

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
        <link href="css/bootstrap-grid.css" rel="stylesheet">
	    <title>GitGud Logocontest</title>

        <meta property="og:title" content="GitGud Logocontest" />
        <meta property="og:type" content="website"/>
        <meta property="og:url" content="https://logos.elohell.gg/" />
        <meta property="og:image" content="https://elohell.gg/media/img/logos/ggs6/GG_V_C_Dark.png"> 
        <meta property="og:description" content="Vote for your favorite logos in the Elo Hell GitGud Tournament!">
        <meta name="theme-color" content="#FF882C">
        
        <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">

    </head>

<body>
<div class="container-fluid main">
    <div id="progress-bar" class="fixed-bottom" style="width: '.$progress.'%"></div>
<div class="background-buildings_img">

    
    <div class="container-fluid">

    <div class="progress">
        <h4 id="progress">'.(sizeof($_SESSION['completed']) + 1).'</h4>
    </div>
    

    <form style="width: 100%;max-width: 1920px;" method="post">
    
    
';




//image 1



echo '
<div class="logo__wrapper logo1">
<div class="team__wrapper left">
      <button class="btn"  type="submit" value="'.$imageID1.'" name="selected">
        <div class="img__wrapper">
                <img class="img-fluid" src="https://img.elohell.gg/overlay/teams/'.normalize_text($Img1['name']).'.png" alt="'.$Img1['name'].'">
            </div>
            <div class="name__wrapper">
                <h4 class="name">'.$Img1['name'].'</h4>
            </div>
        </button>
    </div>
    
    </div>
<div class="logo__wrapper logo2">';
//image 2

echo '<div class="team__wrapper right">
        <button class="btn"  type="submit" value="'.$imageID2.'" name="selected">
            <div class="img__wrapper">
                <img class="img-fluid" src="https://img.elohell.gg/overlay/teams/'.normalize_text($Img2['name']).'.png" alt="'.$Img2['name'].'">
            </div>
            <div class="name__wrapper">
                <h4 class="name">'.$Img2['name'].'</h4>
            </div>
            
        </button>
    </div>
    </div>
    </div>';
echo '<input type="hidden" name="userIP" value="'.sha1($_SERVER['REMOTE_ADDR']).'">';
echo '<input type="hidden" name="matchID" value="'.bin2hex(random_bytes(10)).'">';
echo '<input type="hidden" name="ID1" value="'.$imageID1.'">';
echo '<input type="hidden" name="ID2" value="'.$imageID2.'">';
echo '
    </form>
    </div>

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="js/jquery.fittext.js"></script>
<script>
    window.onload = function () {
        console.log("Currently, width is: "+document.getElementById("progress-bar").style.width);
        let w = parseInt(document.getElementById("progress").innerText);
        
        w = (w) * 5;
        console.log("Setting width to "+ w.toString() + " %");
        document.getElementById("progress-bar").style.width = w + "%";
        console.log("Now, width is: "+document.getElementById("progress-bar").style.width);    
    }
    jQuery("h4").fitText();
</script>

</body>
</html>';
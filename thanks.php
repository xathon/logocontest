<?php
session_start();
include_once "helpers.php";
include_once "db_conn.php";


if(time()>0 && false) {//TODO enter timestamp here
    if($_POST == []) {
        header("Location: staffvote.php");
    }
    // Single voting is only used for staff voting. During the regular voting time, you can vote as much as you want.
    $query = "select * from ivoted where sessionid = '".session_id()."'";
    $q = mysqli_query($remote,$query);

    if($q->num_rows > 0) {
        echo "You tried to vote more than once, even though we told you not to. Ollie is very disappointed in you.";
        die();
    }
    $query = "insert into ivoted values('".session_id()."',".time().")";
    $q = mysqli_query($remote,$query);

    $query = "";
    if(isset($_POST['ollieburn'])) {
        $query = "update logocontest.logos set `ollieburn` = `ollieburn` + 1 where `id` = ".$_POST['ollieburn']."; ";
        $q = mysqli_query($remote,$query);
    }
    $query = "update logocontest.logos set `paint` = `paint` + 1 where `id` = ".$_POST['paint']."; ";
    $q = mysqli_query($remote,$query);
    $query = "update logocontest.logos set `animal` = `animal` + 1 where `id` = ".$_POST['animal']."; ";
    $q = mysqli_query($remote,$query);
    $query = "update logocontest.logos set `staff` = `staff` + 1 where `id` = ".$_POST['staff'].";";
    $q = mysqli_query($remote,$query);
    if(isset($_POST['ollieburn'])) {
        $query = "select * from logos where id = ".$_POST['ollieburn'];
        $q = mysqli_query($remote,$query);
        $ollie = mysqli_fetch_assoc($q);
    }
    $query = "select * from logos where id = ".$_POST['paint'];
    $q = mysqli_query($remote,$query);
    $paint = mysqli_fetch_assoc($q);
    $query = "select * from logos where id = ".$_POST['animal'];
    $q = mysqli_query($remote,$query);
    $animal = mysqli_fetch_assoc($q);
    $query = "select * from logos where id = ".$_POST['staff'];
    $q = mysqli_query($remote,$query);
    $staff = mysqli_fetch_assoc($q);
}



echo '<html lang="en" prefix="og: https://ogp.me/ns#">
<head>
		<link rel="apple-touch-icon" sizes="180x180" href="https://elohell.gg/media/img/favicon/apple-touch-icon.png?v=1">
		<link rel="icon" type="image/png" sizes="32x32" href="https://elohell.gg/media/img/favicon/favicon-32x32.png?v=1">
		<link rel="icon" type="image/png" sizes="16x16" href="https://elohell.gg/media/img/favicon/favicon-16x16.png?v=1">
		<link rel="manifest" href="https://elohell.gg/media/img/favicon/site.webmanifest?v=1">
		<link rel="mask-icon" href="https://elohell.gg/media/img/favicon/safari-pinned-tab.svg?v=1" color="#e53e62">
		<link rel="shortcut icon" href="https://elohell.gg/media/img/favicon/favicon.ico?v=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/thanks.style.css" rel="stylesheet">
        <link href="css/bootstrap-grid.css" rel="stylesheet">
	    <title>GitGud Logocontest</title>

        <meta property="og:title" content="GitGud Logocontest" />
        <meta property="og:type" content="website"/>
        <meta property="og:url" content="https://logos.elohell.gg/" />
        <meta property="og:image" content="https://elohell.gg/media/img/logos/ggs6/GG_V_C_Dark.png">
        <meta property="og:description" content="Vote for your favorite team logos in the Elo Hell GitGud Tournament!">
        <meta name="theme-color" content="#8633fc">

        <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">

</head>
<body>
    <div class="container-fluid">
        <div class="row align-content-center" id="firstrow">
            <a target="_blank" rel="noopener noreferrer" href="https://events.elohell.gg/gitgud/info/">
                <img id="gg-logo" src="https://elohell.gg/media/img/logos/ggs6/GG_V_C_Dark.png" alt="GitGud logo">
            </a>
            </div>
            
        
        <div class="row align-self-center">
            <div class="col align-content-center" style="text-align: center">
                <h1>Thanks for voting!</h1>
            </div>
        </div>
        <div class="row align-content-center">
            <div class="col" ">
                <p>Make sure to follow <a class="link" target="_blank" rel="noopener noreferrer" href="https://twitter.com/elohellesports">@elohellesports on Twitter</a> so you don\'t miss the Round of 16!</p>
            </div>
        </div>
        <div class="row align-self-center w-100" style="margin-top: 2vh">
                <a class="btn btn-lg" role="button" href="vote.php">Vote again!</a>
            
        </div>
                <div class="row" style="min-width: 720px">
                ';

if(time()>0 && false) {//TODO enter timestamp here
    if(isset($ollie)) {
        echo '<div class="col-3" >
                <div class="mx-auto">
                <h2>OllieBurn award:</h2>
                <a href="https://img.elohell.gg/overlay/teams/'.normalize_text($ollie['name']).'.png" target="_logo"><img style="margin:20px" class="img" src="https://img.elohell.gg/overlay/teams/'.normalize_text($ollie['name']).'.png" width="100px" alt="'.$ollie['name'].'"></a>
                </div>
                </div>
                <div class="col-3">
                <div class="mx-auto">
                <h2>MSPaint award:</h2>
                <a href="https://img.elohell.gg/overlay/teams/'.normalize_text($paint['name']).'.png" target="_logo"><img style="margin:20px" class="img" src="https://img.elohell.gg/overlay/teams/'.normalize_text($paint['name']).'.png" width="100px" alt="'.$paint['name'].'"></a>
                </div>
                </div>
                <div class="col-3">
                <h2>Animal award:</h2>
                <a href="https://img.elohell.gg/overlay/teams/'.normalize_text($animal['name']).'.png" target="_logo"><img style="margin:20px" class="img" src="https://img.elohell.gg/overlay/teams/'.normalize_text($animal['name']).'.png" width="100px" alt="'.$animal['name'].'"></a>
                </div>
                <div class="col-3">
                <h2>Staff Choice:</h2>
                <a href="https://img.elohell.gg/overlay/teams/'.normalize_text($staff['name']).'.png" target="_logo"><img style="margin:20px" class="img" src="https://img.elohell.gg/overlay/teams/'.normalize_text($staff['name']).'.png" width="100px" alt="'.$staff['name'].'"></a>
                </div>';
    } else {
        echo '
                <div class="col-4">
                <div class="mx-auto">
                <h2 class="text-center">MSPaint award:</h2>
                <a href="https://img.elohell.gg/overlay/teams/'.normalize_text($paint['name']).'.png" target="_logo"><img style="margin:20px" class="img" src="https://img.elohell.gg/overlay/teams/'.normalize_text($paint['name']).'.png" width="100px" alt="'.$paint['name'].'"></a>
                </div>
                </div>
                <div class="col-4">
                <div class="mx-auto">
                <h2 class="text-center">Animal award:</h2>
                <a href="https://img.elohell.gg/overlay/teams/'.normalize_text($animal['name']).'.png" target="_logo"><img style="margin:20px" class="img" src="https://img.elohell.gg/overlay/teams/'.normalize_text($animal['name']).'.png" width="100px" alt="'.$animal['name'].'"></a>
                </div>
                </div>
                <div class="col-4">
                <div class="mx-auto">
                <h2 class="text-center">Staff Choice:</h2>
                <a href="https://img.elohell.gg/overlay/teams/'.normalize_text($staff['name']).'.png" target="_logo"><img style="margin:20px" class="img" src="https://img.elohell.gg/overlay/teams/'.normalize_text($staff['name']).'.png" width="100px" alt="'.$staff['name'].'"></a>
                </div>
                </div>';
    }
}



echo '

            </div>
        
       

        <div class="fixed-bottom">
            <a href="https://elohell.gg">
                <img src="https://elohell.gg/media/img/logos/Elo-Hell-Logo_H-C-Dark.png" alt="Elo Hell Esports logo">
            </a>
        </div>
        <div class="fixed-bottom nonmobile" style="right: 5px">
        <p>Made with ❤ by <a target="_blank" rel="noopener noreferrer" href="https://twitter.com/xathon_" class="link">Xathon</a>. Art by <a target="_blank" rel="noopener noreferrer" href="https://twitter.com/kryyOW" class="link">Kryy.</a></p>
        </div>
    </div>
    
</body>
</html>';




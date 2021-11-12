<?php
session_start();
include_once 'helpers.php';
include_once "db_conn.php";

$query = "select * from logocontest.output order by name ASC;";
$result = mysqli_query($remote, $query);

echo '
<html lang="en" prefix="og: https://ogp.me/ns#">
    <head>
		<link rel="apple-touch-icon" sizes="180x180" href="https://elohell.gg/media/img/favicon/apple-touch-icon.png?v=1">
		<link rel="icon" type="image/png" sizes="32x32" href="https://elohell.gg/media/img/favicon/favicon-32x32.png?v=1">
		<link rel="icon" type="image/png" sizes="16x16" href="https://elohell.gg/media/img/favicon/favicon-16x16.png?v=1">
		<link rel="manifest" href="https://elohell.gg/media/img/favicon/site.webmanifest?v=1">
		<link rel="mask-icon" href="https://elohell.gg/media/img/favicon/safari-pinned-tab.svg?v=1" color="#e53e62">
		<link rel="shortcut icon" href="https://elohell.gg/media/img/favicon/favicon.ico?v=1">
        <link href="css/global.style.css" rel="stylesheet">
        <link href="css/gallery.style.css" rel="stylesheet">
        <link href="css/bootstrap-grid.css" rel="stylesheet">
	    <title>GitGud Logocontest</title>

        <meta property="og:title" content="GitGud Logocontest" />
        <meta property="og:type" content="website"/>
        <meta property="og:url" content="https://logos.elohell.gg/" />
        <meta property="og:image" content="https://elohell.gg/media/img/logos/ggs6/GG_V_C_Dark.png"> 
        <meta property="og:description" content="Vote for your favorite logos in the Elo Hell GitGud Tournament!">
        <meta name="theme-color" content="#FF882C">
        
        <meta content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no" name="viewport">

    </head>

    <body>
        <div class="container-fluid">
        
        <h1>Logo Gallery</h1>
        <h2>Hint: click on a logo for a fullscreen view!</h2>
            <div class="row">
            ';
$row = mysqli_fetch_assoc($result);
while ( $row!= NULL) {
    echo '
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 d-flex justify-content-center">
                    <a href="https://img.elohell.gg/overlay/teams/'.normalize_text($row['name']).'.png" target="_logo">
                    <table class="galleryelement">
                        <tbody>
                            <tr><td>
                                <img  class="nm" src="https://img.elohell.gg/overlay/teams/'.normalize_text($row['name']).'.png" width="300px" alt="'.$row['name'].'">
                            </td></tr>
                            <tr class="teamname"><td>
                                <p>'.$row['name'].'</p>
                            </td></tr>
                        </tbody>
                    </table>
                    </a>
                    
                </div>
    ';


    $row = mysqli_fetch_assoc($result);
}


echo '
        </div>
    </body>
</html>
';
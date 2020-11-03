<?php
session_start();
include_once 'helpers.php';

//TODO seperate this into a snippet
require __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::create(__DIR__, '.env');
$dotenv->load();
$dotenv->required(['DB_HOST', 'DB_NAME', 'DB_USER', 'DB_PASS', 'DB_PORT']);

$remote = mysqli_connect(getenv('DB_HOST'),
    getenv('DB_USER'),
    getenv('DB_PASS'),
    getenv('DB_NAME'),
    getenv('DB_PORT'));
if (mysqli_connect_errno()) {
    printf("Couldn't connect to database! %s\n", mysqli_connect_error());
    exit();
}
if(isset($_POST['selected'])) {
    $query = "update logocontest.logos set active=0 where id = ".$_POST['selected'].";";
    $result = mysqli_query($remote, $query);
}


$query = "select * from logocontest.output;";
$result = mysqli_query($remote, $query);


echo '<html>
<head>
		<link rel="apple-touch-icon" sizes="180x180" href="https://elohell.gg/media/img/favicon/apple-touch-icon.png?v=1">
		<link rel="icon" type="image/png" sizes="32x32" href="https://elohell.gg/media/img/favicon/favicon-32x32.png?v=1">
		<link rel="icon" type="image/png" sizes="16x16" href="https://elohell.gg/media/img/favicon/favicon-16x16.png?v=1">
		<link rel="manifest" href="https://elohell.gg/media/img/favicon/site.webmanifest?v=1">
		<link rel="mask-icon" href="https://elohell.gg/media/img/favicon/safari-pinned-tab.svg?v=1" color="#e53e62">
		<link rel="shortcut icon" href="https://elohell.gg/media/img/favicon/favicon.ico?v=1">

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/output.style.css" rel="stylesheet">
	<title>GitGud Logocontest</title>


</head>
<body>
<div class="row">
    <div class="col-2">

    </div>
    <div class="col-8" style="text-align: center">
        <h1>Current ranking (staff only!)</h1>
    </div>

</div>
<div class="row">
    <div class="col-2">

    </div>
    <div class="col-8" style="text-align: center">
    <table class="table">
        <thead>
            <th scope="col">Position</th>
            <th scope="col">Logo</th>
            <th scope="col">Name</th>
            <th scope="col">Division</th>
            <th scope="col">Won matchups</th>
            <th scope="col">Delete</th>
        </thead>
        <tbody>
            
    ';
$count = 0;
$row = mysqli_fetch_assoc($result);
while ( $row!= NULL) {
    echo '
            <tr>
                <th scope="row">'.++$count.'</th>
                <td><img style="margin:20px" class="img-fluid" src="https://img.elohell.gg/overlay/teams/'.normalize_text($row['name']).'.png" width="50px" alt="'.$row['name'].'"></td>
                <td>'.$row['name'].'</td>
                <td>'.$row['region'].' '.$row['division'].'</td>
                <td>'.$row['won_matchups'].'/'.$row['matchups'].'</td>
                <td><form action="output.php" method="POST"> <button class="btn" type="submit" value="'.$row['id'].'" name="selected" >Remove</button></form></td>
            </tr>
    
    ';
    $row = mysqli_fetch_assoc($result);
}
echo '
        </tbody>
    </table>
    </div>
    </body>
    </html>'

?>



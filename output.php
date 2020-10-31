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
    getenv('DB_NAME'));
if (mysqli_connect_errno()) {
    printf("Couldn't connect to database! %s\n", mysqli_connect_error());
    exit();
}

$query = "select * from logocontest.output;";
$result = mysqli_query($remote, $query);


echo '<html>
<head>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/output.style.css" rel="stylesheet">


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



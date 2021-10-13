<?php
session_start();
include_once 'helpers.php';
include_once "db_conn.php";

if(isset($_POST['selected'])) {
    $query = "update logocontest.logos set active=0 where id = ".$_POST['selected'].";";
    $result = mysqli_query($remote, $query);
    echo '<script lang="javascript">';
    echo 'alert("removed logo: '.$_POST['name'].'")';
    echo '</script>';
}
if(isset($_POST['restore'])) {
    $query = "update logocontest.logos set active=1 where id = ".$_POST['restore'].";";
    $result = mysqli_query($remote, $query);
    echo '<script lang="javascript">';
    echo 'alert("restored logo: '.$_POST['name'].'")';
    echo '</script>';
}


$query = "select * from logocontest.output order by won_matchups/output.matchups DESC,output.matchups DESC ;";
$result = mysqli_query($remote, $query);


echo '<html lang="en">
<head>
		<link rel="apple-touch-icon" sizes="180x180" href="https://elohell.gg/media/img/favicon/apple-touch-icon.png?v=1">
		<link rel="icon" type="image/png" sizes="32x32" href="https://elohell.gg/media/img/favicon/favicon-32x32.png?v=1">
		<link rel="icon" type="image/png" sizes="16x16" href="https://elohell.gg/media/img/favicon/favicon-16x16.png?v=1">
		<link rel="manifest" href="https://elohell.gg/media/img/favicon/site.webmanifest?v=1">
		<link rel="mask-icon" href="https://elohell.gg/media/img/favicon/safari-pinned-tab.svg?v=1" color="#e53e62">
		<link rel="shortcut icon" href="https://elohell.gg/media/img/favicon/favicon.ico?v=1">

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/global.style.css" rel="stylesheet">
    <link href="css/output.style.css" rel="stylesheet">
	<title>GitGud Logocontest</title>


</head>
<body>
<div class="row">
    <div class="col-2">

    </div>
    <div class="col-8" style="text-align: center">
        <h1>Output of the current votings</h1>
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
                <td><form action="output.php" method="POST"><input type="hidden" name="name" value="'.$row['name'].'"> <button class="btn" type="submit" value="'.$row['id'].'" name="selected" >Remove</button></form></td>
            </tr>
    
    ';
    $row = mysqli_fetch_assoc($result);
}

//restore accidental deletes
$query = "select * from logocontest.logos where `active`=0 order by `name` ASC ;";
$result = mysqli_query($remote, $query);


echo '
        </tbody>
    </table>
    <h2>Removed teams</h2>
    <table class="table">
        <thead>
            <th scope="col">Logo</th>
            <th scope="col">Team Name</th>
            <th scope="col">Restore</th>
        </thead>
        <tbody>
            ';

$row = mysqli_fetch_assoc($result);
while ( $row!= NULL) {
    echo '
      <tr>
        <td><img style="margin:20px" class="img-fluid" src="https://img.elohell.gg/overlay/teams/'.normalize_text($row['name']).'.png" width="50px" alt="'.$row['name'].'"></td>
        <td>'.$row['name'].'</td>
        <td><form action="output.php" method="POST"><input type="hidden" name="name" value="'.$row['name'].'"> <button class="btn" type="submit" value="'.$row['id'].'" name="restore" >Restore</button></form></td>
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



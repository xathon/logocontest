<?php
session_start();
include_once 'helpers.php';
include_once "db_conn.php";

$query = "select * from logocontest.output order by name ASC;";
$result = mysqli_query($remote, $query);

echo '<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">

  <title>Redirecting...</title>
  <meta content="0; URL=gallery.php" http-equiv="refresh">
</head>
</html>';
exit();

/*
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
        <h1>All the logos to choose from!</h1>
        <h1>Hint: click on a logo to see it in full size!</h1>
        <p style="font-size: 1.3em">Most Paint.exe Award  - Most Scuffed logo</p>
        <p style="font-size: 1.3em">Elo Hell Staff Choice Award - EHE Staff Choice</p>
        <p style="font-size: 1.3em">Mmm, Monkey Award - Best Animal Themed logo</p>
        <p style="font-size: 1.3em">Most OllieBurn Award - GG Staff Choice (everyone that worked on GG)</p>
        <form action="staffvote.php" method="post" '.(isset($_POST['gitgud']) && $_POST['gitgud'] == "true" ? "hidden" : "").'>
        <button class="btn btn-primary" name="gitgud" value="true" type="submit" style="margin: 15px auto 15px auto">Click here ONLY if you worked on GitGud in any way</button>
        </form>
    </div>
    

</div>
<div class="row">
    <div class="col-2">

    </div>
    <div class="col-8" style="text-align: center">
    <form method="post" action="thanks.php">
    <table class="table">
        <thead>
            <th scope="col">Logo</th>
            <th scope="col">Name</th>
            <th scope="col">Vote for...</th>
        </thead>
        <tbody>
            
    ';
$count = 0;
$row = mysqli_fetch_assoc($result);
while ( $row!= NULL) {
    echo '
            <tr>
                <td><a href="https://img.elohell.gg/overlay/teams/'.normalize_text($row['name']).'.png" target="_logo"><img style="margin:20px" class="img-fluid" src="https://img.elohell.gg/overlay/teams/'.normalize_text($row['name']).'.png" width="100px" alt="'.$row['name'].'"></a></td>
                <td>'.$row['name'].'</td>
                <td>
                    <input type="radio" name="ollieburn" id="ollieburn_'.$row['id'].'" value="'.$row['id'].'" '.(!isset($_POST['gitgud']) ? "hidden" : "").'>
                    <label for="ollieburn_'.$row['id'].'" '.(!isset($_POST['gitgud']) ? "hidden" : "").'>OllieBurn award</label><br>
                    <input type="radio" name="paint" id="paint_'.$row['id'].'" value="'.$row['id'].'">
                    <label for="paint_'.$row['id'].'">Paint.exe award</label><br>
                    <input type="radio" name="animal" id="animal_'.$row['id'].'" value="'.$row['id'].'">
                    <label for="animal_'.$row['id'].'">Mmm, Monkey award</label><br>
                    <input type="radio" name="staff" id="staff_'.$row['id'].'" value="'.$row['id'].'">
                    <label for="staff_'.$row['id'].'">Staff\'s choice award</label>
                    
                </td>
            </tr>
    
    ';
    $row = mysqli_fetch_assoc($result);
}
echo '
        </tbody>
    </table>
    


    
    </div>
    <div class="col-2">
        <div class="sticky-top" >
        <input type="submit" class="btn" name="Submit" style="margin-top: 10px">
    </div>
    </form>
    </div>
    </body>
    </html>'
*/
?>



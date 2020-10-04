<?php
session_start();
unset($_SESSION)
//select winner.name,loser.name from matchups left join logos winner on winner.id = matchups.winner left join logos loser on loser.id = matchups.loser;

?>

<html>
    <head>
        <link href="css/bootstrap.css" rel="stylesheet">
    </head>
    <body>
    <div class="row" style="height: 20em"></div>
        <div class="row">
            <div class="col-3">

            </div>
            <div class="col-6" style="text-align: center">
                <h1>Logo contest</h1>
            </div>

        </div>
        <div class="row">
            <div class="col-3">

            </div>
            <div class="col-6" style="text-align: center">
                <a class="btn btn-primary" role="button" href="vote.php">Start</a>
            </div>
        </div>
    </body>
</html>
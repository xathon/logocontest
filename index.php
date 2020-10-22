<?php
session_start();
session_unset();

//select winner.name,loser.name from matchups left join logos winner on winner.id = matchups.winner left join logos loser on loser.id = matchups.loser;

?>

<html>
    <head>
        <link href="css/style.css" rel="stylesheet">
        <link href="css/index.style.css" rel="stylesheet">

    </head>
    <body>

    <div class="container">
        <div class="col-6" style="text-align: center">
                    <h1>Logo contest</h1>
                </div>

        
                <div class="col-6" style="text-align: center">
                    <a class="btn" role="button" href="vote.php">Start</a>
                    <a class="btn" role="button" href="output.php">Results</a>
                </div>

        </div>
              
    <footer style="position: absolute;bottom: 0" >
        <a href="upload.php">Staff Only: Upload logos</a>
    </footer>
    </body>
</html>
<?php
session_start();
if (isset($_SESSION['completed'])) $_SESSION['completed'] = [];

echo '<html>
<head>
    <link href="css/bootstrap.css" rel="stylesheet">
</head>
<body>
<div class="row">
    <div class="col-3">

    </div>
    <div class="col-6" style="text-align: center">
        <h1>Logo contest</h1>
        <h3>Thanks for voting!</h3>
    </div>

</div>
<div class="row">
    <div class="col-3">

    </div>
    <div class="col-6" style="text-align: center">
        <a class="btn btn-primary" role="button" href="vote.php">Go agane</a>
    </div>
</div>
</body>
</html>';




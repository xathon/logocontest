<?php
session_start();
if (isset($_SESSION['completed'])) $_SESSION['completed'] = [];

echo '<html>
<head>
    <link href="css/style.css" rel="stylesheet">
    <link href="css/thanks.style.css" rel="stylesheet">
    <link href="css/normalize.css" rel="stylesheet">

</head>
<body>
<div class="container">
    <div class="col-6">
        <h1>Logo contest</h1>
        <h3>Thanks for voting!</h3>
    </div>

    <div class="col-6">
        <a class="btn btn-primary" role="button" href="vote.php">Go agane</a>
    </div>
</div>
</body>
</html>';




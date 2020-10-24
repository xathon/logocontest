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
        <div class="row align-content-center">
            <a target="_blank" rel="noopener noreferrer" href="https://events.elohell.gg/gitgud/info/">
                <img src="https://elohell.gg/media/img/logos/ggs6/GG_V_C_Dark.png" style="width: 10em">
            </a>
            
        </div>
        <div class="row align-self-center w-100">
            <div class="col-6 align-content-center" style="text-align: center ">
                <h1 style="font-size: 5em;margin-block-start: 0.33em;margin-block-end: 0.33em ">Thanks for voting!</h1>
                <h2>The Top 16 logos will advance to a bracket to determine the winner! Follow <a href="https://twitter.com/EloHellEsports">@elohellesports</a> on Twitter to stay in touch! </h2>
            </div>
        </div>
        <div class="row align-self-center w-100">
            <div class="col-6">
                <a class="btn btn-primary" role="button" href="vote.php">Go agane</a>
            </div>
        </div>

        

        <div class="fixed-bottom" style="position: absolute;bottom: 5px">
            <a href="https://elohell.gg">
                <img src="https://elohell.gg/media/img/logos/Elo-Hell-Logo_H-C-Dark.png" style="height: 5em">
            </a>
        </div>
        <div class="fixed-bottom" style="position: absolute;bottom: 5px;right: 5px">
        <p>Made with ❤ by <a target="_blank" rel="noopener noreferrer" href="https://twitter.com/Cinzzya" class="twitter">Cinzya</a> and <a target="_blank" rel="noopener noreferrer" href="https://twitter.com/xathon_" class="twitter">Xathon</a></p>
        </div>
    </div>
    
</body>
</html>';




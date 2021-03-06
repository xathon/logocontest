<?php
session_start();
session_unset();


if(time()>1605459600) {
    echo '<html lang="en">
    <head>
		<link rel="apple-touch-icon" sizes="180x180" href="https://elohell.gg/media/img/favicon/apple-touch-icon.png?v=1">
		<link rel="icon" type="image/png" sizes="32x32" href="https://elohell.gg/media/img/favicon/favicon-32x32.png?v=1">
		<link rel="icon" type="image/png" sizes="16x16" href="https://elohell.gg/media/img/favicon/favicon-16x16.png?v=1">
		<link rel="manifest" href="https://elohell.gg/media/img/favicon/site.webmanifest?v=1">
		<link rel="mask-icon" href="https://elohell.gg/media/img/favicon/safari-pinned-tab.svg?v=1" color="#e53e62">
		<link rel="shortcut icon" href="https://elohell.gg/media/img/favicon/favicon.ico?v=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/index.style.css" rel="stylesheet">
        <link href="css/bootstrap-grid.css" rel="stylesheet">
	    <title>GitGud Logocontest</title>

        <meta property="og:title" content="GitGud Logocontest" />
        <meta property="og:type" content="website"/>
        <meta property="og:url" content="https://logos.elohell.gg/" />
        <meta property="og:image" content="https://elohell.gg/media/img/logos/ggs6/GG_V_C_Dark.png">
        <meta property="og:description" content="Vote for your favorite logos in the Elo Hell Zotac GitGud Tournament!">
        <meta name="theme-color" content="#FF882C">

    </head>
    <body>

    <div class="container d-flex h-100" style="max-width: 1920px" >
        <div class="row" style="min-width: 100%">
            <div class="col-lg-3 col-sm-12">
                <div class="row align-self-center">
                    <a target="_blank" rel="noopener noreferrer" href="https://events.elohell.gg/gitgud/info/" style="margin: auto">
                        <img src="https://elohell.gg/media/img/logos/ggs6/GG_V_C_Dark.png" style="width: 10em" alt="GitGud logo">
                    </a>
                </div>
                <div class="row align-self-center w-100" >
                    <div class="col-10 col-6-lg d-none d-lg-block" style="text-align: center;margin: auto">
                        <h1 style="font-size: 3em;margin-top: 0.2em;margin-bottom: 0.2em;">Welcome to the GitGud logocontest!</h1>
                        <h2 style="font-size: 1.25em;font-weight: normal">The first round of voting has ended!<br>
                            The Top 16 logos have advanced to a bracket to determine the winner.<br> Follow <a href="https://twitter.com/EloHellEsports">@elohellesports</a> on Twitter, where the final votes will happen daily! </h2>
                        <a class="twitter-timeline" data-border-color="#FF882C" data-chrome="noheader,nofooter,transparent" data-dnt="true" data-theme="dark" data-height="300" href="https://twitter.com/EloHellEsports?ref_src=twsrc%5Etfw" >Tweets by EloHellEsports</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                    </div>
                    <div class="col-10 col-6-lg d-lg-none" style="text-align: center;margin: auto">
                        <h1 style="font-size: 6em;margin-top: 0.2em;margin-bottom: 0.2em;">Welcome to the GitGud logocontest!</h1>
                        <p style="font-size: 3em;margin-top: 0.2em;margin-bottom: 0.2em;">The first round of voting has ended!<br>
                            The Top 16 logos have advanced to a bracket to determine the winner.<br> Follow <a href="https://twitter.com/EloHellEsports">@elohellesports</a> on Twitter, where the final votes will happen daily! </p>

                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-sm-12 d-none d-lg-flex">
                <iframe style="width: 100%;height: 50em" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vSH5pVXbhVnOBIrUvh3-Xlkcnl6sJwNBLJ8DuKDSnXiQIKLp3UkEqMJWSC6J3QB4TCi3L6rFaqEPtcC/pubhtml?widget=true&amp;headers=false"></iframe>

            </div>
            <div class="col d-lg-none" style="text-align: center;margin-top: 50px">
                <a style="font-size: 3em" class="btn btn-lg btn-block" role="button" href="https://docs.google.com/spreadsheets/d/1eJXaD7MPxcyMbc3-7ILmir0U-bgmyroCbN1NYjRPVk8/edit?usp=sharing">Bracket</a>
            </div>
        </div>



        <div class="row" style="position: relative;margin-top: 2em;margin-bottom: -3em">
            <a href="https://elohell.gg">
                <img src="https://elohell.gg/media/img/logos/Elo-Hell-Logo_H-C-Dark.png" style="height: 5em" alt="Elo Hell Esports logo">
            </a>
        </div>
    </div>

              

    </body>
</html>';
} else {
    echo '
    <html lang="en">
    <head>
		<link rel="apple-touch-icon" sizes="180x180" href="https://elohell.gg/media/img/favicon/apple-touch-icon.png?v=1">
		<link rel="icon" type="image/png" sizes="32x32" href="https://elohell.gg/media/img/favicon/favicon-32x32.png?v=1">
		<link rel="icon" type="image/png" sizes="16x16" href="https://elohell.gg/media/img/favicon/favicon-16x16.png?v=1">
		<link rel="manifest" href="https://elohell.gg/media/img/favicon/site.webmanifest?v=1">
		<link rel="mask-icon" href="https://elohell.gg/media/img/favicon/safari-pinned-tab.svg?v=1" color="#e53e62">
		<link rel="shortcut icon" href="https://elohell.gg/media/img/favicon/favicon.ico?v=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/index.style.css" rel="stylesheet">
	    <title>GitGud Logocontest</title>

        <meta property="og:title" content="GitGud Logocontest" />
        <meta property="og:type" content="website"/>
        <meta property="og:url" content="https://logos.elohell.gg/" />
        <meta property="og:image" content="https://elohell.gg/media/img/logos/ggs6/GG_V_C_Dark.png">
        <meta property="og:description" content="Vote for your favorite logos in the Elo Hell Zotac GitGud Tournament!">
        <meta name="theme-color" content="#FF882C">

    </head>
    <body>

    <div class="container d-flex h-100" >
        <div class="row align-content-center">
            <a target="_blank" rel="noopener noreferrer" href="https://events.elohell.gg/gitgud/info/">
                <img src="https://elohell.gg/media/img/logos/ggs6/GG_V_C_Dark.png" style="width: 10em" alt="GitGud logo">
            </a>
        </div>
        <div class="row align-self-center w-100">
            <div class="col-10 col-6-lg" style="text-align: center">
                <h1 style="font-size: 5em">Welcome to the GitGud logocontest!</h1>
            </div>
            <div class="col-4"></div>
            <div class="col-10 col-2-lg " style="text-align: center;width: 100%">
                <a style="font-size: 3em" class="btn btn-lg btn-block" role="button" href="vote.php">Start</a>
            </div>
            <div class="col-4"></div>
        </div>
        <div class="fixed-bottom" style="position: absolute;bottom: 3px">
            <a href="https://elohell.gg">
                <img src="https://elohell.gg/media/img/logos/Elo-Hell-Logo_H-C-Dark.png" style="height: 5em" alt="Elo Hell Esports logo">
            </a>
        </div>
    </div>

              

    </body>
</html>
';
}
?>





<?php
session_start();
session_unset();


if(time()>1635742800) {
    echo '<html lang="en">
    <head>
		<link rel="apple-touch-icon" sizes="180x180" href="https://elohell.gg/media/img/favicon/apple-touch-icon.png?v=1">
		<link rel="icon" type="image/png" sizes="32x32" href="https://elohell.gg/media/img/favicon/favicon-32x32.png?v=1">
		<link rel="icon" type="image/png" sizes="16x16" href="https://elohell.gg/media/img/favicon/favicon-16x16.png?v=1">
		<link rel="manifest" href="https://elohell.gg/media/img/favicon/site.webmanifest?v=1">
		<link rel="mask-icon" href="https://elohell.gg/media/img/favicon/safari-pinned-tab.svg?v=1" color="#e53e62">
		<link rel="shortcut icon" href="https://elohell.gg/media/img/favicon/favicon.ico?v=1">
        <link href="css/global.style.css" rel="stylesheet">
        <link href="css/index.style.css" rel="stylesheet">
        <link href="css/bootstrap-grid.css" rel="stylesheet">
	    <title>GitGud Logocontest</title>

        <meta property="og:title" content="GitGud Logocontest" />
        <meta property="og:type" content="website"/>
        <meta property="og:url" content="https://logos.elohell.gg/" />
        <meta property="og:image" content="https://elohell.gg/media/img/logos/ggs6/GG_V_C_Dark.png">
        <meta property="og:description" content="Vote for your favorite team logos in the Elo Hell GitGud Tournament!">
        <meta name="theme-color" content="#8633fc">

        <meta content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no" name="viewport">

    </head>
    <body>

    <div class="container-fluid d-flex h-100" id="postseasoncontainer" >
        <div class="row" style="min-width: 100%">
            <div class="col-lg-3 col-sm-12">
                <div class="row align-self-center">
                    <a target="_blank" rel="noopener noreferrer" href="https://events.elohell.gg/gitgud/info/" style="margin: auto">
                        <img src="https://elohell.gg/media/img/logos/ggs6/GG_V_C_Dark.png" style="width: 10em" alt="GitGud logo">
                    </a>
                </div>
                <div class="row align-self-center w-100" >
                    <div class="col-10 col-6-lg d-lg-block" style="text-align: center;margin: auto">
                        <h1 style="font-size: 2.8em;margin-top: 0.2em;margin-bottom: 0.2em;">Welcome to the GitGud logocontest!</h1>
                        
                        <h2 style="font-size: 1.25em;font-weight: normal">The first round of voting has ended!<br>
                            The Top 16 logos have advanced to a bracket to determine the winner.<br> Follow <a class="link" target="_blank" rel="noopener noreferrer" href="https://twitter.com/elohellesports">@elohellesports on Twitter</a>, where the final votes will happen daily! </h2>
                        
                    </div>
                </div>
                <div class="row align-self-center w-100 nonmobile flex-fill">
                        <div class="nonmobile" style="width: 100%;height: 100%">
                            <a class="twitter-timeline" data-border-color="#FF882C" data-chrome="noheader,nofooter" data-dnt="true" data-theme="dark" data-height="35vh" href="https://twitter.com/EloHellEsports?ref_src=twsrc%5Etfw" >Tweets by EloHellEsports</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                        </div>
                </div>
            </div>
            <div class="col-lg-9 col-sm-12 d-none d-lg-flex" style="max-width: 1420px">
                <iframe style="width: 100%;height: 90vh;display:none " src="https://docs.google.com/spreadsheets/d/e/2PACX-1vSH5pVXbhVnOBIrUvh3-Xlkcnl6sJwNBLJ8DuKDSnXiQIKLp3UkEqMJWSC6J3QB4TCi3L6rFaqEPtcC/pubhtml?widget=true&amp;headers=false"></iframe>
                <iframe class="nonmobile" style="width: 100%;height: 90vh" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vTyrBdzr5xMzb1pCqI0vjB7UK3zoKPRJi6voVGR35HgL33bB_D7hqsrikIGZ3Y1L_xAVyFw5AY022RE/pubhtml?widget=true&amp;headers=false"></iframe>
            </div>
        </div>



        <div class="fixed-bottom">
            <a href="https://elohell.gg" style="font-size: 0">
                <img src="https://elohell.gg/media/img/logos/Elo-Hell-Logo_H-C-Dark.png" alt="Elo Hell Esports logo">
            </a>
        </div>
        <div class="fixed-bottom nonmobile" style="right: 5px">
        <p>Made with ❤ by <a target="_blank" rel="noopener noreferrer" href="https://twitter.com/xathon_" class="link">Xathon</a>. Art by <a target="_blank" rel="noopener noreferrer" href="https://twitter.com/kryyOW" class="link">Kryy.</a></p>
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
        <link href="css/global.style.css" rel="stylesheet">
        <link href="css/index.style.css" rel="stylesheet">
        <link href="css/bootstrap-grid.css" rel="stylesheet">
	    <title>GitGud Logocontest</title>

        <meta property="og:title" content="GitGud Logocontest" />
        <meta property="og:type" content="website"/>
        <meta property="og:url" content="https://logos.elohell.gg/" />
        <meta property="og:image" content="https://elohell.gg/media/img/logos/ggs6/GG_V_C_Dark.png">
        <meta property="og:description" content="Vote for your favorite team logos in the Elo Hell GitGud Tournament!">
        <meta name="theme-color" content="#8633fc">

        <meta content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no" name="viewport">

    </head>
    <body>

    <div class="container-fluid d-flex h-100" >
        <div class="row align-content-center" id="firstrow">
            <a target="_blank" rel="noopener noreferrer" href="https://events.elohell.gg/gitgud/info/">
                <img id="gg-logo" src="https://elohell.gg/media/img/logos/ggs6/GG_V_C_Dark.png" alt="GitGud logo">
            </a>
        </div>
        <div class="row align-self-center w-100">
            <div class="col-12 col-6-lg" style="text-align: center">
                <h1 id="welcome" style="margin-block-end: 0.25em;">Welcome to the GitGud logocontest!</h1>
            </div>
        </div>
        <div class="row align-self-center w-100">
            <div class="col-8 w-100">
                <div class="tutorial-container collapsed" id="tutorial-container">
                    <p class="header">How does it work?</p>
                    <p id="tutorial" style="display: none">
                        You will be shown two randomly picked logos. Just click on the one you like more!<br>
                        Once the initial voting phase is over, the top 16 logos with the best "win/loss" ratio will face off in a bracket on Twitter!
                    </p>
                </div>
            </div>
        </div>
        <div class="row align-self-center w-100" style="margin-top: 2vh">
            <div class="col-10 col-2-lg " style="text-align: center;width: 100%">
                <a class="btn btn-lg" role="button" href="vote.php">Start</a>
            </div>
            
        </div>
        
        <div class="fixed-bottom">
            <a href="https://elohell.gg" style="font-size: 0">
                <img src="https://elohell.gg/media/img/logos/Elo-Hell-Logo_H-C-Dark.png" alt="Elo Hell Esports logo">
            </a>
        </div>
    </div>

<script lang="js">
    let text = document.getElementById("tutorial");
    let container = document.getElementById("tutorial-container");
    let welcome = document.getElementById("welcome");
    let x = window.matchMedia("(max-width: 576px)");
    
    container.addEventListener("click",function () {
        if(text.style.display === "none") {
            text.style.display = "block";
            if(x.matches) {
                welcome.style.display = "none";
            }
        } else {
            text.style.display = "none";
            if(x.matches) {
                welcome.style.display = "block";
            }
        }
        container.classList.toggle("collapsed");
    })
    
    
    if(x.matches) {
        
    }
    
    
</script>
              

    </body>
</html>
';
}
?>





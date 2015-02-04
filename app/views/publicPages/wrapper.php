
<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KevinWashigntonMe</title>

    <link href="/angular-bootstrap/bootstrap-twit/css/bootstrap.css" rel="stylesheet">
    <link href="/angular-bootstrap/bootstrap-twit/css/bootstrap-theme.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Buenard:700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Arvo:400,700|Roboto:100' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="http://pupunzi.com/mb.components/mb.YTPlayer/demo/inc/jquery.mb.YTPlayer.js"></script>

    <script>
        $(document).ready(function () {

            $(".player").mb_YTPlayer();

        });
    </script>
    <style>

        .navbar-custom {
            background-color:#fff;
            color:#414141;
            border-radius:0;
            min-height: 65px;
            padding-top: 15px;

        }

        .navbar-custom .navbar-nav > li > a {
            color: #414141;
            padding-left:20px;
            padding-right:20px;

        }
        .navbar-custom .navbar-nav > .active > a, .navbar-nav > .active > a:hover, .navbar-nav > .active > a:focus {
            color: #414141;
            background-color:transparent;
        }

        .navbar-custom .navbar-nav > li > a:hover, .nav > li > a:focus {
            text-decoration: none;
            background-color: #f2f2f2;
        }

        .navbar-custom .navbar-brand {
            color:#414141;
            margin-left: 70px;
        }
        .navbar-custom .navbar-toggle {
            background-color:#eeeeee;
        }
        .navbar-custom .icon-bar {
            background-color:#f2f2f2;
        }

        .navbar-right{
            padding-right: 60px;
        }
        /* end nav bar styling*/


        .headline {
            font-family: 'Arvo', serif;
            font-size:  64px;
            text-shadow: 1px 1px #000;
        }
        .subheadline {
            font-family: 'Roboto', sans-serif;
            font-size: 34px;
            text-shadow: 1px 1px #000;
        }

        .video-section .pattern-overlay {
            background-color: rgba(71, 71, 71, 0.59);
            padding: 110px 0 32px;
            min-height: 710px;
            /* Incase of overlay problems just increase the min-height*/
        }

        .video-section .buttonBar{
            display:none;
        }
        .player {
            font-size: 1px;
        }

        .video-section h1{
            color:#fff;
        }
        .video-section p{
            color:#fff;
        }



    </style>

</head>
<body>
<!--<nav class="navbar navbar-custom">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">KW</a>
    </div>
    <div class="collapse navbar-collapse">


        <ul class="nav navbar-nav navbar-right">
            <li><a href="/skills">Skills</a></li>
            <li><a href="/experiences">Experiences</a></li>
            <li><a href="/connect">Connect</a></li>
        </ul>
    </div>

</nav>


-->


<div class="content-section video-section text-center">

    <div class="pattern-overlay">

        <a id="bgndVideo" class="player" data-property="{videoURL:'https://www.youtube.com/watch?v=YzZpFczU-m0',containment:'.video-section', quality:'large', autoPlay:true, mute:true, opacity:1}">bg</a>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <br/><br/>
                   <h1 class="headline">Hello, I'm Kevin.</h1>
                       <p class="subheadline">I create products, develop strategies, and optimize processes.</p>

                </div>
            </div>
        </div>
    </div>
</div>
<!--Video Section Ends Here-->






<!--<br/>-->
<!--<br/>-->
<!--<br/><br/>-->


<div class="container">

<?php
    if(isset($content))
    {
        echo $content;
    }
?>

</div>


    <script src="angular-bootstrap/angular.min.js"></script>
    <script src="angular-bootstrap/angular-route.min.js"></script>
    <script src="app/app.js"></script>
    <script src="app/home.js"></script>
    <script src="app/skill.js"></script>
    <script src="app/experience.js"></script>
    <script src="app/connect.js"></script>




</body>
</html>
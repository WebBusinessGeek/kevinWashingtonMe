
<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KevinWashingtonMe</title>

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
        body{
            background-image: url('http://placehold.it/1400x700');
        }
        .headline {
            font-family: 'Arvo', serif;
            font-size:  64px;
        }
        .subheadline {
            font-family: 'Roboto', sans-serif;
            font-size: 34px;
        }

        .btn-huge-cta {

            min-height: 60px;
            min-width: 205px;
            padding-top: 15px;
            text-align: center;
            font-size: 18px;
            font-family: 'Roboto', sans-serif;

        }

        .cta-image {
            margin-left:30px;
            margin-top:20px;
        }


        .element-to-move {
            -webkit-animation: myfirst 1s; /* Chrome, Safari, Opera */
            animation: myfirst 1s;
            -webkit-animation-iteration-count: infinite;
            animation-iteration-count: infinite;
            animation-direction: alternate;
            -webkit-animation-direction: alternate;
        }

        /* Chrome, Safari, Opera */
        @-webkit-keyframes myfirst {
            from {margin-top: 10px;}
            to {margin-top: 30px;}
        }

        /* Standard syntax */
        @keyframes myfirst {
            from {margin-top: 10px;}
            to {margin-top: 30px;}
        }

        .video-section .pattern-overlay {
            background-color: rgba(71, 71, 71, 0.59);
            padding: 110px 0 32px;
            min-height: 715px;
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


<div class="content-section video-section text-center">

    <div class="pattern-overlay">

        <a id="bgndVideo" class="player" data-property="{videoURL:'https://www.youtube.com/watch?v=YzZpFczU-m0',containment:'.video-section', quality:'large', autoPlay:true, mute:true, opacity:1}">bg</a>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <br/><br/>
                    <h1 class="headline">hello, I'm kevin.</h1>
                    <p class="subheadline">I create products, develop strategies, and optimize processes.</p>
                    <a href="/skills" class="btn btn-warning btn-huge-cta ">Skills I use to do it</a>
                    <div class="cta-image element-to-move">
                        <img src="/angular-bootstrap/arrow_03.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Video Section Ends Here-->






</body>
</html>
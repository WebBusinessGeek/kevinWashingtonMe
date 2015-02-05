
<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KevinWashingtonMe</title>

    <link href="/angular-bootstrap/bootstrap-twit/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="/angular-bootstrap/bootstrap-twit/css/bootstrap.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Buenard:700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Arvo:400,700|Roboto:100' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    <style>
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

        .brandImage{
            position:absolute;
            top:10px;
            left:45px;
        }


        .icon-bar{
            background-color: #fff;

        }

        .navbar-static-top {
            margin-top: -100px;
           padding-top: 35px;
            padding-right: 50px;
        }

        .navLinks {
            color: #fff;
            font-family: 'Arvo', serif;
            font-size: 20px;
            margin-right: 30px;
        }

        .navLinks:hover {
            color: #000;
        }


        .navbar-collapse {
            margin-left:100px;
        }

        #video-bg {
            position: fixed;
            right: 0;
            bottom: 0;
            width: auto;
            min-width: 100%;
            height: auto;
            min-height: 100%;
            z-index: -100;
            background: transparent url('http://placehold.it/1500x900/000000/ffffff') no-repeat;
            background-size: cover;
        }

       .video-section h1{
           color:#fff;
       }
       .video-section p{
           color:#fff;
       }



        .video-section .pattern-overlay {
            background-color: rgba(71, 71, 71, 0.59);
            padding: 110px 0 32px;
            min-height: 715px;
        }






    </style>

</head>
<body>


<video autoplay loop muted poster="vid-first-frame.jpg" id="video-bg">
    <source src="/angular-bootstrap/samplevid.mp4" type="video/mp4">
</video>


<div class="content-section video-section text-center">
    <div class="pattern-overlay">

        <nav class="navbar navbar-static-top">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">
                    <img class="brandImage" src="/angular-bootstrap/keviconRevised_03.png">
                </a>
            </div>

            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="navLinks" href="/skills">Skills</a></li>
                    <li><a class="navLinks" href="/experiences">Experiences</a></li>
                    <li><a class="navLinks" href="/connect">Connect</a></li>
                </ul>
            </div>
        </nav>


        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <br/><br/><br/><br/>
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

<script src="/angular-bootstrap/bootstrap-twit/js/bootstrap.min.js"></script>

</body>
</html>
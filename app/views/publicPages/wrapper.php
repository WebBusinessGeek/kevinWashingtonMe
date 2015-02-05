
<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kevin Washington | Developing Products & Generating Traction</title>

    <link href="/angular-bootstrap/bootstrap-twit/css/bootstrap.css" rel="stylesheet">
    <link href="/angular-bootstrap/bootstrap-twit/css/bootstrap-theme.css" rel="stylesheet">

    <link rel="shortcut icon" href="/assets/kwFavIcon.ico" type="image/x-icon">
    <link rel="icon" href="/assets/kwFavIcon.ico" type="image/x-icon">

    <link href='http://fonts.googleapis.com/css?family=Buenard:700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Arvo:400,700|Roboto:100' rel='stylesheet' type='text/css'>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    <style>
        /* NavBar Content */

        .brandImage{
            position:absolute;
            top:22px;
            left:50px;
        }

        .icon-bar{
            background-color: #666666;
        }
        .navbar-static-top {
            margin-top: -10px;
            padding-top:35px;
            padding-right: 40px;
        }

        .navLinks {
            color: #666666;
            font-family: 'Arvo', serif;
            font-size: 20px;
            margin-right: 30px;
        }

        .navLinks:hover {
            color: #000;
        }
        /* End - NavBar Content */

        .carousel-inner .active.left { left: -33%; }
        .carousel-inner .next        { left:  33%; }
        .carousel-inner .prev        { left: -33%; }
        .carousel-control.left,.carousel-control.right {background-image:none;}
    </style>


</head>

<body>


<nav class="navbar navbar-static-top">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">
            <img class="brandImage" src="/assets/kwIconGrey.png">
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





<br/>
<br/>
<br/><br/>


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


<script src="/angular-bootstrap/bootstrap-twit/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $('#myCarousel').carousel({
        interval: 2500
    });

    $('.carousel .item').each(function(){
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        if (next.next().length>0) {
            next.next().children(':first-child').clone().appendTo($(this));
        }
        else {
            $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
        }
    });
</script>

</body>
</html>
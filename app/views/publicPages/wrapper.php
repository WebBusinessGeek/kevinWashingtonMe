
<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KevinWashigntonMe</title>

    <link href="/angular-bootstrap/bootstrap-twit/css/bootstrap.css" rel="stylesheet">
    <link href="/angular-bootstrap/bootstrap-twit/css/bootstrap-theme.css" rel="stylesheet">

    <style>
        .navbar-custom {
            background-color:#fff;
            color:#414141;
            border-radius:0;
            min-height: 65px;
            padding-top: 10px;

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
    </style>

</head>
<body>
<nav class="navbar navbar-custom navbar-static-top">
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
    </div><!-- /.navbar-collapse -->
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


</body>
</html>
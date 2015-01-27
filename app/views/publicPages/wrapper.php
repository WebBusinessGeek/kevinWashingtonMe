
<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KevinWashigntonMe</title>

    <link href="/angular-bootstrap/bootstrap-twit/css/bootstrap.css" rel="stylesheet">
    <link href="/angular-bootstrap/bootstrap-twit/css/bootstrap-theme.css" rel="stylesheet">


</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">KevinWashington.Me</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="/skills">Skills</a></li>
                <li><a href="/experiences">Experiences</a></li>
                <li><a href="/connect">Connect</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<?php

$env =  \Illuminate\Support\Facades\App::environment();

?>
?>
<br/>
<br/>
<br/><br/>


<div class="container">

<?php
    if(isset($content))
    {
        echo $content;
        echo $env;
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
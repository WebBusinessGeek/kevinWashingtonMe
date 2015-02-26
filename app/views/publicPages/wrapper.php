
<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kevin Washington | Developing Products & Generating Traction</title>

    <link href="/angular-bootstrap/bootstrap-twit/css/bootstrap.css" rel="stylesheet">
    <link href="/angular-bootstrap/bootstrap-twit/css/bootstrap-theme.css" rel="stylesheet">
    <link href="/angular-bootstrap/bootstrap-twit/css/innerPageStyling.css" rel="stylesheet">
    <link href="/angular-bootstrap/bootstrap-twit/css/customSkill.css" rel="stylesheet">


    <link rel="shortcut icon" href="/assets/kwFavIcon.ico" type="image/x-icon">
    <link rel="icon" href="/assets/kwFavIcon.ico" type="image/x-icon">

    <link href='http://fonts.googleapis.com/css?family=Buenard:700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Arvo:400,700|Roboto:100' rel='stylesheet' type='text/css'>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>


    <style>
        .backgroundNeeded {
            background: #dadada;
        }

        .contactImage:hover {
            cursor: pointer;
        }

        .contactSection {
            margin-top:20px;
            background: #fff;
        }

        #contactForm {
            margin-top: 30px;
            background: #fff;
        }

        #contactFormHeader {
            border-bottom-style: solid;
            border-bottom-width: 1px;
            border-bottom-color: #dadada;
            padding-bottom: 15px;
            margin-bottom: 15px;
        }

        #contactFormInputs {
            font-family: 'Roboto', sans-serif;
            padding-right: 30px;
        }

        #contactFormPreview {
            background: #fff;
            max-height: 410px;
            border: solid 1px #dadada;
            font-family: 'roboto', sans-serif;
        }

        .subText {
            font-family: 'Roboto', sans-serif;
        }

        label {
            font-family: 'arvo', serif;
            font-size: 13px;
        }

        .imageContainer:hover {
            background:#dadada;
        }

        .activeImage {
            background:#808387;
        }

        .activeImage:hover {
            background:#808387;
        }

        .activeNavLink {
            text-decoration: underline;
        }

        .navLinks:link{
            color:#fff;
        }
        .navLinks:active{
            color:#fff;
        }
        .navLinks:visited{
            color:#fff;
        }
        .navLinks:hover{
            color:#000;
        }

    </style>

</head>

<body>


<nav class="navbar navbar-static-top text-center">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">
            <img class="brandImage" src="/assets/kwIconWhite.png">
        </a>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
            <li><a ng-class="{'activeNavLink': currentUrl== 'skills'}" class="navLinks" href="/skills">Skills</a></li>
            <li><a ng-class="{'activeNavLink': currentUrl== 'services'}" class="navLinks" href="/services">Services</a></li>
<!--            <li><a ng-class="{'activeNavLink': currentUrl== 'experiences'}" class="navLinks" href="/experiences">Experiences</a></li>-->
            <li><a ng-class="{'activeNavLink': currentUrl== 'connect'}" class="navLinks" href="/connect">Connect</a></li>
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
    <script src="app/services.js"></script>
    <script src="app/skillJquery.js"></script>
    <script src="/angular-bootstrap/bootstrap-twit/js/bootstrap.min.js"></script>


<!-- Analytic scripts -->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-59821417-1', 'auto');
    ga('send', 'pageview');
</script>
<script src="//static.getclicky.com/js" type="text/javascript"></script>
<script type="text/javascript">try{ clicky.init(100818102); }catch(e){}</script>
<!-- /Analytic scripts -->

</body>
</html>
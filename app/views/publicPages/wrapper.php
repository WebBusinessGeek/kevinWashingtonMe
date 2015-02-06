
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


        /*category carousel styling */
        .carousel-control.left,.carousel-control.right {
            background-image:none;
            color:red;
        }

        /*end category carousel styling*/




        h2 {
            color: #FFF;
        }

        h4 {
            color: #666;
        }

        p {
            color: #333;
            font-size: 13px;
        }

        main {
            margin: 50px auto;
            width: 550px;
        }

        section {
            margin-top: 30px;
            background: #E3F9F9;
            padding: 20px;
            box-shadow: 0 3px 5px rgba(0, 0, 0, 0.15);
        }

        .dropdown {
            width: 250px;
            display: inline-block;
            margin-right: 10px;
            position: relative;
        }

        .dropdown.toggle > input {
            display: none;
        }

        .dropdown > a, .dropdown.toggle > label {
            border-radius: 2px;
            box-shadow: 0 6px 5px -5px rgba(0, 0, 0, 0.3);
        }

        .dropdown > a::after, .dropdown.toggle > label::after {
            content: "";
            float: right;
            margin: 15px 15px 0 0;
            width: 0;
            height: 0;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-top: 10px solid #CCC;
        }

        .dropdown ul {
            list-style-type: none;
            display: block;
            margin: 0;
            padding: 0;
            position: absolute;
            width: 100%;
            box-shadow: 0 6px 5px -5px rgba(0, 0, 0, 0.3);
            overflow: hidden;
        }

        .dropdown a, .dropdown.toggle > label {
            display: block;
            padding: 0 0 0 10px;
            text-decoration: none;
            line-height: 40px;
            font-size: 13px;
            text-transform: uppercase;
            font-weight: bold;
            color: #999;
            background-color: #FFF;
        }

        .dropdown li {
            height: 0;
            overflow: hidden;
            transition: all 500ms;
        }

        .dropdown.hover li {
            transition-delay: 300ms;
        }

        .dropdown li:first-child a {
            border-radius: 2px 2px 0 0;
        }

        .dropdown li:last-child a {
            border-radius: 0 0 2px 2px;
        }

        .dropdown li:first-child a::before {
            content: "";
            display: block;
            position: absolute;
            width: 0;
            height: 0;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            border-bottom: 10px solid #FFF;
            margin: -10px 0 0 30px;
        }

        .dropdown a:hover, .dropdown.toggle > label:hover, .dropdown.toggle > input:checked ~ label {
            background-color: #EEE;
            color: #666;
        }

        .dropdown > a:hover::after, .dropdown.toggle > label:hover::after, .dropdown.toggle > input:checked ~ label::after {
            border-top-color: #AAA;
        }

        .dropdown li:first-child a:hover::before {
            border-bottom-color: #EEE;
        }

        .dropdown.hover:hover li, .dropdown.toggle > input:checked ~ ul li {
            height: 40px;
        }

        .dropdown.hover:hover li:first-child, .dropdown.toggle > input:checked ~ ul li:first-child {
            padding-top: 15px;
        }

        footer {
            position: fixed;
            bottom: 0;
            right: 0;
            font-size: 13px;
            background: #DDD;
            padding: 5px 10px;
            margin: 5px;
        }


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

<script type="text/javascript">
    $( document ).ready(function() {
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


        // close the toggle menu if user clicks outside of the menu

        $(document).click(function(event) {
            if(
                $('.toggle > input').is(':checked') &&
                !$(event.target).parents('.toggle').is('.toggle')
            ) {
                $('.toggle > input').prop('checked', false);
            }
        })
    });

/*fix*/

</script>

<script src="/angular-bootstrap/bootstrap-twit/js/bootstrap.min.js"></script>



</body>
</html>
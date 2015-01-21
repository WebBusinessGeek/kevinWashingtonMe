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
    <div class="container">
        <h1>Hello, world!</h1>
        <input type="text" ng-model="name">{{name}}


        <div ng-controller="someController">
            <div ng-repeat="tag in tags">
                {{tag.title}}
            </div>
            <hr/>

            <div ng-repeat="tag in tagsFromCall">
                <h4>{{tag.title}}</h4>
                <p>{{tag.skill.title}}</p>
            </div><hr/>

        </div>

    </div>


    <script src="angular-bootstrap/angular.min.js"></script>
    <script src="angular-bootstrap/angular-route.min.js"></script>
    <script src="app/app.js"></script>
    <script src="app/home.js"></script>


</body>
</html>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sam Graham's Homepage</title>

    <?php
        require 'head.php';
    ?>
    <script src="js/samsApp.js"></script>
</head>
<body ng-app="samsApp" class="container">
<header class="page-header">
    <div ng-controller="headerController">
        <h1>{{title}} <small>{{subtitle}}</small></h1>
    </div>
</header>
<nav ng-controller="navController">
    <div class="btn-group" role="group">
        <div class="btn-group" role="group">
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="true">
                    Around the Web
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                    <li role="presentation" ng-repeat="link in links"><a role="menuitem" tabindex="-1" href="{{link.ref}}" target="_blank">{{link.name}}</a></li>
                </ul>
            </div>
        </div>
        <div class="btn-group" role="group">
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="true">
                    Assignments
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu2">
                    <li ng-repeat="assignment in assignments"><a href="{{assignment.ref}}">{{assignment.name}}</a></li>
                </ul>
            </div>
        </div>
        <div class="btn-group" role="group">
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="true">
                    Technologies Used
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu3">
                    <li ng-repeat="logo in logos"><a href="{{logo.link}}" target="_blank">{{logo.name}}</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<div class="row" ng-controller="logoController">
    <div class="col-lg-1 col-md-1 well">
        <img src="img/me.jpg" alt="Sam Graham, The Man, The Myth, The Legend"/>
    </div>
    <div class="col-lg-11 col-md-11"  ng-view></div>
    <div class="col-lg-2 col-md-2 well" ng-repeat="logo in logos">
        <a href="{{logo.link}}" target="_blank"><img class="hvr-grow-rotate" ng-src="{{logo.ref}}" alt="{{logo.name}}" /></a>
    </div>
</div>


<footer class="row well">
    <div ng-controller="footerController">
        <h5 class="col-md-3 col-lg-3"><a href="mailto:{{email}}">{{email}}</a></h5>
    </div>
</footer>

</body>
</html>
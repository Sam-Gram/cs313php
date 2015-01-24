var app = angular.module('samsApp', ['ngRoute']);

app.config(function ($routeProvider) {
    $routeProvider
        .when('/', {
            templateUrl: 'pages/about.html',
            controller:  'aboutController'
        })
        .when('/assignments', {
            templateUrl: 'pages/assignments.html',
            controller:  'assignmentController'
        })
});

app.factory('assignmentService', [function () {
    return {
        getAssignments: function () {
            return [
                {name: "Coming Soon", ref: "https://www.youtube.com/watch?v=dQw4w9WgXcQ"},
                {name: "To a Theater near you", ref: "https://www.youtube.com/watch?v=MZoO8QVMxkk"},
                {name: "Rick Roll", ref: "https://www.youtube.com/watch?v=dQw4w9WgXcQ"},
                {name: "PHP Survey", ref: "vote.php"}
            ];
        }
    };
}]);

app.factory('logoService', [function () {
    return {
        getLogos: function () {
            return [
                {name: "Bootstrap", ref: "img/bootstrap.png", link: "http://getbootstrap.com/"},
                {name: "Git", ref: "img/git-logo.jpg", link: "http://git-scm.com/"},
                {name: "HTML5", ref: "img/html5.png", link: "http://www.w3.org/html/logo/"},
                {name: "Javascript", ref: "img/javascript.png", link: "http://www.w3.org/standards/webdesign/script.html"},
                {name: "JQuery", ref: "img/jquery.jpg", link: "http://jquery.com/"},
                {name: "AngularJs", ref: "img/angularjs.png", link: "https://angularjs.org/"},
                {name: "CSS_sucks", ref: "img/css_sucks.jpg", link: "http://css-tricks.com/awesome-css-themed-t-shirts/"},
                {name: "Open Shift", ref: "img/openshift.svg", link: "https://www.openshift.com/"},
                {name: "PHP", ref: "img/php.jpg", link: "http://php.net/"},
                {name: "MySQL", ref: "img/mysql.jpg", link: "http://www.mysql.com/"},
                {name: "GitHub", ref: "img/github.jpg", link: "https://github.com/"},
                {name: "Jenkins", ref: "img/headshot.png", link: "http://jenkins-ci.org/"}
            ];
        }
    };
}]);

app.controller('aboutController', ['$scope', '$location', function ($scope, $location) {
    $scope.description     = "My name is Sam Graham. I am from the Redmond Washington area. I grew up in The Church of Jesus Christ of Latter-day Saints. Most of the church member in my local congregation were programmers at a small company called Microsoft. I didn't get into programming until my cousin told me to take my High School's programming class. I failed at the class for around 4 months. Then after a lot of prayers, coding clicked in my brain.";
    $scope.goToAssignments = function () {
        $location.path('assignments');
    };
}]);

app.controller('assignmentController', ['$scope', 'assignmentService', function ($scope, assignmentService) {
    $scope.assignments = assignmentService.getAssignments();
}]);

app.controller('headerController', ['$scope', function ($scope) {
    $scope.title     = "Sam Graham's Home Page";
    $scope.subtitle  = "In teaching others we teach ourselves";
}]);

app.controller('navController', ['$scope', 'assignmentService', 'logoService', function ($scope, assignmentService, logoService) {
    $scope.links = [
        {name: "GitHub", ref: "https://github.com/Samuel-Graham"},
        {name: "Hacker Rank", ref: "https://www.hackerrank.com/samgraham"},
        {name: "Stack Overflow", ref: "http://stackoverflow.com/users/2521049/sam-graham"}
    ];
    $scope.assignments = assignmentService.getAssignments();
    $scope.logos       = logoService.getLogos();
}]);

app.controller('footerController', ['$scope', function ($scope) {
    $scope.name  = 'Sam Graham';
    $scope.phone = '(425) 999-5539';
    $scope.email = 'samgraham@outlook.com';
}]);

app.controller('logoController', ['$scope', 'logoService', function ($scope, logoService) {
    $scope.logos = logoService.getLogos();
}])
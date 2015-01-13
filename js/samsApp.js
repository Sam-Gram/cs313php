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
                {name: "One", ref: "assign01.html"}
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

app.controller('navController', ['$scope', 'assignmentService', function ($scope, assignmentService) {
    $scope.links = [
        {name: "GitHub", ref: "https://github.com/Samuel-Graham"},
        {name: "Hacker Rank", ref: "https://www.hackerrank.com/samgraham"},
        {name: "Stack Overflow", ref: "http://stackoverflow.com/users/2521049/sam-graham"}
    ];
    $scope.assignments = assignmentService.getAssignments();
}]);

app.controller('footerController', ['$scope', function ($scope) {
    $scope.name  = 'Sam Graham';
    $scope.phone = '(425) 999-5539';
    $scope.email = 'samgraham@outlook.com';
}]);
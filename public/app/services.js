
angular.module('app')
    .controller('servicesController',['$scope', '$http', function($scope, $http)
    {
        $scope.$parent.currentUrl = 'services';

        $scope.servicesSetTo = '';

        $scope.showServices = function(value)
        {
            $scope.servicesSetTo = value;
        };

        $scope.noQuestions = function()
        {
            $scope.revealQuestions = false;
            $scope.revealServices = true;
        };

        $scope.yesQuestions = function()
        {
            $scope.revealQuestions = true;
        };

        $scope.answerYes = function(number)
        {
            $scope.answered = number;
            $scope.yesCounter++;
        };
        $scope.answerNo = function(number)
        {
            $scope.answered = number;
            $scope.noCounter++;
        };




    }]);




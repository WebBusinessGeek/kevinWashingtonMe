
angular.module('app')


    .controller('tmiController', ['$scope', function($scope)
    {
        $scope.$parent.currentUrl = 'tmi';
    }]);
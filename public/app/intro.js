angular.module('app')


    .controller('introController', ['$scope', function($scope)
    {
        $scope.$parent.currentUrl = 'intro';
    }]);
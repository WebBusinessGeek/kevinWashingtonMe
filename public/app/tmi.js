
angular.module('app')


    .controller('tmiController', ['$scope', function($scope)
    {
        $scope.$parent.currentUrl = 'tmi';

        $scope.showing = '10Things';

        $scope.show = function(target)
        {
            $scope.showing = target;
        }
    }]);
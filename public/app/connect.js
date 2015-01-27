
angular.module('app')
    .controller('connectController',['$scope', '$http', function($scope, $http)
    {

        $scope.showing = 'form';

        $scope.show = function(item)
        {
            $scope.showing = item;
        }
    }]);
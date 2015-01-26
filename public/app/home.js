
angular.module('app')

.controller('homeController', ['$scope', '$http', '$filter', function($scope, $http, $filter)
{
    $scope.tags = [];

    $http.get('/api.v1/')
        .success(function(data){
            $scope.tags = data;
        });


}]);


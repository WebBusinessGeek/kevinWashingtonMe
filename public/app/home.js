
angular.module('app')

.controller('homeController', ['$scope', '$http', function($scope, $http)
{
    $scope.tags = [];

    $http.get('/api.v1/')
        .success(function(data){
            $scope.tags = data;
            console.log($scope.tags);
        });
}]);
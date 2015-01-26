
angular.module('app')

.controller('homeController', ['$scope', '$http', function($scope, $http)
{

    $http.get('/api.v1/')
        .success(function(data){
            $scope.tags = data;
        });


}]);


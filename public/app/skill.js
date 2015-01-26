
angular.module('app')

    .controller('skillController', ['$scope', '$http', function($scope, $http)
    {
        $http.get('/api.v1/skills')
            .success(function(data){
                $scope.tags = data.tags;
                $scope.supercategories = data.supercategories;
            });


    }]);

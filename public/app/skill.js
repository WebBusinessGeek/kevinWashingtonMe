
angular.module('app')

    .controller('skillController', ['$scope', '$http', function($scope, $http)
    {
        $http.get('/api.v1/skills')
            .success(function(data){
                $scope.tags = data.tags;
                $scope.supercategories = data.supercategories;
            });


        $scope.showing = null;

        $scope.show = function(item)
        {
            $scope.showing = item;
        };

        $scope.stopShow = function()
        {
            $scope.showing = null;
        }
    }]);

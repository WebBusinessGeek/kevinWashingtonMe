
angular.module('app')

    .controller('skillController', ['$scope', '$http', function($scope, $http)
    {
        $http.get('/api.v1/skills')
            .success(function(data){
                $scope.tags = data.tags;
                $scope.supercategories = data.supercategories;
                $scope.categories = data.categories;
            });


        if($scope.tagQuery != null)
        {
            $scope.selectedCategory = null;
        }




        $scope.showing = null;
        $scope.show = function(item)
        {
            $scope.showing = item;

        };
        $scope.stopShow = function()
        {
            $scope.showing = null;
        };




        $scope.selectedCategory = null;
        $scope.categorySelect = function(item)
        {
            $scope.selectedCategory = item;
            $scope.tagQuery = null;
            $scope.stopShow();
        };
        $scope.categoryDeSelect = function()
        {
           $scope.selectedCategory = null;
        };




    }]);

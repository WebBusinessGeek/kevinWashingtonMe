
angular.module('app')

    .controller('skillController', ['$scope', '$http', function($scope, $http)
    {
        $http.get('/api.v1/skills')
            .success(function(data){
                $scope.supercategories = data.supercategories;
                $scope.categories = data.categories;
                $scope.skills = data.skills;
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




        $scope.hover = function(item)
        {
            $scope.hovered = item;
        };

        $scope.clearHover = function()
        {
            $scope.hovered = null;
        };

        $scope.setSupercategory = function(item)
        {
            $scope.clearSupercategory();
            $scope.supercategorySetTo = item;
            $scope.textQuery = null;
        };

        $scope.clearSupercategory = function()
        {
            $scope.supercategorySetTo = null;
            $scope.categorySetTo = null;
            $scope.skillSetTo = null;
        };

        $scope.setCategory = function(item)
        {
            $scope.categorySetTo = item;
            $scope.textQuery = null;
        };
        $scope.clearCategory = function()
        {
            $scope.categorySetTo = null;
            $scope.skillSetTo = null;
        };

        $scope.setSkill = function(item)
        {
            $scope.skillSetTo = item;
            $scope.textQuery = null;
        };
        $scope.clearSkill = function()
        {
            $scope.skillSetTo = null;
        };


        $scope.carouselSetCategory = function(item)
        {
            $scope.clearSupercategory();
            $scope.setCategory(item);
        }

    }]);

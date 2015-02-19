
angular.module('app')

    .controller('skillController', ['$scope', '$http', '$timeout', function($scope, $http, $timeout)
    {
        $scope.loading = true;

        $timeout(function() {
            $scope.loading = false;
        }, 4000);
        $http.get('/api.v1/skills')
            .success(function(data){
                $scope.supercategories = data.supercategories;
                $scope.categories = data.categories;
                $scope.skills = data.skills;
            });



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

        };
        $scope.clearSkill = function()
        {
            $scope.skillSetTo = null;
        };


        $scope.carouselSetCategory = function(item)
        {
            $scope.clearSupercategory();
            $scope.setCategory(item);
        };

        $scope.directorySetCategory = function(item)
        {
            $scope.clearCategory();
            $scope.setCategory(item);
        };

        $scope.getImageNameFromTitle = function(title)
        {
            lowerCaseTheTitle = title.toLowerCase();
            replaceSpacesWithUnderscore = lowerCaseTheTitle.split(' ').join('_');
            return replaceSpacesWithUnderscore;
        };


    }]);


angular.module('app')
    .controller('experienceController',['$scope', '$http',function($scope, $http)
    {
        $scope.$parent.currentUrl = 'experiences';

        $http.get('/api.v1/experiences')
            .success(function(data){
                $scope.experiences = data.experiences;
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
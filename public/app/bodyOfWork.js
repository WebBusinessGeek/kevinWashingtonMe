
angular.module('app')
    .controller('bodyOfWorkController', ['$scope', function($scope)
    {
        $scope.showProjectWorkExample = function (setting)
        {
            $scope.showingProjectWorkExample = setting;
        };

        $scope.hideProjectWorkExample = function ()
        {
           $scope.showingProjectWorkExample = false;
        }
    }]);
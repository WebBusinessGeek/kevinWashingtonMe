
angular.module('app')


    .controller('tmiController', ['$scope', function($scope)
    {
        $scope.$parent.currentUrl = 'tmi';

        $scope.showing = '';

        $scope.show = function(target)
        {
            $scope.showing = target;
        };

        $scope.currentTMI = '0';

        $scope.setTMIto1 = function ()
        {
            $scope.currentTMI = 1;
        };

        $scope.nextTMI = function()
        {
            if($scope.currentTMI == 10)
            {
                $scope.currentTMI = 0;
            }
            $scope.currentTMI++;
        };

        $scope.prevTMI = function()
        {
            $scope.currentTMI--;
        };

        $scope.end10Things = function()
        {
            $scope.currentTMI = 'done';
        }
    }]);
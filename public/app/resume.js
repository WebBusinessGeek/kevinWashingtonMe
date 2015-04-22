
angular.module('app')

    .controller('resumeController', ['$scope', function($scope)
    {

        $scope.workHistoryShowing = 1;

        $scope.workHistoryPrev = function()
        {
            if($scope.workHistoryShowing == 1)
            {
                $scope.workHistoryShowing = 5;
            }
            $scope.workHistoryShowing--;
        };
        $scope.workHistoryNext = function()
        {
            if($scope.workHistoryShowing == 4)
            {
                $scope.workHistoryShowing = 0;
            }
            $scope.workHistoryShowing++;
        }

    }]);
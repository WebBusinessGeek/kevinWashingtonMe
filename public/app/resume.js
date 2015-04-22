
angular.module('app')

    .controller('resumeController', ['$scope', function($scope)
    {

        $scope.workHistoryShowing = 1;

        $scope.workHistoryPrev = function()
        {
            if($scope.workHistoryShowing == 1)
            {
                $scope.workHistoryShowing = 7;
            }
            $scope.workHistoryShowing--;
        };
        $scope.workHistoryNext = function()
        {
            if($scope.workHistoryShowing == 6)
            {
                $scope.workHistoryShowing = 0;
            }
            $scope.workHistoryShowing++;
        };


        $scope.moreShowing = false;

        $scope.showMore = function()
        {
            $scope.moreShowing = true;
        };

        $scope.hideMore = function()
        {
            $scope.moreShowing = false;
        };

    }]);
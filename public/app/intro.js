angular.module('app')


    .controller('introController', ['$scope', function($scope)
    {
        $scope.$parent.currentUrl = 'intro';

        $scope.currentPic = 'original';

        $scope.changePic = function()
        {
            if($scope.currentPic == 'original')
            {
                $scope.currentPic = 'funny';
            }
            else
            {
                $scope.currentPic = 'original';
            }
        }
    }]);
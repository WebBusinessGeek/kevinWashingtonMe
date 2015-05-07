
angular.module('app')

    .controller('demonstrationController', ['$scope', function($scope)
    {
        $scope.VTSetting= 'video';

        $scope.videoTranscriptSwitch = function()
        {
            if($scope.VTSetting == 'video')
            {
                $scope.VTSetting = 'transcript';
            }
            else
            {
                $scope.VTSetting = 'video';
            }
        }
    }]);
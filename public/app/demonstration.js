
angular.module('app')

    .controller('demonstrationController', ['$scope',  function($scope)
    {

        $scope.currentPathname = window.location.pathname;

        if($scope.currentPathname == '/recruitment/am-i-a-good-fit')
        {
            $scope.headline = 'Am I A Good Fit for Your Team?';
            $scope.ctaLink = '/recruitment/1/lets-work-together';
        }
        if($scope.currentPathname == '/recruitment/what-i-bring')
        {
            $scope.headline = 'What I Can Bring to Your Team';
            $scope.ctaLink = '/recruitment/2/lets-work-together';
        }

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
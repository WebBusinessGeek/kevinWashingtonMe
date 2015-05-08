
angular.module('app')

    .controller('conversionController', ['$scope', function($scope)
    {
        $scope.interviewConnectSetting = 'interview';

        $scope.interviewConnectSettingSwitch = function()
        {
            if($scope.interviewConnectSetting == 'interview')
            {
                $scope.interviewConnectSetting = 'connect';
            }
            else
            {
                $scope.interviewConnectSetting = 'interview';
            }
        }
    }]);

angular.module('app')

    .controller('conversionController', ['$scope', '$http', function($scope, $http)
    {
        $scope.hidePrivateData = true;

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
        };

        $scope.submitConnectRequest = function(connectContainer)
        {
            var data = {
                name : connectContainer.name,
                body : connectContainer.message,
                contactMethod : connectContainer.contactMethod,
                email : connectContainer.email,
                phone : connectContainer.phone
            };

            $http.post('/api.v1/connect', data).
                success(function(data, status,headers,config) {
                    $scope.message = data;
                    console.log(data);
                }).
                error(function (data, status,headers,config) {
                    $scope.error = data;
                });

        }
    }]);

angular.module('app')

    .controller('conversionController', ['$scope', '$http', function($scope, $http)
    {
        $scope.currentUrl = window.location.pathname;

        if($scope.currentUrl == '/recruitment/1/lets-work-together')
        {
            $scope.nextUrl = '/recruitment/1/thank-you';
        }
        else
        {
           $scope.nextUrl = '/recruitment/2/thank-you';
        }

        $scope.hidePrivateData = true;
        $scope.compensationRange = 60000;

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

        $scope.submitInterviewRequest = function(requesterContainer, interviewContainer, positionContainer)
        {
            message = [];
            message['interviewType'] = interviewContainer.type;
            message['interviewContactPerson'] = interviewContainer.contactPerson;
            message['interviewContactMethod'] = interviewContainer.contactMethod;
            message['interviewContactEmail'] = interviewContainer.email;
            message['interviewContactPhone'] = interviewContainer.phone;
            message['companyName'] = positionContainer.companyName;
            message['income'] = positionContainer.income;
            message['website'] = positionContainer.website;
            message['extraInformation'] = positionContainer.info;
            message['workLocation'] = positionContainer.remote;
            message['employment'] = positionContainer.type;

            sendMessage =
                    'interviewType: ' + message['interviewType'] +
                    ', interviewContactPerson: ' + message['interviewContactPerson'] +
                    ', interviewContactMethod: ' + message['interviewContactMethod'] +
                    ', interviewContactEmail: ' + message['interviewContactEmail'] +
                    ', interviewContactPhone: ' + message['interviewContactPhone'] +
                    ', companyName: ' + message['companyName'] +
                    ', income: ' + message['income'] +
                    ', website: ' + message['website'] +
                    ', extraInformation: ' + message['extraInformation'] +
                    ', workLocation: ' + message['workLocation'] +
                    ', employment: ' + message['employment'];


            var data = {
                name : requesterContainer.name,
                body : sendMessage,
                contactMethod : requesterContainer.contactMethod,
                email : requesterContainer.email,
                phone : requesterContainer.phone
            };

            $http.post('/api.v1/connect', data).
                success(function(data, status,headers,config) {
                    $scope.message = data;
                    window.location.assign($scope.nextUrl);
                }).
                error(function (data, status,headers,config) {
                    $scope.error = data;
                });

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
                    window.location.assign($scope.nextUrl);
                }).
                error(function (data, status,headers,config) {
                    $scope.error = data;
                });
        }
    }]);
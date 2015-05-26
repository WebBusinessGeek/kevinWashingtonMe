
angular.module('app')

    .controller('reEngagementForMeetingController', ['$scope', '$http', function($scope, $http)
    {
        $scope.scheduleOptions = 1;

        $scope.hidePrivateData = true;

        $scope.identifyCompanyName = function()
        {
            $scope.getUrl = window.location.pathname;
            $scope.getCompanyNameFromUrl = $scope.getUrl.slice(41);
            $scope.removeUnnecessaryTextFromCompanyName = $scope.getCompanyNameFromUrl.replace('-team', '');
            return $scope.removeUnnecessaryTextFromCompanyName;
        };

        $scope.companyName = $scope.identifyCompanyName();


        $scope.setContentOrSchedule = function (setting)
        {
            $scope.contentOrSchedule = setting;
        };

        $scope.addScheduleOption = function()
        {
            $scope.scheduleOptions++;
        };

        $scope.sendOptions = function (companyName, option1Info, option2Info, option3Info)
        {
            randomString = Math.random().toString(36).substring(7);

            if(option3Info.day != null)
            {
                sendMessage =
                    'I have these times available: '+
                    'Option1: ' + option1Info.day + ' @ ' + option1Info.time +
                    'Option2: ' + option2Info.day + ' @ ' + option2Info.time +
                    'Option3: ' + option3Info.day + ' @ ' + option3Info.time;
            }
            if(option2Info.day == null)
            {
                sendMessage =
                    'I have these times available: '+
                    'Option1: ' + option1Info.day + ' @ ' + option1Info.time;
            }
            else
            {
                sendMessage =
                    'I have these times available: '+
                    'Option1: ' + option1Info.day + ' @ ' + option1Info.time +
                    'Option2: ' + option2Info.day + ' @ ' + option2Info.time;
            }

            var data = {
                name : companyName + randomString,
                body : sendMessage,
                contactMethod : 'email',
                email : 'option'+randomString+'@email.com',
                phone : null
            };

            $http.post('/api.v1/connect', data).
                success(function(data, status,headers,config) {
                    $scope.message = data;
                }).
                error(function (data, status,headers,config) {
                    $scope.error = data;
                });
        };

    }]);
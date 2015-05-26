
angular.module('app')

    .controller('reEngagementForMeetingController', ['$scope', function($scope)
    {
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
        }

    }]);
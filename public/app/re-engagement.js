
angular.module('app')

    .controller('reengagementController', ['$scope', function($scope)
    {

        $scope.tester = 'some test to ensure angular is working';

        $scope.identifyCompanyName = function()
        {
            $scope.getUrl = window.location.pathname;
            $scope.getCompanyNameFromUrl = $scope.getUrl.slice(41);
            $scope.removeUnnecessaryTextFromCompanyName = $scope.getCompanyNameFromUrl.replace('-team', ' ');
            return $scope.removeUnnecessaryTextFromCompanyName;
        };

        $scope.companyName = $scope.identifyCompanyName();




    }]);
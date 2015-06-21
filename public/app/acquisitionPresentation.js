
angular.module('app')
    .controller('acquisitionPresentationController', ['$scope', '$http', function($scope, $http)
    {
        $scope.tester = 'acquisition.js working';

        $scope.getUrlPathname = function()
        {
            url = window.location.pathname;
            return url;
        };
        $scope.splitUrlByDashes = function()
        {
            url = $scope.getUrlPathname();
            splitUrl = url.split('-');
            return splitUrl;
        };
        $scope.roleTitle = $scope.splitUrlByDashes()[3];
        $scope.companyName = $scope.splitUrlByDashes()[6]


    }]);
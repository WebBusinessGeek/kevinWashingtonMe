
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
        $scope.urlSplitIntoAnArray = $scope.splitUrlByDashes();
        $scope.companyName = $scope.urlSplitIntoAnArray[6];

        $http.get('/api.v1/acquisitionData/' + $scope.companyName)
            .success(function(data){
                $scope.roleTitle = data.info.roleTitleForUse;
                $scope.objective1 = data.info.objective1;
                $scope.objective2 = data.info.objective2;
                $scope.objective3 = data.info.objective3;
                $scope.primaryObjective = data.info.primaryObjective;
                $scope.group1 = data.info.group1;
                $scope.group1EngagementTitle = data.info.group1EngagementTitle;
                $scope.group1DemoDescription = data.info.group1DemoDescription;
                $scope.group1ConversionDescription = data.info.group1ConversionDescription;
                $scope.group2 = data.info.group2;
                $scope.group2EngagementTitle = data.info.group2EngagementTitle;
                $scope.group2DemoDescription = data.info.group2DemoDescription;
                $scope.group2ConversionDescription = data.info.group2ConversionDescription;
            });



    }]);
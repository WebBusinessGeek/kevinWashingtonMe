
angular.module('app')
    .controller('reEngagementForOfferController', ['$scope', function($scope)
    {
        $scope.identifyContactNameAndCompanyName = function()
        {
            $scope.url = window.location.pathname;
            $scope.splitUrlByDashes = $scope.url.split('-');
            $scope.getContactName = $scope.splitUrlByDashes[2];
            $scope.getCompanyName = $scope.splitUrlByDashes[13];
            return [$scope.getContactName, $scope.getCompanyName];
        };

        $scope.contactName = $scope.identifyContactNameAndCompanyName()[0];
        $scope.companyName = $scope.identifyContactNameAndCompanyName()[1];

    }]);

angular.module('app')
    .controller('servicesController',['$scope', '$http', function($scope, $http)
    {
        $scope.$parent.currentUrl = 'services';

    }]);




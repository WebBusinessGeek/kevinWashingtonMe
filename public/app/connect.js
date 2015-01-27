
angular.module('app')
    .controller('connectController',['$scope', '$http', function($scope, $http)
    {

        $scope.showing = 'form';

        $scope.show = function(item)
        {
            $scope.showing = item;
        };

        $scope.newInquiry = function(body, name, contactMethod, email, phone)
        {
            console.log(body + name + contactMethod + email + phone);
        }
    }]);




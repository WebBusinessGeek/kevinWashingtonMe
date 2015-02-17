
angular.module('app')
    .controller('connectController',['$scope', '$http', function($scope, $http)
    {

        $scope.showing = 'form';

        $scope.show = function(item)
        {
            $scope.showing = item;
        };

        $scope.newInquiry = function(body, name, contactMethod, email, phone) {

            var data = {
                name : name,
                body : body,
                contactMethod : contactMethod,
                email : email,
                phone : phone
            };

            $http.post('/api.v1/connect', data).
                success(function (data, status, headers, config) {
                    $scope.message = data;
                }).
                error(function (data, status, headers, config) {
                    $scope.error = data;
                });

        };


        $scope.helperMessage = 'Please give me as much information about the purpose of your contact as possible. ' +
        'I look forward to hearing from you.'


    }]);




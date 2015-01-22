/**
 * Created by MacBookEr on 1/21/15.
 */

angular.module('app')
    //.controller('someController', ['$scope, $http', function($scope, $http)
    //{
    //
    //    $scope.tags = {
    //        'tag':{
    //            'title' : 'someTitle1'
    //        },
    //        'tag2':{
    //            'title' : 'someTitle2'
    //        },
    //        'tag3':{
    //            'title' : 'someTitle3'
    //        }
    //    };
    //
    //    //$scope.tagsAjax = $http.get('/');
    //}]);

.controller('someController', ['$scope', '$http', function($scope, $http)
{

    $scope.tags = {
        'tag':{
            'title' : 'someTitle1'
        },
        'tag2':{
            'title' : 'someTitle2'
        },
        'tag3':{
            'title' : 'someTitle3'
        }
    };

    $scope.tagsFromCall = '';

    $scope.tagsAjax = $http.get('/ajax/').
    success(function(data)
        {
            $scope.tagsFromCall = data;
            console.log($scope.tagsFromCall);
        });

}]);

angular.module('app')
    .controller('servicesController',['$scope', '$http', function($scope, $http)
    {
        $scope.$parent.currentUrl = 'services';

        $scope.servicesSetTo = '';

        $scope.yesCounter = 0;
        $scope.noCounter = 0;

        $scope.range = 100;


        $scope.setServices = function(value)
        {
            $scope.servicesSetTo = value;
        };

        $scope.noQuestions = function()
        {
            $scope.revealQuestions = false;
            $scope.revealServices = true;
        };

        $scope.yesQuestions = function()
        {
            $scope.revealQuestions = true;
        };

        $scope.answerYes = function(number)
        {
            $scope.answered = number;
            $scope.yesCounter++;
        };
        $scope.answerNo = function(number)
        {
            $scope.answered = number;
            $scope.noCounter++;
        };

        $scope.showServices = function()
        {
            $scope.revealServices = true;
        };

        $scope.walkOut = function()
        {
            $scope.walk = true;
        };

        $scope.quoteRequest = function()
        {
            $scope.quoteRequested = true;
        };

        $scope.addReferral = function()
        {
            $scope.referralCounter++;
            var myEl = angular.element(document.querySelector( '#lastReferral'));
            myEl.prepend("<div class='row'> <div class='col-sm-4 col-md-4 col-lg-4'> <input type='text' name='name' class='form-control' placeholder='example: Carl Winslow'> </div> <div class='col-sm-4 col-md-4 col-lg-4'> <input type='email' name='email' class='form-control' placeholder='example: carl@familyMatters.com'> </div> <div class='col-sm-4 col-md-4 col-lg-4'> <select class='form-control'> <option>Select one</option> <option value='productDev'>Product development services.</option> <option value='customerAcq'>Customer acquisition services.</option> <option value='marketingTraining'>Free marketing training.</option> <option value='codingTraining'>Free coding training.</option> </select> </div> </div>");
        }


    }]);




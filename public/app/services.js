
angular.module('app')
    .controller('servicesController',['$scope', '$http', function($scope, $http)
    {
        $scope.$parent.currentUrl = 'services';

        $scope.servicesSetTo = '';

        $scope.yesCounter = 0;
        $scope.noCounter = 0;

        $scope.range = 100;

        $scope.referralCounter = 0;

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

        $scope.addReferral = function(counter)
        {
            $scope.referralCounter++;
            var myEl = angular.element(document.querySelector( '#lastReferral'));
            myEl.prepend("<div class='row'> <div class='col-sm-4 col-md-4 col-lg-4'> <input type='text' ng-model='name" +$scope.referralCounter+ "' class='form-control' placeholder='example: Carl Winslow'> </div> <div class='col-sm-4 col-md-4 col-lg-4'> <input type='email' ng-model='email"+ $scope.referralCounter +"' class='form-control' placeholder='example: carl@familyMatters.com'> </div> <div class='col-sm-4 col-md-4 col-lg-4'> <select class='form-control' ng-model='interest"+ $scope.referralCounter +"'> <option>Select one</option> <option value='productDev'>Product development services.</option> <option value='customerAcq'>Customer acquisition services.</option> <option value='marketingTraining'>Free marketing training.</option> <option value='codingTraining'>Free coding training.</option> </select> </div> </div>");
        };


        $scope.sendQuote = function(serviceOfInterest,objectives,teamSize,name,email,phone,quoteFormat, range, url)
        {
            console.log(serviceOfInterest+ objectives+ teamSize+ name+ email+ phone+ quoteFormat +range + url);
            var quoteBody =
                'Hi, im looking for a quote. The service I\'m interested in is: ' + serviceOfInterest +
                ' My objectives are: ' + objectives +
                ' My team size is: ' + teamSize +
                ' My marketing budget is: ' + range +
                ' My url is: ' + url;

            var data = {
                name: name,
                body: quoteBody,
                contactMethod: quoteFormat,
                email: email,
                phone: phone
            };

            $http.post('/api.v1/connect', data).
                success(function(data, status, headers, config) {
                    //$scope.message = data;
                    console.log(data);
            }).
                error(function (data, status, headers, config){
                    $scope.error = data;
                })

        }
    }]);




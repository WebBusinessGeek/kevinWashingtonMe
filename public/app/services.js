
angular.module('app')
    .controller('servicesController',['$scope', '$http', function($scope, $http)
    {
        $scope.$parent.currentUrl = 'services';

        $scope.servicesSetTo = '';

        $scope.yesCounter = 0;
        $scope.noCounter = 0;

        $scope.range = 100;

        $scope.referralCounter = 0;

        $scope.referralsSubmitted = false;
        $scope.quoteRequestSubmitted = false;

        $scope.largeAmenitiesVisible = false;


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
                    $scope.message = data;
            }).
                error(function (data, status, headers, config){
                    $scope.error = data;
                });

            $scope.quoteRequestSubmitted = true;

        };



        $scope.sendReferrals = function(referral0, referral1, referral2, referral3, referral4, referral5)
        {
            referrals = [
                referral0,referral1,referral2,referral3,referral4,referral5
            ];

            var reviewedReferrals = $scope.removeUnsetArrayElements(referrals);

            for(var counter2 = 0; counter2 < reviewedReferrals.length; counter2++ )
            {
                request = $scope.sendInquiryPostRequestFromWalkOutForm(reviewedReferrals[counter2]);
            }
        };

        $scope.removeUnsetArrayElements = function(array)
        {
            for(var counter1 = 0; counter1 < array.length; counter1++)
            {
                if(array[counter1][0] == null || array[counter1][1] == null)
                {
                    array.splice(counter1);
                }
            }
            return array;
        };

        $scope.sendInquiryPostRequestFromWalkOutForm = function(arrayOfAttributes)
        {
            var data = {
                name : arrayOfAttributes[0],
                body : 'from walk out form, im this person may be interested in: ' + arrayOfAttributes[2],
                contactMethod : 'Email',
                email : arrayOfAttributes[1],
                phone : '215-222-0000'
            };

            $http.post('/api.v1/connect', data).
                success(function(data, status, headers, config) {
                    $scope.message = data;
                }).
                error(function (data, status, headers, config){
                    $scope.error = data;
                });

            $scope.referralsSubmitted = true;

        };


        $scope.showLargeAmenities = function()
        {
            $scope.largeAmenitiesVisible = true;
        };

        $scope.hideLargeAmenities = function()
        {
            $scope.largeAmenitiesVisible = false;
        };


    }]);




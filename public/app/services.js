
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
        $scope.smallAmenitiesVisible = false;


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

        $scope.showSmallAmenities = function()
        {
            $scope.smallAmenitiesVisible = true;
        };

        $scope.hideSmallAmenities = function()
        {
            $scope.smallAmenitiesVisible = false;
        };



        $scope.sharedCustomerAcquisitionAmenities = {
            amenity1: {
                amenityName: 'Essential Research',
                amenityDescription: 'Description about essential research'
            },
            amenity2: {
                amenityName: 'Analytics and Performance',
                amenityDescription: 'Description about analytics and performance'
            },
            amenity3: {
                amenityName: 'Objectives',
                amenityDescription: 'Description about objectives'
            },
            amenity4: {
                amenityName: 'Achievement Strategy & Tactics',
                amenityDescription: 'Description about achievement strategy and tactics'
            },
            amenity5: {
                amenityName: 'Project Management',
                amenityDescription: 'Description about project management'
            },
            amenity6: {
                amenityName: 'Success Tracking / Report Development',
                amenityDescription: 'Description about success tracking / report development'
            },
            amenity7: {
                amenityName: 'Conversion Rate & Process Optimization',
                amenityDescription: 'Description about conversion rate & process optimization'
            },
            amenity8: {
                amenityName: 'Follow on Strategy',
                amenityDescription: 'Description about follow on strategy'
            },
            amenity9: {
                amenityName: 'General Collaboration',
                amenityDescription: 'Description about general collaboration'
            }
        };

        $scope.growthOnlyAmenities= {
            amenity1: {
                amenityName: '\'Learn As You Achieve\' Training',
                amenityDescription: 'Description about training'
            },
            amenity2: {
                amenityName: 'Add-ons',
                amenityDescription: 'Description about the add-ons'
            }
        };

        $scope.growthPlusOnlyAmenities = {
            amenity1: {
                amenityName: 'Team Management',
                amenityDescription: 'Description about team management'
            },
            amenity2: {
                amenityName: 'Staff Development and Training',
                amenityDescription: 'Description about staff development and Training'
            },
            amenity3: {
                amenityName: 'Implementation & Execution',
                amenityDescription: 'Description about implementation & execution'
            }

        };


        $scope.sharedProductAmenities = {
            amenity1: {
                amenityName: 'Beach-Head Market Research',
                amenityDescription: 'Description about beach-head market research'
            },
            amenity2: {
                amenityName: 'Base Traction Strategy',
                amenityDescription: 'Description about base traction strategy'
            },
            amenity3: {
                amenityName: 'Customer Research',
                amenityDescription: 'Description about customer research'
            },
            amenity4: {
                amenityName: 'Product Strategy',
                amenityDescription: 'Description about product strategy'
            },
            amenity5: {
                amenityName: 'Product Development',
                amenityDescription: 'Description about product development'
            },
            amenity6: {
                amenityName: 'Alpha/Beta Viability & Testing',
                amenityDescription: 'Description about Alpha/Beat viability & testing'
            },
            amenity7: {
                amenityName: 'Product launch',
                amenityDescription: 'Description about product launch'
            },
            amenity8: {
                amenityName: 'Growth',
                amenityDescription: 'Description about growth'
            },
            amenity9: {
                amenityName: 'General Collaboration',
                amenityDescription: 'Description about general collaboration'
            }
        };

        $scope.innovationOnlyAmenities= {
            amenity1: {
                amenityName: '\'Learn As You Build\' Training',
                amenityDescription: 'Description about learn as you build training'
            },
            amenity2: {
                amenityName: 'Add-ons',
                amenityDescription: 'Description about the add-ons'
            }
        };

        $scope.innovationPlusOnlyAmenities = {
            amenity1: {
                amenityName: 'Team Management',
                amenityDescription: 'Description about team management'
            },
            amenity2: {
                amenityName: 'Professional Level Coding & Design',
                amenityDescription: 'Description about professional level coding and design'
            }
        }


    }]);




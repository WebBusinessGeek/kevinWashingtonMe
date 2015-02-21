<div ng-controller="servicesController">
    <h2 ng-if="!servicesSetTo" class="text-center">I could use help...</h2>

    <div ng-if="!servicesSetTo" class="row">
        <div class="col-lg-2"></div>

        <div class="col-sm-12 col-md-12 col-lg-4">
            <button class="btn btn-warning btn-lg" ng-click="setServices('product')">+ Building my Product</button>
        </div>
        <div class="col-sm-12 col-md-1 col-lg-2"></div>

        <div class="col-sm-12 col-md-12 col-lg-4">
            <button class="btn btn-warning btn-lg" ng-click="setServices('customers')">+ Getting more Customers</button>
        </div>

    </div>



    <!--pre-question/services section-->
    <div ng-if="servicesSetTo && !revealQuestions && !revealServices" class="row text-center">
        <p class="subheader">Before seeing my services, do you mind if I make sure we would be a good fit? I have found that when collaborating, the chemistry in teams can be just as important as the talent of each individual. If its alright with you can I gauge how compatible we are with 3 really quick questions?</p>
        <button class="btn btn-warning btn-lg" ng-click="yesQuestions()">Sure, why not</button> <a ng-click="noQuestions()">No thanks, just show me your services.</a>
    </div>



    <!--question section -->
    <div ng-if="revealQuestions && !revealServices" class="row text-center">
       <!--product questions-->
        <div ng-if="servicesSetTo == 'product'">
            <div ng-if="!answered">
                <p>product question 1</p>
                <button class="btn btn-warning btn-lg" ng-click="answerYes(1)">answer question 1 yes</button>
                <button class="btn btn-danger btn-lg" ng-click="answerNo(1)">answer question 1 no</button>
            </div>
            <div ng-if="answered == 1">
                <p>product question 2</p>
                <button class="btn btn-warning btn-lg" ng-click="answerYes(2)">answer question 2 yes</button>
                <button class="btn btn-danger btn-lg" ng-click="answerNo(2)">answer question 2 no</button>
            </div>
            <div ng-if="answered == 2">
                <p>product question 3</p>
                <button class="btn btn-warning btn-lg" ng-click="answerYes(3)">answer question 3 yes</button>
                <button class="btn btn-danger btn-lg" ng-click="answerNo(3)">answer question 3 no</button>
            </div>
        </div>
        <!--customer questions-->
        <div ng-if="servicesSetTo == 'customers'">
            <div ng-if="!answered">
                <p>customer question 1</p>
                <button class="btn btn-warning btn-lg" ng-click="answerYes(1)">answer question 1 yes</button>
                <button class="btn btn-danger btn-lg" ng-click="answerNo(1)">answer question 1 no</button>

            </div>
            <div ng-if="answered == 1">
                <p>customer question 2</p>
                <button class="btn btn-warning btn-lg" ng-click="answerYes(2)">answer question 2 yes</button>
                <button class="btn btn-danger btn-lg" ng-click="answerNo(2)">answer question 2 no</button>
            </div>
            <div ng-if="answered == 2">
                <p>customer question 3</p>
                <button class="btn btn-warning btn-lg" ng-click="answerYes(3)">answer question 3 yes</button>
                <button class="btn btn-danger btn-lg" ng-click="answerNo(3)">answer question 3 no</button>
            </div>
        </div>

        <!--results to questions-->
        <div ng-if="answered == 3">
            <div ng-if="yesCounter == 0">
                <p>This will be a warning message that we may be incompatible.</p>
                <button class="btn btn-warning btn-lg" ng-click="showServices()">See services anyway</button>
            </div>
            <div ng-if="yesCounter == 1">
                <p>This will be a message that we are a bit different but thats ok.</p>
                <button class="btn btn-warning btn-lg" ng-click="showServices()">View services</button>
            </div>
            <div ng-if="yesCounter == 2">
                <p>This will be a message that we could be a good team</p>
                <button class="btn btn-warning btn-lg" ng-click="showServices()">Check out my services</button>
            </div>
            <div ng-if="yesCounter == 3">
                <p>This will be a message that we should work really well together.</p>
                <button class="btn btn-warning btn-lg" ng-click="showServices()">Look forward to working with you</button>
            </div>
        </div>
    </div>

    <!--service section-->
    <div ng-if="revealServices && !walk">
        <div class="row text-center">
            <div ng-if="servicesSetTo == 'product'">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <p>Consulting/Coaching service - product</p>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <p>Full Management - product</p>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <p>Collaborative/Custom - product</p>
                </div>
            </div>
            <div ng-if="servicesSetTo == 'customers'">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <p>Consulting/Coaching service - customer</p>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <p>Full Management - customer</p>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <p>Collaborative/Custom - customer</p>
                </div>
            </div>
        </div>
        <!--services cta section-->
       <div class="row text-center">
           <a href="/connect" class="btn btn-warning btn-lg">Let's talk more</a>
           <a ng-click="walkOut()">No thanks, I don't need these services.</a>
       </div>

    </div>

    <div ng-if="walk">
        <div class="row text-center">
            <div>
                <h4>Hey, Wait!</h4>
                <p>Sorry we couldn’t work together, I wish you luck anyway. Before you leave could let me know anyone you know who <em>would</em> benefit from these services? Or maybe someone you know who would be interested in free coding or marketing training, <em>yourself included</em>.</p>
            </div>
            <div>
                <p>
                    1.
                    <input class="form-control input-lg" type="text">
                    <input class="form-control input-lg" type="text">
                </p>
            </div>

        </div>
    </div>

</div>


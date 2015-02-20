<div ng-controller="servicesController">
    <h2 ng-if="!servicesSetTo" class="text-center">I could use help...</h2>

    <div ng-if="!servicesSetTo" class="row">
        <div class="col-lg-2"></div>

        <div class="col-sm-12 col-md-12 col-lg-4">
            <button class="btn btn-warning btn-lg" ng-click="showServices('product')">+ Building my Product</button>
        </div>
        <div class="col-sm-12 col-md-1 col-lg-2"></div>

        <div class="col-sm-12 col-md-12 col-lg-4">
            <button class="btn btn-warning btn-lg" ng-click="showServices('customers')">+ Getting more Customers</button>
        </div>

    </div>



    <!--pre-question/services section-->
    <div ng-if="servicesSetTo && !revealQuestions && !revealServices" class="row text-center">
        <p class="subheader">Before seeing my services, do you mind if I make sure we would be a good fit? I have found that when collaborating, the chemistry in teams can be just as important as the talent of each individual. If its alright with you can I gauge how compatible we are with 3 really quick questions?</p>
        <button class="btn btn-warning btn-lg" ng-click="yesQuestions()">Sure, why not</button> <a ng-click="noQuestions()">No thanks, just show me your services.</a>
    </div>



    <!--question section -->
    <div ng-if="revealQuestions" class="row text-center">
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
    </div>

    <!--service section-->
    <div ng-if="revealServices" class="row text-center">
        <p>Services section</p>
    </div>

</div>


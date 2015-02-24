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
        <p class="subheader">Before seeing my services, do you mind if I make sure we would be a good fit? I have found that when collaborating, the chemistry in teams can be just as important as the talent of each individual. If its alright with you can I get an idea of how compatible we are with 3 really quick questions?</p>
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
    <div ng-if="revealServices && !walk && !quoteRequested">

        <!--service amenities-->
        <div class="row text-center">
            <div ng-if="servicesSetTo == 'product'">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <p>Consulting/Coaching service - product</p>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <p>Full Management - product</p>
                </div>
                <!--<div class="col-sm-4 col-md-4 col-lg-4">
                    <p>Collaborative/Custom - product</p>
                </div>-->
            </div>
            <div ng-if="servicesSetTo == 'customers'">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <p>Consulting/Coaching service - customer</p>
                    <ul class="text-left">
                        <li>Essential Research</li>
                        <li>Analytics and Performance</li>
                        <li>Objectives</li>
                        <li>Achievement Strategy & Tactics</li>
                        <li>Project Management</li>
                        <li>Success Tracking / Report Development</li>
                        <li>Conversion Rate & Process Optimization</li>
                        <li>Follow On Strategy</li>
                        <li>Training</li>
                        <li>General Collaboration</li>
                        <li>No Long Term Commitments</li>
                    </ul>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <p>Full Management - customer</p>
                    <ul class="text-left">
                        <li>Essential Research</li>
                        <li>Analytics and Performance</li>
                        <li>Objectives</li>
                        <li>Achievement Strategy & Tactics</li>
                        <li>Project Management</li>
                        <li>Success Tracking / Report Development</li>
                        <li>Conversion Rate & Process Optimization</li>
                        <li>Follow On Strategy</li>
                        <li>Training</li>
                        <li>General Collaboration</li>
                        <li>Team Management</li>
                        <li>Implementation & Execution</li>
                        <li>No Long Term Commitments</li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
                <p>Collaborative/Custom - customer</p>
                <p>Already have some ideas on how you want to work with me? I'm willing to listen.</p>
            </div>
        </div>

        <!--what's the difference?-->
        <div class="row">
            <div class="col-sm-8 col-md-8 col-lg-8 text-center">
                <a>What's the difference?</a >
            </div>
        </div>
        <!--services cta section-->
       <div class="row text-center">
           <h4>See something you Like?</h4>
           <a class="btn btn-warning btn-lg" ng-click="quoteRequest()">Get a quick Quote!</a>
           <br/>
           <a ng-click="walkOut()">No thanks, I don't need these services.</a>
       </div>

        <!--faq section for services-->
        <div id="FAQsection">
            <div class="row text-center">
                <div>
                    FAQ Headline
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div>
                        <h5>Question?</h5>
                        <p>Answers to the question. Answers to the question. Answer to the question</p>
                    </div>
                    <div>
                        <h5>Question?</h5>
                        <p>Answers to the question. Answers to the question. Answer to the question</p>
                    </div>
                    <div>
                        <h5>Question?</h5>
                        <p>Answers to the question. Answers to the question. Answer to the question</p>
                    </div>
                    <div>
                        <h5>Question?</h5>
                        <p>Answers to the question. Answers to the question. Answer to the question</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div>
                        <h5>Question?</h5>
                        <p>Answers to the question. Answers to the question. Answer to the question</p>
                    </div>
                    <div>
                        <h5>Question?</h5>
                        <p>Answers to the question. Answers to the question. Answer to the question</p>
                    </div>
                    <div>
                        <h5>Question?</h5>
                        <p>Answers to the question. Answers to the question. Answer to the question</p>
                    </div>
                    <div>
                        <h5>Question?</h5>
                        <p>Answers to the question. Answers to the question. Answer to the question</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <a class="btn btn-warning btn-lg" ng-click="quoteRequest()">Get a quick Quote!</a>
            <br/>
            <a ng-click="walkOut()">No thanks</a>
        </div>
    </div>

    <!--quote requested section-->
    <div ng-if="quoteRequested">
        <div class="row text-center">
            <div>
                <label for="serviceOfInterest">What are you primarily interested in?</label>
                <select name="serviceOfInterest" class="form-control">
                    <option>Select one</option>
                    <option value="customers">Getting more customers.</option>
                    <option value="product">Building a product.</option>
                </select>
            </div>

            <div>
               <label for="objectives">What are some of your business objectives? </label>
               <textarea name="objectives" placeholder="some info here" class="form-control" rows="10" cols="30"></textarea>
            </div>

            <div>
                <label for="maxBudget">What is the most your are willing to spend on a monthly basis to achieve these objectives?</label>
                <input  type="range" name="maxBudget" min="100" max="25000" step="100" ng-model="range">
                ${{range}}/monthly.
            </div>

            <div>
                <label for="teamSize">Team size:</label>
                <select name="teamSize" class="form-control">
                    <option value="1">Just me</option>
                    <option value="5">5 or less</option>
                    <option value="10">10 or less</option>
                    <option value="20">20 or less</option>
                    <option value="30">30 or less</option>
                    <option value="40">more than 30</option>
                </select>
            </div>

            <div>
                <label for="url">URL (if you already have a product/service)</label>
                <input type="text" name="url" class="form-control" placeholder="example: http://myproduct.com">
            </div>

            <div>
                <label for="name">Full Name (of person who will be receiving the quote.)</label>
                <input type="text" name="name" class="form-control" placeholder="example: Carl Winslow">
            </div>

            <div>
                <label for="email">Email (of person who will be receiving the quote.)</label>
                <input type="email" name="email" class="form-control" placeholder="example: carl@familyMatters.com">
            </div>

            <div>
                <label for="phone">Phone (of person who will be receiving the quote.)</label>
                <input type="text" name="phone" class="form-control" placeholder="example: 610-555-4545">
            </div>

            <div>
                <label for="quoteFormat">How should I send your quote for review?</label>
                <select name="quoteFormat" class="form-control">
                    <option>Select one</option>
                    <option value="email">Via email</option>
                    <option value="phone">Via phone</option>
                </select>
            </div>
        </div>
    </div>

    <!--walk section-->
    <div ng-if="walk">
        <div class="row text-center">
            <div>
                <h4>Hey, Wait!</h4>
                <p>Really sorry we won't work together, I wish you luck anyway. Before you leave could let me know anyone you know who <em>would</em> benefit from these services? Or maybe someone you know who would be interested in free coding or marketing training, <em>yourself included</em>. Thanks!</p>
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


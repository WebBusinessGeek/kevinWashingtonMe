
<div class="row text-center" ng-controller="resumeController">
    <div id="resumeIntro" class="col-lg-4 col-md-4 well">
        <div>
            <img class="img-circle img-responsive center-block" src="http://placehold.it/200">
            <h4><span id="firstName">Kevin</span> <span id="lastName">Washington</span></h4>
            <h5>Web Developer & Customer Acquisition Specialist</h5>
        </div>

        <div>
            <h5>What I'm Looking For <em>(flexible)</em></h5>
            <p>Remote Opportunities</p>
            <p>Web based products (SaaS, Hosting, etc.)</p>
            <p>Results > Time @ Work Culture</p>
            <p>Opportunities to learn and grow with others</p>
        </div>

        <div>
            <h5>Education & Learning</h5>
            <p>Roxborough High School <em>Business</em></p>
            <p>Temple University <em>Advertising</em></p>
            <p>Google Analytics <em><a href="https://www.google.com/partners/#i_profile;idtf=103709429231119922285;" target="_blank">Individual Qualification</a></em></p>
        </div>

        <div>
            <h5>Connect with me</h5>
            <p>Phone: </p>
            <p>Skype: </p>
            <p>Email: hello@kevinwashington.me</p>
        </div>

    </div>

    <div class="col-lg-8 col-md-8 well">
        <div id="resumeCustAcq" class="col-lg-6 col-md-6 well">
            <div>
                <img src="http://placehold.it/64">
                <h4>Customer Acquisition</h4>
            </div>

            <div>
                <div>
                    <h5>Specialties</h5>
                    <p>Developing & Optimizing Acquisition Channels</p>
                    <p>Gaining Insights Through Data</p>
                    <p>Process Optimization & Development</p>
                    <p>Growth</p>
                </div>
                <div>
                    <h5>Engagement Methods</h5>
                    <p>SEO</p>
                    <p>Social</p>
                    <p>Advertising</p>
                    <p>Direct Interactions</p>
                    <p>Email</p>
                </div>
                <div>
                    <h5>My Acquisition Process</h5>
                    <p>Understand the Product & the User</p>
                    <p>Develop Channels unique to the Medium and Audience Segment</p>
                    <p>Engage by Adding Value</p>
                    <p>Demonstrate Benefits not Features</p>
                    <p>Ask for the sale</p>
                    <p>Don't forget to ask again</p>
                </div>

            </div>
        </div>
        <div id="resumeWebDev" class="col-lg-6 col-md-6 well">
            <div>
                <img src="http://placehold.it/64">
                <h4>Web Development</h4>

                <div>
                    <div>
                        <h5>Core Technologies</h5>
                        <p>PHP</p>
                        <p>Javascript</p>
                        <p>HTML</p>
                        <p>CSS</p>
                        <p>SQL</p>
                    </div>
                    <div>
                        <h5>Frameworks</h5>
                        <p>Laravel 4.*</p>
                        <p>AngularJS 1.*</p>
                        <p>jQuery</p>
                        <p>Twitter Bootstrap</p>
                    </div>
                    <div>
                        <h5>My Development Mantra</h5>
                        <p>Design for Usability</p>
                        <p>Architect for Change</p>
                        <p>Program for Maintenance</p>
                        <p>Deliver in Sprints</p>
                    </div>
                </div>
            </div>
        </div>

        <div id="resumeMgr" class="col-lg-12 col-md-12 well">

            <div>
                <img src="http://placehold.it/64">
                <h4>Work History</h4>
            </div>
            <div ng-show="workHistoryShowing == 1">

                <div>
                    <h5>Director of Growth</h5>
                    <h6>KarmaCRM</h6>
                    <h6>August 15, 2013 - December 1, 2014</h6>
                    <p></p>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <h5>Responsibilities</h5>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <h5>Skills Used & Developed</h5>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <h5>Notable Achievements</h5>
                    </div>
                </div>
            </div>
            <div ng-show="workHistoryShowing == 2">
                <p>2nd page</p>
            </div>
            <div ng-show="workHistoryShowing == 3">
                <p>3rd page</p>
            </div>
            <div ng-show="workHistoryShowing == 4">
                <p>4th page</p>
            </div>

            <button class="btn btn-warning" ng-click="workHistoryPrev()">Prev</button>
            <button class="btn btn-warning" ng-click="workHistoryNext()">Prev</button>


        </div>
    </div>



</div>
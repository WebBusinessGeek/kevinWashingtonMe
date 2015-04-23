
<div class="row text-center" ng-controller="resumeController">
    <div id="resumeIntro" class="col-lg-4 col-md-4">
        <div id="resumeIntroHeader">
            <img class="img-circle img-responsive center-block" src="http://placehold.it/200">
            <h4><span id="firstName">Kevin</span> <span id="lastName">Washington</span></h4>
            <h5>Web Developer & Customer Acquisition Specialist</h5>
        </div>

        <div id="resumeIntroGreeting">
            <h5>Hello, I'm Kevin</h5>
            <p>
                I help businesses develop innovative products and grow their customer base.
                Please review my resume and feel free to reach out if I seem like a good fit for your business.
                I am happy to provide references upon request.
            </p>
        </div>
        <div id="resumeIntroLooking">
            <h5>What I'm Looking For <em>(flexible)</em></h5>
            <p>Remote Opportunities</p>
            <p>Web based products (SaaS, Hosting, etc.)</p>
            <p>Results > Time @ Work Culture</p>
            <p>Opportunities to learn and grow with others</p>
        </div>

        <div id="resumeIntroLearning">
            <h5>Education & Learning</h5>
            <p>Roxborough High School <br/><em>Business</em></p>
            <p>Temple University <br/><em>Advertising</em></p>
            <p>Google Analytics <br/><em>IQ Certification</em><br/><a id="googleLink" href="https://www.google.com/partners/#i_profile;idtf=103709429231119922285;" target="_blank">view</a></p>
        </div>

        <div id="resumeIntroConnect">
            <h5>Connect with me</h5>
            <p>Phone: (609) 416-1077</p>
            <p>Skype: @web_business_developer </p>
            <p>Email: hello@kevinwashington.me</p>
        </div>

        <div id="resumeIntroNote">
            <p>* Some start and end dates are estimated.</p>
        </div>

    </div>

    <div id="resumeInfoContainer" class="col-lg-8 col-md-8">
        <div id="resumeCustAcq" class="col-lg-6 col-md-6">
            <div>
                <img src="http://placehold.it/64">
                <h4>Customer Acquisition</h4>
            </div>

            <div class="groupings">
                <div class="custAcqGroup">
                    <img src="http://placehold.it/48">
                    <h5>Specialties</h5>
                    <p>Developing & Optimizing Acquisition Channels</p>
                    <p>Gaining Insights Through Data</p>
                    <p>Analyzing Business Performance</p>
                    <p>Process Optimization & Development</p>
                    <p>Growth</p>
                </div>
                <div class="custAcqGroup">
                    <img src="http://placehold.it/48">
                    <h5>Engagement Methods</h5>
                    <p>SEO</p>
                    <p>Social</p>
                    <p>Advertising</p>
                    <p>Direct Interactions</p>
                    <p>Email</p>
                </div>
                <div class="custAcqGroup">
                    <img src="http://placehold.it/48">
                    <h5>My Acquisition Process</h5>
                    <p>1. Understand the Product & the User</p>
                    <p>2. Develop Channels unique to the Medium and Audience Segment</p>
                    <p>3. Engage by Adding Value</p>
                    <p>4. Demonstrate Benefits not Features</p>
                    <p>5. Ask for the sale</p>
                    <p>6. Don't forget to ask again</p>
                </div>

            </div>
        </div>
        <div id="resumeWebDev" class="col-lg-6 col-md-6">
            <div>
                <img src="http://placehold.it/64">
                <h4>Web Development</h4>

                <div class="groupings">
                    <div class="webDevGroup">
                        <img src="http://placehold.it/48">
                        <h5>Core Technologies</h5>
                        <p>PHP</p>
                        <p>Javascript</p>
                        <p>HTML</p>
                        <p>CSS</p>
                        <p>SQL</p>
                    </div>
                    <div class="webDevGroup">
                        <img src="http://placehold.it/48">
                        <h5>Frameworks</h5>
                        <p>Laravel 4.*</p>
                        <p>AngularJS 1.*</p>
                        <p>jQuery</p>
                        <p>Twitter Bootstrap</p>
                        <p>PHPUnit</p>
                    </div>
                    <div id="devMantra" class="webDevGroup">
                        <img src="http://placehold.it/48">
                        <h5>My Development Mantra</h5>
                        <p>*Design for Usability*</p>
                        <p>*Architect for Change*</p>
                        <p>*Code for Maintainability*</p>
                        <p>*Deliver in Sprints*</p>
                    </div>
                </div>
            </div>
        </div>

        <div id="resumeWorkHistory" class="col-lg-12 col-md-12">

            <div>
                <img src="http://placehold.it/64">
                <h4>Relevant Work Experience</h4>
            </div>
          <!--  <button class="btn btn-warning" ng-click="workHistoryPrev()">Prev</button>
            <button class="btn btn-warning" ng-click="workHistoryNext()">Prev</button>-->
            <div id="workHistoryScrollSection" class="row">
                <div class="col-sm-6 col-md-6 col-lg-6" id="workHistoryScrollLeft">
                    <a  ng-click="workHistoryPrev()"><span class="glyphicon glyphicon-chevron-left" ></span>Prev</a>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6" id="workHistoryScrollRight">
                    <a  ng-click="workHistoryNext()">Next<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
                </div>
            </div>


            <div ng-show="workHistoryShowing == 1">

                <div>
                    <h5>Director of Growth</h5>
                    <h6>KarmaCRM</h6>
                    <h6>August 15, 2013 - December 1, 2014 (1 year & 5 months)</h6>
                </div>
                <div ng-mouseEnter="showMore()" ng-mouseLeave="hideMore()">
                    <a ng-hide="moreShowing == true">More</a>
                    <div class="row" ng-hide="moreShowing == false">
                        <div class="moreWorkHistoryInfo">
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <h5>Responsibilities</h5>
                                <p>Manage the lead generation and sales processes for the organization</p>
                                <p>Help develop custom analytic tools to measure and report on business performance</p>
                                <p>Communicate insights from data for business intelligence</p>
                                <p>Develop quarterly growth objectives</p>
                                <p>Architect and implement unique strategies to achieve objectives</p>
                                <p>Create and optimize Acquisition channels</p>
                                <p>Measure and improve growth team performance</p>
                                <p>Collaborate with CEO on critical path of the company</p>
                                <p>Oversee the overall health of the business along with the CEO and Director of Operations</p>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <h5>Skills Used & Developed</h5>
                                <p>Remote Team Management</p>
                                <p>Objective Based project Management</p>
                                <p>Data Insights</p>
                                <p>Business Strategy</p>
                                <p>Budgeting</p>
                                <p>Sales</p>
                                <p>Problem Solving</p>
                                <p>Talent Cultivation</p>
                                <p>Content Development & Promotion</p>
                                <p>U/X Conversion Design</p>
                                <p>Visitor & User Behavior Optimization</p>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <h5>Notable Achievements</h5>
                                <p>145% Increase in conversions</p>
                                <p>449% Increase in New Revenue Per day</p>
                                <p>1079% Increase in Revenue After Attrition</p>
                                <p>Developed an Objective Based Project Management Framework that was embrace company wide.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div ng-show="workHistoryShowing == 2">
                <div>
                    <h5>Freelancer</h5>
                    <h6>Self Employed</h6>
                    <h6>January 2013 - Current</h6>
                </div>
                <div ng-mouseEnter="showMore()" ng-mouseLeave="hideMore()">
                    <a ng-hide="moreShowing == true">More</a>
                    <div class="row" ng-hide="moreShowing == false">
                        <div class="moreWorkHistoryInfo">
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <h5>Responsibilities</h5>
                                <p>Assess and Identify the needs of prospective Clients</p>
                                <p>Provide unique marketing and development solutions to clients and collaborators</p>
                                <p>Consult and problem solve with clients in areas of web development and marketing</p>
                                <p>Manage collaborative teams to ensure all services are fulfilled with quality and within timeframe</p>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <h5>Skills Used & Developed</h5>
                                <p>Remote Team Management</p>
                                <p>Project Management</p>
                                <p>Sales</p>
                                <p>Lead Generation Tactics</p>
                                <p>Problem Solving</p>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <h5>Notable Achievements</h5>
                                <p>Successful collaborations with great team members from across the globe</p>
                                <p>Optimization of fulfillment processes</p>
                                <p>Development of unique sales & bidding strategies leading to increase in project award ratios</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div ng-show="workHistoryShowing == 3">
                <div>
                    <h5>Project Manager</h5>
                    <h6>K. Conliffe, Private Investor</h6>
                    <h6>April 2009 - January 2013 (3 years & 8 months)</h6>
                </div>
                <div ng-mouseEnter="showMore()" ng-mouseLeave="hideMore()">
                    <a ng-hide="moreShowing == true">More</a>
                    <div class="row" ng-hide="moreShowing == false">
                        <div class="moreWorkHistoryInfo">
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <h5>Responsibilities</h5>
                                <p>Generate investment and buy-in for new and developing products</p>
                                <p>Recruit and manage product development teams</p>
                                <p>Manage capital and development expenses</p>
                                <p>Assist in developing revenue generation strategies where customers extracted value</p>
                                <p>Assist in product strategy including branding, business models, and initial product offerings</p>
                                <p>Develop penetration tactics for beach head and follow on markets</p>
                                <p>Ensure product quality with thorough bug testing and error handling</p>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <h5>Skills Used & Developed</h5>
                                <p>Business Strategy</p>
                                <p>Remote Team Management</p>
                                <p>Creative Thinking</p>
                                <p>Problem Solving</p>
                                <p>Business Research</p>
                                <p>Sales</p>
                                <p>Organizational buy-in</p>
                                <p>Project Management</p>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <h5>Notable Achievements</h5>
                                <p>Over 80% Project funding rate</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div ng-show="workHistoryShowing == 4">
                <div>
                    <h5>Director of Field Marketing</h5>
                    <h6>Chandler Consulting</h6>
                    <h6>*August 2008 - January 2009 (6 months)</h6>
                </div>
                <div ng-mouseEnter="showMore()" ng-mouseLeave="hideMore()">
                    <a ng-hide="moreShowing == true">More</a>
                    <div class="row" ng-hide="moreShowing == false">
                        <div class="moreWorkHistoryInfo">
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <h5>Responsibilities</h5>
                                <p>Locate and target niche organizations</p>
                                <p>Navigate company hierarchies to set up sales meetings with decision makers</p>
                                <p>Travel and conduct in person sales presentations</p>
                                <p>Review solution benefits based on needs of the prospect</p>
                                <p>Develop mutual and custom contractual terms of service</p>
                                <p>Oversee fulfillment of services</p>
                                <p>Manage account relations</p>
                                <p>Recruit, hire, and manage members of sales team</p>
                                <p>Organize and conduct regular sales trainings</p>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <h5>Skills Used & Developed</h5>
                                <p>Lead Generation</p>
                                <p>Research</p>
                                <p>Sales Presentations</p>
                                <p>Needs Assessments</p>
                                <p>Problem Solving</p>
                                <p>Contract Negotiations</p>
                                <p>Process Management</p>
                                <p>Team Management</p>
                                <p>Team Development</p>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <h5>Notable Achievements</h5>
                                <p>Maintained highest closing ratio in company while apart of the organization</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div ng-show="workHistoryShowing == 5">
                <div>
                    <h5>Area Sales Manager</h5>
                    <h6>Retro Fitness</h6>
                    <h6>*March 2008 - August 2008 (6 months)</h6>
                </div>
                <div ng-mouseEnter="showMore()" ng-mouseLeave="hideMore()">
                    <a ng-hide="moreShowing == true">More</a>
                    <div class="row" ng-hide="moreShowing == false">
                        <div class="moreWorkHistoryInfo">
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <h5>Responsibilities</h5>
                                <p>Oversee general management of 3 Southeastern Pennsylvania locations</p>
                                <p>Manage account relations with franchisees</p>
                                <p>Ensure collection and corporate delivery of all sensitive documents throughout area</p>
                                <p>Ensure locations operate at or above performance goals for each quarter</p>
                                <p>Organize and conduct location sales trainings</p>
                                <p>Report to Pennsylvania Senior Manager and Regional Vice President</p>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <h5>Skills Used & Developed</h5>
                                <p>Remote Management</p>
                                <p>Account Relations</p>
                                <p>Team Accountability</p>
                                <p>Business Performance Analytics</p>
                                <p>Team Development</p>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <h5>Notable Achievements</h5>
                                <p>Recruited, trained, and promoted 2 General Managers to Pennsylvania region.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div ng-show="workHistoryShowing == 6">
                <div>
                    <h5>Sales Manager</h5>
                    <h6>LA Fitness</h6>
                    <h6>*February 2007 - March 2008 (1 year & 1 month)</h6>
                </div>
                <div ng-mouseEnter="showMore()" ng-mouseLeave="hideMore()">
                    <a ng-hide="moreShowing == true">More</a>
                    <div class="row" ng-hide="moreShowing == false">
                        <div class="moreWorkHistoryInfo">
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <h5>Responsibilities</h5>
                                <p>Oversee general management of 3 Southeastern Pennsylvania locations</p>
                                <p>Manage account relations with franchisees</p>
                                <p>Ensure collection and corporate delivery of all sensitive documents throughout area</p>
                                <p>Ensure locations operate at or above performance goals for each quarter</p>
                                <p>Organize and conduct location sales trainings</p>
                                <p>Report to Pennsylvania Senior Manager and Regional Vice President</p>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <h5>Skills Used & Developed</h5>
                                <p>Remote Management</p>
                                <p>Account Relations</p>
                                <p>Team Accountability</p>
                                <p>Business Performance Analytics</p>
                                <p>Team Development</p>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <h5>Notable Achievements</h5>
                                <p>Recruited, trained, and promoted 2 General Managers to Pennsylvania region.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



</div>
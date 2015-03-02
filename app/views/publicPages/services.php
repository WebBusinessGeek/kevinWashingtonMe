<div ng-controller="servicesController">
    <h2 ng-if="!servicesSetTo" class="text-center pageTitle">I could use help...</h2>

    <div ng-if="!servicesSetTo" class="row text-center ">
        <div class="col-lg-1"></div>

        <div class="col-sm-12 col-md-12 col-lg-4 chooseService" ng-click="setServices('product')">
            <img src="http://placehold.it/250/">
<!--            <button class="btn btn-warning btn-lg" ng-click="setServices('product')">+ Building my Product</button>-->
            <h4>Building my product</h4>
        </div>
        <div class="col-sm-12 col-md-1 col-lg-2"></div>

        <div class="col-sm-12 col-md-12 col-lg-4 chooseService" ng-click="setServices('customers')">
            <img src="http://placehold.it/250/">
<!--            <button class="btn btn-warning btn-lg" ng-click="setServices('customers')">+ Getting more Customers</button>-->
            <h4>Getting more customers</h4>
        </div>

    </div>



    <!--pre-question/services section-->
    <div ng-if="servicesSetTo && !revealQuestions && !revealServices" class="row text-center">
        <div class="col-sm-2 col-md-3 col-lg-3"></div>
        <div id="quizRequest" class="col-sm-8 col-md-6 col-lg-6">
            <h4>Are we a good fit?</h4>

            <img src="http://placehold.it/150/">
            <p class="">
                I have found that when collaborating, the chemistry in teams can be just as important as the talent of each individual.
                Before seeing my services - can I get an idea of how compatible we could be with 3 really quick questions?
            </p>
            <button class="btn btn-warning btn-lg" ng-click="yesQuestions()">Sure, why not</button>
            <br/>
            <a ng-click="noQuestions()">No thanks, just show me your services.</a>
        </div>

    </div>



    <!--question section -->
    <div ng-if="revealQuestions && !revealServices" class="row text-center">
        <div class="col-sm-2 col-md-3 col-lg-3"></div>
        <!--product questions-->
        <div ng-if="servicesSetTo == 'product'">
            <div ng-if="!answered" class="col-sm-8 col-md-6 col-lg-6 quizQuestion">
                <h4>Do you agree?</h4>
                <p>
                    Beach Head Market Selection is the process in which a venture identifies and selects the market that gives it the highest probability of success.
                    In actuality, picking the correct market can be the difference between success and failure.
                    For example, going too niche could give a venture great conversions but low quantity, and selecting a market that's too big or crowded could lead to the venture being overwhelmed.
                    Weighing the strengths of those involved in the venture, determining the total market size, and understanding the customers intimately are a few of the essential todo’s before having enough information to tackle this process effectively.
                </p>
                <button class="btn btn-warning btn-lg" ng-click="answerYes(1)">I agree</button>
                <button class="btn btn-danger btn-lg" ng-click="answerNo(1)">I disagree</button>
            </div>
            <div ng-if="answered == 1" class="col-sm-8 col-md-6 col-lg-6 quizQuestion">
                <h4>Do you agree?</h4>
                <p>
                    A Revenue Generation Strategy is simply the way a business captures the value (or makes money) from the value a product creates for a customer.
                    As the primary objective of most businesses is to generate and maintain a significant amount of sales, this process deserves a lot of attention, innovation, and testing.
                    Identifying the primary captures points in a product’s usage cycle, being empathetic of the customer, and looking for unique competitive advantages are all helpful when working to develop an effective and unique revenue generation model.
                </p>
                <button class="btn btn-warning btn-lg" ng-click="answerYes(2)">I agree</button>
                <button class="btn btn-danger btn-lg" ng-click="answerNo(2)">I disagree</button>
            </div>
            <div ng-if="answered == 2" class="col-sm-8 col-md-6 col-lg-6 quizQuestion">
                <h4>Do you agree?</h4>
                <p>
                    It is my belief that Branding is about perception, and if done well that perception should not only effect the conscious decision making of potential customers, but also the subconscious thought processes that invoke trust and credibility.
                    In many ways a company’s brand can take on an identity of itself and can be manifested as massive customer loyalty or captivating marketing materials.
                    While branding is one of the many concepts I would love to research and understand more, the core component I do understand is that the value of doing it well reaches far beyond simply converting customers and spans into building followings. Which in my opinion can be argued to be much more valuable.
                </p>
                <button class="btn btn-warning btn-lg" ng-click="answerYes(3)">I agree</button>
                <button class="btn btn-danger btn-lg" ng-click="answerNo(3)">I disagree</button>
            </div>
        </div>
        <!--customer questions-->
        <div ng-if="servicesSetTo == 'customers'">
            <div ng-if="!answered" class="col-sm-8 col-md-6 col-lg-6 quizQuestion">
                <h4>Do you agree?</h4>
                <p>
                    Marketing strategy is less about developing low level checklists and more about marrying the low-level abilities to high-level business objectives.
                    It is about asking the right questions, and drawing logical and analytical conclusions.
                    Instead of researching the right keywords, asking oneself if SEO is even the most profitable medium to interact with customers in the first place.
                    Or instead of writing guest posts, asking if that time would have been better spent running sales training or mystery shopping the sales team.
                    Strategy in my opinion cannot just be short term tactics but must also fit cohesively into an overarching plan for marketing success.
                </p>
                <button class="btn btn-warning btn-lg" ng-click="answerYes(1)">I agree</button>
                <button class="btn btn-danger btn-lg" ng-click="answerNo(1)">I disagree</button>

            </div>
            <div ng-if="answered == 1" class="col-sm-8 col-md-6 col-lg-6 quizQuestion">
                <h4>Do you agree?</h4>
                <p>
                    It is my belief that Branding is about perception, and if done well that perception should not only effect the conscious decision making of potential customers, but also the subconscious thought processes that invoke trust and credibility.
                    In many ways a company’s brand can take on an identity of itself and can be manifested as massive customer loyalty or captivating marketing materials.
                    While branding is one of the many concepts I would love to research and understand more, the core component I do understand is that the value of doing it well reaches far beyond simply converting customers and spans into building followings.
                    Which in my opinion can be argued to be much more valuable.
                </p>
                <button class="btn btn-warning btn-lg" ng-click="answerYes(2)">I agree</button>
                <button class="btn btn-danger btn-lg" ng-click="answerNo(2)">I disagree</button>
            </div>
            <div ng-if="answered == 2" class="col-sm-8 col-md-6 col-lg-6 quizQuestion">
                <h4>Do you agree?</h4>
                <p>
                    Customer Research is the attempt to deeply understand the current or potential users of a given product.
                    While it is summed up quite swiftly, the advantages of conducting proper customer research span into many areas of a venture.
                    These applications include staging as a ‘cheat sheet’ for lead generation strategists attempting to locate their target market, while also acting as a blueprint of true pain points leading to more accurate product development.
                    Conducting adequate customer research should keep a venture customer driven and could lead to identifying unmet needs, innovative marketing strategies, and more efficient decision making.
                </p>
                <button class="btn btn-warning btn-lg" ng-click="answerYes(3)">I agree</button>
                <button class="btn btn-danger btn-lg" ng-click="answerNo(3)">I disagree</button>
            </div>
        </div>

        <!--results to questions-->
        <div ng-if="answered == 3">
            <div ng-if="yesCounter == 0" class="col-sm-8 col-md-6 col-lg-6 quizAnswer">
                <h4>I don't know about this...</h4>
                <p>
                    While I am a strong believer that diversity in thinking is needed to learn, grow and develop as a team...
                    It seems we do not agree on many foundational components that are building blocks of
                    <span ng-if="servicesSetTo == 'product'">successful product development.</span>
                    <span ng-if="servicesSetTo == 'customers'"> a successful customer acquisition strategy.</span>
                    I would like to caution you in moving forward with me as many of these incompatibilities could become obstacles in the future.
                </p>
                <button class="btn btn-warning btn-lg" ng-click="showServices()">
                    Review my
                    <span ng-if="servicesSetTo == 'product'">Product development services</span>
                    <span ng-if="servicesSetTo == 'customers'">Customer acquisition services</span>
                    anyway
                </button>
            </div>
            <div ng-if="yesCounter == 1" class="col-sm-8 col-md-6 col-lg-6 quizAnswer">
                <h4>Might be some issues...</h4>
                <p>
                    It seems we have a pretty diverse way of looking at
                    <span ng-if="servicesSetTo == 'product'">product development.</span>
                    <span ng-if="servicesSetTo == 'customers'">customer acquisition.</span>
                    While a bit of constrasting in thought processes are good, I would like to caution you in working with me
                    as these viewpoints are core components of the
                    <span ng-if="servicesSetTo == 'product'">product-to-market</span>
                    <span ng-if="servicesSetTo == 'customers'">lead generation and conversion</span>
                    frameworks I have developed over the years.
                </p>
                <button class="btn btn-warning btn-lg" ng-click="showServices()">
                    Review my
                    <span ng-if="servicesSetTo == 'product'">Product development services</span>
                    <span ng-if="servicesSetTo == 'customers'">Customer acquisition services</span>
                    anyway
                </button>
            </div>
            <div ng-if="yesCounter == 2 || yesCounter == 3" class="col-sm-8 col-md-6 col-lg-6 quizAnswer">
                <h4>Good news...</h4>
                <p>
                    From your answers it seems that we agree on many of the core components that help shape
                    <span ng-if="servicesSetTo == 'product'">a successful product development process.</span>
                    <span ng-if="servicesSetTo == 'customers'">the strategy needed to be effective generating new customers.</span>
                    Hopefully you find one of the plans I offer fitting and we can work together soon!
                </p>
                <button class="btn btn-warning btn-lg" ng-click="showServices()">
                    <span ng-if="servicesSetTo == 'product'">Product development services</span>
                    <span ng-if="servicesSetTo == 'customers'">Customer acquisition services</span>
                </button>
            </div>
        </div>
    </div>

    <!--service section-->
    <div ng-if="revealServices && !walk && !quoteRequested">

        <!--service amenities-->
        <div class="row text-center">
            <div class="col-lg-1"></div>
            <div ng-if="servicesSetTo == 'product'">
                <div class="col-sm-12 col-md-12 col-lg-4 servicePlanSmall">
                    <div class="planHeader">
                        <h4>InnovationPlus</h4>
                    </div>
                    <div class="planSubHeader">
                        <p class="planSubTitle">A cutting-edge product management solution for creators.</p>
                    </div>
                    <div ng-hide="smallAmenitiesVisible" class="planImage" ng-mouseenter="showSmallAmenities()">
                        <p>A cutting-edge product management solution for creators.</p>
                        <img src="http://placehold.it/200/"/>
                        <p class="amenityCTA">Amenities</p>
                    </div>

                    <div ng-hide="!smallAmenitiesVisible" class="planAmenities"  ng-mouseleave="hideSmallAmenities()">
                        <p ng-repeat="amenity in sharedProductAmenities" tooltip title="{{amenity.amenityDescription}}" data-toggle="tooltip">{{amenity.amenityName}}</p>
                        <p ng-repeat="amenity in innovationPlusOnlyAmenities" tooltip title="{{amenity.amenityDescription}}" data-toggle="tooltip">{{amenity.amenityName}}</p>

                    </div>
                </div>
                <div class="col-sm-12 col-md-1 col-lg-2"></div>

                <div class="col-sm-12 col-md-12 col-lg-4 servicePlanLarge">
                    <div class="planHeader">
                        <h4>PrototypePlus</h4>
                    </div>
                    <div class="planSubHeader">
                        <p class="planSubTitle">A unique product-to-market solution for new ventures.</p>
                    </div>
                    <div ng-hide="largeAmenitiesVisible" class="planImage planImageLarge" ng-mouseenter="showLargeAmenities()">
                        <p>A unique product-to-market solution for new ventures.</p>
                        <img src="http://placehold.it/256/"/>
                        <p class="amenityCTA">Amenities</p>
                    </div>
                    <div ng-hide="!largeAmenitiesVisible" class="planAmenities"  ng-mouseleave="hideLargeAmenities()">
                        <p ng-repeat="amenity in sharedProductAmenities" tooltip title="{{amenity.amenityDescription}}" data-toggle="tooltip">{{amenity.amenityName}}</p>
                        <p ng-repeat="amenity in prototypePlusOnlyAmenities" tooltip title="{{amenity.amenityDescription}}" data-toggle="tooltip">{{amenity.amenityName}}</p>
                    </div>
                </div>
                <!--<div class="col-sm-4 col-md-4 col-lg-4">
                    <p>Collaborative/Custom - product</p>
                </div>-->
            </div>
            <div ng-if="servicesSetTo == 'customers'">
                <div class="col-sm-12 col-md-12 col-lg-4 servicePlanSmall">
                    <div class="planHeader">
                        <h4>StrategyPlus</h4>
                    </div>
                    <div class="planSubHeader">
                        <p class="planSubTitle">A practical marketing solution for engaged owners.</p>
                    </div>
                    <div ng-hide="smallAmenitiesVisible" class="planImage" ng-mouseenter="showSmallAmenities()">
                        <p>A practical marketing solution for engaged owners.</p>
                        <img src="http://placehold.it/200/"/>
                        <p class="amenityCTA">Amenities</p>
                    </div>

                    <div ng-hide="!smallAmenitiesVisible" class="planAmenities"  ng-mouseleave="hideSmallAmenities()">
                        <p ng-repeat="amenity in sharedCustomerAcquisitionAmenities" tooltip title="{{amenity.amenityDescription}}" data-toggle="tooltip">{{amenity.amenityName}}</p>
                        <p ng-repeat="amenity in strategyPlusOnlyAmenities" tooltip title="{{amenity.amenityDescription}}" data-toggle="tooltip">{{amenity.amenityName}}</p>

                    </div>
                </div>
                <div class="col-sm-12 col-md-1 col-lg-2"></div>
                <div class="col-sm-12 col-md-12 col-lg-4 servicePlanLarge">
                    <div class="planHeader">
                        <h4>GrowthPlus</h4>
                    </div>
                    <div class="planSubHeader">
                        <p class="planSubTitle">A complete customer acquisition solution for new and growing businesses.</p>
                    </div>
                    <div ng-hide="largeAmenitiesVisible" class="planImage planImageLarge" ng-mouseenter="showLargeAmenities()">
                        <p>A complete customer acquisition solution for new and growing businesses.</p>
                        <img src="http://placehold.it/256/"/>
                        <p class="amenityCTA">Amenities</p>
                    </div>
                    <div ng-hide="!largeAmenitiesVisible" class="planAmenities"  ng-mouseleave="hideLargeAmenities()">
                        <p ng-repeat="amenity in sharedCustomerAcquisitionAmenities" tooltip title="{{amenity.amenityDescription}}" data-toggle="tooltip">{{amenity.amenityName}}</p>
                        <p ng-repeat="amenity in growthPlusOnlyAmenities" tooltip title="{{amenity.amenityDescription}}" data-toggle="tooltip">{{amenity.amenityName}}</p>
                    </div>

                </div>
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

                    <!--customer services specific questions-->
                    <div ng-if="servicesSetTo == 'customers'">
                        <div>
                            <h5>Why should I work with you?</h5>
                            <p>
                                If you are either new to marketing online, or are having difficulty getting your business to the next level then getting intimate guidance from a credible source may prove invaluable.
                                I stand by this whether that source is me or someone else.
                                However to answer your question of 'why me?', there are two main reasons why I don't think your in bad company working with me.
                                Experience & Results.
                                I have so far accumulated almost 9 years of customer acquisition experience - 6 years of business-to-consumer overlapping 4 years of business-to-business.
                                And the <a href="#">notable & verifiable results</a> I have achieved while gaining this experience should help build some confidence.
                            </p>
                        </div>
                        <div>
                            <h5>What's the difference between the StrategyPlus and GrowthPlus Plans?</h5>
                            <p>
                                While both plans include many of the same services, the difference lies in the execution.
                                In the GrowthPlus plan the majority of the execution will be by me, while in the StrategyPlus I will be serving the role of a guide and mentor allowing the owner to build new skills and improve as a product marketer.
                                In either plan the objectives, strategy, and tactics will always be what's most important for the business.
                            </p>
                        </div>
                        <div>
                            <h5>What results have you achieved for other clients?</h5>
                            <p>Some pretty good ones. Here <a href="#">take a look.</a></p>
                        </div>
                        <div>
                            <h5>How much experience do you have in customer acquisition?</h5>
                            <p>
                                So far I have almost 9 years experience of prospecting (i.e researching ideal customers, generating leads, building traffic, etc.),
                                identifying needs (i.e needs assessments, effective questioning, etc.),
                                sales presentations (i.e sales meetings, product demonstrations, landing pages, etc.),
                                and converting leads into paying customers.
                            </p>
                        </div>
                    </div>
                    <!--product development services specific questions-->
                    <div ng-if="servicesSetTo == 'product'">
                        <div>
                            <h5>Why should I work with you?</h5>
                            <p>
                                If you are new to creating web products, or have little experience implementing the processes needed to ensure you don't waste resources then I would strongly suggest working with someone who does.
                                More to the point of why that person should be me can be summed up in two words -
                                Experience & Passion.
                                With over 4 years experience in developing businesses that range from physical locations to SaaS products,
                                I have an intimate knowledge of not only of precautions to take to increase the chances of success, but also the pitfalls to avoid to reduce the chances of failure.
                                In addition to experience,
                                I have the passion for product development that's needed in the moments you have ideas or thoughts that need to be talked out with someone you trust.
                            </p>
                        </div>
                        <div>
                            <h5>What's the difference between the InnovationPlus and PrototypePlus plans?</h5>
                            <p>
                                While each plan includes many of the same services the difference is primarily in the implementation.
                                In the PrototypePlus plan most of the implementation (i.e research, coding, designing, etc.) will be handled by me.
                                However collaborators on the InnovationPlus plan will get hands-on experience with many of these processes.
                                Both plans are designed to result in a viable and innovative product with clear paths for traction and growth.
                            </p>
                        </div>
                        <div>
                            <h5>What types of businesses have you helped develop?</h5>
                            <p>
                                I have helped developed services that required physical locations in industries that
                                include the Consumer services & Professional Services sectors.
                                I have also developed web based businesses for services that have included a job search engine, online based education, and micro sites.
                            </p>
                        </div>
                        <div>
                            <h5>How much experience do you have in business development?</h5>
                            <p>
                                So far I have 4 years experience conducting essential research (i.e market research, competitor research, customer research),
                                developing product strategy (i.e value proposition, revenue generation strategy, branding, etc.),
                                construction products and services (i.e location selection, leasing, designing, web development, etc.),
                                and launching.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div>
                        <h5>How much do you charge?</h5>
                        <p>
                            I offer plans that fit into the budgets of new businesses with little cash-flow,
                            and plans that have been adequate for businesses with significant revenue.
                            If you are interested in working with me you could <a href="#">connect with me</a>,
                            or you could get a quick quote <a ng-click="quoteRequest()">here</a>.
                        </p>
                    </div>
                    <div>
                        <h5>Do you offer short term options?</h5>
                        <p>
                            All my plans are currently month-to-month.
                            There are no long-term contracts or agreements.
                        </p>
                    </div>
                    <div>
                        <h5>What form of payment do you accept?</h5>
                        <p>Currently I can accept Visa, MasterCard, American Express, JCB, Discover, and Diners Club.</p>
                    </div>
                    <div>
                        <h5>Do you accept escrow style payments (i.e Elance, or Odesk)?</h5>
                        <p>
                            In special cases I can make accommodations, however additional fees will be applied to cover
                            all processing fees.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <a class="btn btn-warning btn-lg" ng-click="quoteRequest()">Get a quick Quote!</a>
            <br/>
            <a href="#">Back to top</a>
        </div>
    </div>

    <!--quote requested section-->
    <div ng-if="quoteRequested">
        <div ng-if="!quoteRequestSubmitted" class="row text-center">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div>
                    <label for="serviceOfInterest">What are you primarily interested in?</label>
                    <select name="serviceOfInterest" ng-model="serviceOfInterest" class="form-control">
                        <option>Select one</option>
                        <option value="Getting more customers">Getting more customers.</option>
                        <option value="Building a product">Building a product.</option>
                    </select>
                </div>

                <div>
                    <label for="objectives">What are some of your business objectives? </label>
                    <textarea name="objectives"  ng-model="objectives" placeholder="some info here" class="form-control" rows="10" cols="30"></textarea>
                </div>

                <div>
                    <label for="maxBudget">What is the most your are willing to spend monthly to achieve these objectives?</label>
                    <input  type="range" name="maxBudget" value="100" min="100" max="25000" step="100" ng-model="range">
                    ${{range}}/monthly.
                </div>

                <div>
                    <label for="teamSize">Team size:</label>
                    <select name="teamSize" ng-model="teamSize" class="form-control">
                        <option value="Just me">Just me</option>
                        <option value="5 or less">5 or less</option>
                        <option value="10 or less">10 or less</option>
                        <option value="20 or less">20 or less</option>
                        <option value="30 or less">30 or less</option>
                        <option value="30+">more than 30</option>
                    </select>
                </div>

                <div>
                    <label for="url">URL (if you already have a product/service)</label>
                    <input type="text" name="url" ng-model="url" class="form-control" placeholder="example: http://myproduct.com">
                </div>

                <div>
                    <label for="name">Full Name (of person who will be receiving the quote.)</label>
                    <input type="text" name="name" ng-model="name" class="form-control" placeholder="example: Carl Winslow">
                </div>

                <div>
                    <label for="email">Email (of person who will be receiving the quote.)</label>
                    <input type="email" name="email" ng-model="email" class="form-control" placeholder="example: carl@familyMatters.com">
                </div>

                <div>
                    <label for="phone">Phone (of person who will be receiving the quote.)</label>
                    <input type="text" name="phone" ng-model="phone" class="form-control" placeholder="example: 610-555-4545">
                </div>

                <div>
                    <label for="quoteFormat">How should I send your quote for review?</label>
                    <select name="quoteFormat" ng-model="quoteFormat" class="form-control">
                        <option>Select one</option>
                        <option value="Email">Via email</option>
                        <option value="Phone">Via phone</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div>
                    <div ng-hide="(serviceOfInterest || objectives || teamSize || url || name || email || phone ||quoteFormat)">
                        <h4>Preview your quote request here.</h4>
                    </div>

                    <div ng-if="(serviceOfInterest || objectives || teamSize || url || name || email || phone ||quoteFormat)">
                        <h3>Quote request preview</h3>
                        <h4 class="subText">Please fill out all info in order to submit the form.</h4>
                    </div>

                    <div class="text-left">
                        <div ng-if="serviceOfInterest">
                            <h4>I'm interested in:</h4>
                            <p>{{serviceOfInterest}}</p>
                        </div>

                        <div ng-if="objectives">
                            <h4>My objectives:</h4>
                            <p>{{objectives}}</p>
                        </div>

                        <div ng-if="teamSize">
                            <h4>My team size:</h4>
                            <p>{{teamSize}}</p>
                        </div>

                        <div ng-if="url">
                            <h4>My product/service url:</h4>
                            <p>{{url}}</p>
                        </div>

                        <div ng-if="name">
                            <h4>Requester name:</h4>
                            <p>{{name}}</p>
                        </div>

                        <div ng-if="email">
                            <h4>Requester email:</h4>
                            <p>{{email}}</p>
                        </div>

                        <div ng-if="phone">
                            <h4>Requester phone:</h4>
                            <p>{{phone}}</p>
                        </div>

                        <div ng-if="quoteFormat">
                            <h4>Send me my quote via:</h4>
                            <p>{{quoteFormat}}</p>
                        </div>
                    </div>


                    <div ng-if="serviceOfInterest && objectives && teamSize && name && email && phone && quoteFormat">
                        <button class="btn btn-lg btn-warning" ng-click="sendQuote(serviceOfInterest,objectives,teamSize,name,email,phone,quoteFormat,range,url)">Send my quote</button>
                    </div>
                </div>
            </div>

        </div>
        <div ng-if="quoteRequestSubmitted">
            <h2>Thank you! I will plan to reach out to you shortly.</h2>
            <a href="/">Go back home</a>
        </div>
    </div>

    <!--walk section-->
    <div ng-if="walk">
        <div ng-if="!referralsSubmitted" class="text-center">
            <div class="row">
                <h4>Hey, Wait!</h4>
                <p>Really sorry we won't work together, I wish you luck anyway. Before you leave could tell me about anyone you know who <em>would</em> benefit from these services? Or maybe someone you know who would be interested in free coding or marketing training, <em>yourself included</em>. Thanks!</p>
            </div>
            <div class="row">
               <div class="col-sm-4 col-md-4 col-lg-4">
                   <input type="text" ng-model="name0" class="form-control" placeholder="example: Carl Winslow">
               </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <input type="email" ng-model="email0" class="form-control" placeholder="example: carl@familyMatters.com">
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <select class="form-control" ng-model="interest0">
                        <option>Select one</option>
                        <option value="productDev">Product development services.</option>
                        <option value="customerAcq">Customer acquisition services.</option>
                        <option value="marketingTraining">Free marketing training.</option>
                        <option value="codingTraining">Free coding training.</option>
                    </select>
                </div>
            </div>

            <div class="row" ng-show="referralCounter > 0">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <input type="text" ng-model="name1" class="form-control" placeholder="example: Carl Winslow">
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <input type="email" ng-model="email1" class="form-control" placeholder="example: carl@familyMatters.com">
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <select class="form-control" ng-model="interest1">
                        <option>Select one</option>
                        <option value="productDev">Product development services.</option>
                        <option value="customerAcq">Customer acquisition services.</option>
                        <option value="marketingTraining">Free marketing training.</option>
                        <option value="codingTraining">Free coding training.</option>
                    </select>
                </div>
            </div>

            <div class="row" ng-show="referralCounter > 1">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <input type="text" ng-model="name2" class="form-control" placeholder="example: Carl Winslow">
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <input type="email" ng-model="email2" class="form-control" placeholder="example: carl@familyMatters.com">
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <select class="form-control" ng-model="interest2">
                        <option>Select one</option>
                        <option value="productDev">Product development services.</option>
                        <option value="customerAcq">Customer acquisition services.</option>
                        <option value="marketingTraining">Free marketing training.</option>
                        <option value="codingTraining">Free coding training.</option>
                    </select>
                </div>
            </div>

            <div class="row" ng-show="referralCounter > 2">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <input type="text" ng-model="name3" class="form-control" placeholder="example: Carl Winslow">
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <input type="email" ng-model="email3" class="form-control" placeholder="example: carl@familyMatters.com">
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <select class="form-control" ng-model="interest3">
                        <option>Select one</option>
                        <option value="productDev">Product development services.</option>
                        <option value="customerAcq">Customer acquisition services.</option>
                        <option value="marketingTraining">Free marketing training.</option>
                        <option value="codingTraining">Free coding training.</option>
                    </select>
                </div>
            </div>

            <div class="row" ng-show="referralCounter > 3">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <input type="text" ng-model="name4" class="form-control" placeholder="example: Carl Winslow">
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <input type="email" ng-model="email4" class="form-control" placeholder="example: carl@familyMatters.com">
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <select class="form-control" ng-model="interest4">
                        <option>Select one</option>
                        <option value="productDev">Product development services.</option>
                        <option value="customerAcq">Customer acquisition services.</option>
                        <option value="marketingTraining">Free marketing training.</option>
                        <option value="codingTraining">Free coding training.</option>
                    </select>
                </div>
            </div>

            <div class="row" ng-show="referralCounter > 4">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <input type="text" ng-model="name5" class="form-control" placeholder="example: Carl Winslow">
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <input type="email" ng-model="email5" class="form-control" placeholder="example: carl@familyMatters.com">
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <select class="form-control" ng-model="interest5">
                        <option>Select one</option>
                        <option value="productDev">Product development services.</option>
                        <option value="customerAcq">Customer acquisition services.</option>
                        <option value="marketingTraining">Free marketing training.</option>
                        <option value="codingTraining">Free coding training.</option>
                    </select>
                </div>
            </div>

            <div ng-show="refferal6">
                {{referral0 = [name0, email0, interest0]}}
                {{referral1 = [name1, email1, interest1]}}
                {{referral2 = [name2, email2, interest2]}}
                {{referral3 = [name3, email3, interest3]}}
                {{referral4 = [name4, email4, interest4]}}
                {{referral5 = [name5, email5, interest5]}}
            </div>

            <div class="row" ng-if="referralCounter < 5">
                <button class="btn btn-lg btn-warning pull-left" ng-click="addReferral(referralCounter)">Add another person</button>
            </div>

            <div class="row">
                <button class="btn btn-lg btn-warning pull-right" ng-click="sendReferrals(referral0,referral1,referral2,referral3,referral4,referral5)">Done</button>
            </div>





        </div>
        <div ng-if="referralsSubmitted">
            <h2>Thank you again! Good luck achieving your business objectives.</h2>
            <a href="/">Go back home</a>
        </div>
    </div>

</div>


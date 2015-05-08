<div class="demonstrationBody text-center" ng-controller="demonstrationController">


    <div class="demoContentHeading">
        <h1>{{headline}}</h1>
    </div>

    <div class="demoContentBody col-lg-8 col-lg-offset-2">
        <p>
            I would like to think I could be a great addition to your team,
            but I don't know your business as well as you do.
        </p>
        <p class="pHeavyTopMargin">
            So I put together this short video (and transcript) to help you come to your own conclusion.
        </p>
    </div>


    <div class="videoOrTranscriptSection">
        <div class="slider-toggle left">
            <span class="label">Video</span>
              <span ng-click="videoTranscriptSwitch()" class="slider">
                    <span class="toggle">
                        <span class="grip"></span>
                    </span>
                </span>
            <span class="label">Transcript</span>
        </div>
    </div>
    <br/>


    <div class="VTContentSection">
        <div ng-show="VTSetting == 'video'" class="demoVideoSection col-lg-10 col-lg-offset-1">
            <div id="demoVideoContainer">
                <video muted loop controls>
                    <source src="/assets/kevinwashingtonmevideo.mp4" type="video/mp4">
                    <source src="https://www.youtube.com/watch?v=locvDX2xrLc" type="video/ogg">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>

        <div ng-show="VTSetting == 'transcript'" class="demoTranscriptSection col-lg-8 col-lg-offset-2">
            <div id="demoTranscriptHeader">
                <h5>Transcript of the video:</h5>
                <p>Hi, I'm Kevin.</p>
                <p>Im a web developer and customer acquisition specialist focusing primarily on web based acquisition.</p>
                <p>
                    I put together this short video to help you decide if I could be a good addition to your team...
                    and also as an opportunity to share what I am looking for in my next company.
                </p>
                <p>
                    In order to do this I thought of 5 of the toughest interview questions I could think of, and answered them for you.
                </p>
                <p>
                    Keep in mind that you cna click the button right above me to switch from the video to the transcript and quickly browse the questions and answer groups.
                </p>
                <p>
                    So to keep this short video short, let's get started!
                </p>
            </div>
            <div id="demoTranscriptQuestion1">
                <h3>Question 1</h3>
                <h4>What are you looking for, and hoping you don't find, in your next position?</h4>
                <p>
                    The three main things I am looking for in my next position are great leadership, good returns,
                    and opportunities for self improvement.
                </p>
                <p>
                    A good leadership team to me is one that develops meaningful objectives, gives its team members clear direction,
                    and ensures everyone on the team (including leaders) are held accountable.
                </p>
                <p>
                    For returns I just want to be paid comparatively to the value I bring back to the business.
                    I would like to be able to grow with the business and be motivated to help make it successful.
                </p>
                <p>
                    And lastly, I'm on the look out for positions where learning and self-improvement is cultivated.
                    Whether this is through interactions with peers, or though external resources - striving to constantly
                    improve is something I take seriously and am looking for in my next company.
                </p>
                <p>
                    The things I am not looking for would be the exact opposite.
                    I hope I can avoid companies with poor leadership,  a lack of learning opportunities, and where employees are not valued fairly.
                </p>
            </div>
            <div id="demoTranscriptQuestion2">
                <h3>Question 2</h3>
                <h4>If you can build and sell web solutions, why haven't you build your own product?</h4>
                <p>
                    To be honest the reason I'm looking for a position rather than starting my own company is patience.
                </p>
                <p>
                    I definitely have aspirations to build and market my own software company one day, however
                    there are a few things I'm wary of.
                </p>
                <p>
                    For one there are things that I feel I could be better at, one being polishing my front end programming skills
                    and shortening my development time. I would also like to become a better designer as this is one of my weaker points.
                </p>
                <p>
                    There are alos a few things I would like to learn before rolling out my own software based business like various security protocols
                    and getting comfortable with penetration testing.
                </p>
                <p>
                    Lastly the thing I absolutely don't want to start my company without is a large prospect pool to funnel into paying customers.
                    A common cause of business failure isn't a bad product but the inability to find and sell new customers.
                    I don't want to have this problem so I'm looking to build a pool of prospects until I feel I'm ready.
                </p>
            </div>
            <div id="demoTranscriptQuestion3">
                <h3>Question 3</h3>
                <h4>How have you helped other businesses get more customers, and how do you plan to generate new business for mine?</h4>
                <p>
                    The last company I worked with in a growth capacity was karmaCRM.
                    karmaCRM is a business that provides web based CRM tools to small and medium sized businesses.
                    Shortly after taking over as the director of growth at karma I helped develop and implement a strategy that led
                    to a 145% increase in overall conversions, a 449% increase in revenue, and a 1079% increase in daily revenue after our churn rates were factored in.
                </p>
                <p>
                    While some of these increases are huge the steps we used to get there are not. And each one can be duplicated for most businesses.
                </p>
                <p>
                    The process is simple.
                </p>
                <p>
                    First I understand your business and how its performing by researching your lead generation and sales analytics.
                </p>
                <p>
                    Second, I get a complete understanding of your product and customers.
                </p>
                <p>
                    For products, I like to understand the characteristics and features, the problems the features solve, and the tasks they make easier.
                </p>
                <p>
                    For your customers, I want to understand what they care about, why, and where they are located online.
                </p>
                <p>
                    With an understanding of your business, your product and your customers we can develop and effectively
                    attack the core objectives that should be our primary focus.
                </p>
                <p>
                    These core objectives often include optimizing under performing sales channels, building new sales channels,
                    and improving business analytics to increase the ROI of our marketing spend.
                </p>
            </div>
            <div id="demoTranscriptQuestion4">
                <h3>Question 4</h3>
                <h4>What is your biggest strength and why?</h4>
                <p>
                    To be honest I consider my biggest strength my faith.
                    The reason why is because many of my characteristics and values stem from that.
                </p>
                <p>
                    My faith has taught me to be a man of integrity, honesty, and to give my all in everything I do.
                </p>
                <p>
                    And its these characteristics that have helped shape me as a person. Its these character traits
                    that I consider to be more valuable than all the knowledge, skills, and experience I have collected as by-products.
                </p>
            </div>
            <div id="demoTranscriptQuestion5">
                <h3>Question 5</h3>
                <h4>In your opinion, what's the three most important things in business?</h4>
                <p>
                    To me, it really depends on the stage of the business.
                </p>
                <p>
                    For a newer business, with little to no traction the three most important things would be a
                    strong team of founders, innovative products, and of course paying customers.
                </p>
                <p>
                    However for a business that has already validated is product with sales of its product, the critical pieces should change.
                    To me they would be clear and meaningful objectives, proper management of resources (both money and people), and
                    the constant optimization and management of all the business's processes.
                </p>
            </div>
            <div id="demoTranscriptOutro">
                <p>
                    So there you have it.
                </p>
                <p>
                    I hope these questions shed some light on if I could be a valuable asset to your team.
                </p>
                <p>
                    If you have more questions to ask me, or if you want to get in touch go ahead and click that big button right below.
                </p>
                <p>
                    Hope to hear from you soon!
                </p>
                <p>(run outtakes)</p>
            </div>
        </div>
    </div>


    <div class="demoCallToActionSection">
        <p>Think I can make a good addition to your team?</p>
        <a id="demoCTA" href="{{ctaLink}}" class="btn btn-warning btn-lg">Let's set up an interview</a>
        <br/>
        <a href="{{ctaLink}}">Or get in contact with me</a>
    </div>








</div>
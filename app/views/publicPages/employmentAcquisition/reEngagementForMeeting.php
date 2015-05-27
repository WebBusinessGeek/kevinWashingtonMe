<div id="reEngagementContentForMeetingContainer" ng-controller="reEngagementForMeetingController" class="text-center">

    <div id="reEngagementContentHeader">
        <div id="reEngagementContentTitle">
            <h1>5 Things I Can Bring to the {{companyName}} Team </h1>
        </div>
        <div id="reEngagementContentSubTitle">
            <p>HandCrafted by <a href="/intro" target="_blank">Kevin Washington</a></p>
        </div>
    </div>

    <div id="contentOrSchedulerSection">
        <p>Choose One:</p>
        <button class="btn btn-warning btn-lg" ng-click="setContentOrSchedule('content')">5 Things I'll bring to {{companyName}}</button>
        or
        <button class="btn btn-warning btn-lg" ng-click="setContentOrSchedule('scheduler')">Let's set up a time to talk</button>
    </div>

    <div id="reEngagementContentSection" ng-show="contentOrSchedule == 'content'">
        <div id="reEngagementContent1" class="reEngagementContent row">
            <div class="reEngagementContentNumber col-lg-12">
                <img class="img-responsive img-circle center-block" src="/assets/numberIcons/1.png">
            </div>
            <div class="reEngagementContentHeader col-lg-12">
                <h2>'There is no box' Creativity</h2>
            </div>
            <div class="reEngagementContentImage col-lg-12">
                <img class="img-responsive img-circle center-block" src="http://placehold.it/256">
            </div>
            <div class="reEngagementContentBody col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <p>
                    I am constantly brainstorming ways I can achieve goals in ways that haven’t been done before.
                    A by-product of this consistent reach for innovation is the very article your reading now.
                    As a member of the {{companyName}} team I will look to use this creativity to achieve all the personal objectives I have been trusted with in unique ways.
                    In addition I will find satisfaction in helping others solve problems, implement innovation, and achieve critical goals for the better of the company.
                </p>
            </div>
        </div>

        <div id="reEngagementContent2" class="reEngagementContent row">
            <div class="reEngagementContentNumber col-lg-12">
                <img class="img-responsive img-circle center-block" src="/assets/numberIcons/2.png">
            </div>
            <div class="reEngagementContentHeader col-lg-12">
                <h2>Agility & Adaptability</h2>
            </div>
            <div class="reEngagementContentImage col-lg-12">
                <img class="img-responsive img-circle center-block" src="http://placehold.it/256">
            </div>
            <div class="reEngagementContentBody col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <p>
                    After years in the industry I understand the only constant is change.
                    Products change, customer needs change, competitors change.
                    While I don’t hold to the ‘disrupt or be disrupted’ mantra completely, I do believe in constantly improving my skill set and keeping current on new tech and markets I’m competing in.
                    What I can bring to the {{companyName}} team in this regard is a team member who can fit into many roles, and can learn what’s necessary for the constant growth of {{companyName}}.
                </p>
            </div>
        </div>

        <div id="reEngagementContent3" class="reEngagementContent row">
            <div class="reEngagementContentNumber col-lg-12">
                <img class="img-responsive img-circle center-block" src="/assets/numberIcons/3.png">
            </div>
            <div class="reEngagementContentHeader col-lg-12">
                <h2>Honorable Character Traits</h2>
            </div>
            <div class="reEngagementContentImage col-lg-12">
                <img class="img-responsive img-circle center-block" src="http://placehold.it/256">
            </div>
            <div class="reEngagementContentBody col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <p>
                    Something that is sometimes overlooked and undervalued in business is character.
                    While decisions to add new team members are based on things like education, experience or skill sets; one would think that a person's character would trump them all.
                    For example, should a highly skilled sales rep that lacks integrity get hired before a decent one that maintains his honor?
                    Or does a Ivy League grad who is incapable of working with others without conflict get added before a humble and similarly skilled grad from a Tier 3 college?
                    What I can bring to {{companyName}} does not stop at my skill sets and experiences, but also includes integrity, patience, respect, and many other personal qualities that I feel can be far more valuable to the culture at {{companyName}} than any one specific of skills.
                </p>
            </div>
        </div>

        <div id="reEngagementContent4" class="reEngagementContent row">
            <div class="reEngagementContentNumber col-lg-12">
                <img class="img-responsive img-circle center-block" src="/assets/numberIcons/4.png">
            </div>
            <div class="reEngagementContentHeader col-lg-12">
                <h2>Battle Tested Experience</h2>
            </div>
            <div class="reEngagementContentImage col-lg-12">
                <img class="img-responsive img-circle center-block" src="http://placehold.it/256">
            </div>
            <div class="reEngagementContentBody col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <p>
                    With experience in sales, web development, management, and implementation I can bring a unique perspective to the {{companyName}} team.
                    Problem solving, planning, estimations, strategy.
                    These are all areas where experience can help yield a more accurate or efficient solution.
                </p>
            </div>
        </div>

        <div id="reEngagementContent5" class="reEngagementContent row">
            <div class="reEngagementContentNumber col-lg-12">
                <img class="img-responsive img-circle center-block" src="/assets/numberIcons/5.png">
            </div>
            <div class="reEngagementContentHeader col-lg-12">
                <h2>Potential</h2>
            </div>
            <div class="reEngagementContentImage col-lg-12">
                <img class="img-responsive img-circle center-block" src="http://placehold.it/256">
            </div>
            <div class="reEngagementContentBody col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <p>
                    Even with the experiences I have been blessed to collect I am as hungry as ever.
                    I am always looking to learn something new and improve as a manager, an acquisition specialist, a web developer, and a person.
                    So the last thing I would like to show I can bring to the {{companyName}} team is the potential and desire to grow as an individual while helping {{companyName}} grow and achieve its objectives.
                </p>
            </div>
        </div>

        <div>
            <div>
                <button class="btn btn-danger btn-lg" ng-click="setContentOrSchedule('scheduler')">Ok, Let's set up a time to talk!</button>
            </div>
            <div>
                <a href="mailto:hello@kevinwashington.me?Subject={{companyName}}%20available%20meeting%20times">Or email me a time that works for you.</a>
            </div>
        </div>
    </div>

    <div id="schedulerSection" ng-show="contentOrSchedule == 'scheduler'">


        <div>
            <p>Let's start with some Day/Time Options that work for you.</p>
            <form class="form-inline">
                <h5>Option 1</h5>
                <div class="form-group">
                    <label for="day1">Day: </label>
                    <select class="form-control" id="day1" ng-model="day1">
                        <option value="Sunday">Sunday</option>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday" disabled>Saturday</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="hour1">@ Time: </label>
                    <select class="form-control" id="hour1" ng-model="hour1">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="minutes1"> </label>
                    <select class="form-control" id="minutes1" ng-model="minutes1">
                        <option value="00">00</option>
                        <option value="15">15</option>
                        <option value="30">30</option>
                        <option value="45">45</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="ampm1"> </label>
                    <select class="form-control" id="ampm1" ng-model="ampm1">
                        <option value="am">am</option>
                        <option value="pm">pm</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="timezone1"> </label>
                    <select class="form-control" id="timezone1" ng-model="timezone1">
                        <option value="EST">EST</option>
                        <option value="PST">PST</option>
                        <option value="other">other</option>
                    </select>
                </div>

                <div class="form-group" ng-show="timezone1 == 'other'">
                    <label for="otherTimeZone1">Please enter the timezone: </label>
                    <input type="text" class="form-control" id="otherTimeZone1" ng-model="otherTimeZone1">
                </div>
            </form>

            <form ng-show="scheduleOptions >= 2" class="form-inline">
                <h5>Option 2</h5>
                <div class="form-group">
                    <label for="day2">Day: </label>
                    <select class="form-control" id="day2" ng-model="day2">
                        <option value="Sunday">Sunday</option>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday" disabled>Saturday</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="hour2">@ Time: </label>
                    <select class="form-control" id="hour2" ng-model="hour2">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="minutes2"> </label>
                    <select class="form-control" id="minutes2" ng-model="minutes2">
                        <option value="00">00</option>
                        <option value="15">15</option>
                        <option value="30">30</option>
                        <option value="45">45</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="ampm2"> </label>
                    <select class="form-control" id="ampm2" ng-model="ampm2">
                        <option value="am">am</option>
                        <option value="pm">pm</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="timezone2"> </label>
                    <select class="form-control" id="timezone2" ng-model="timezone2">
                        <option value="EST">EST</option>
                        <option value="PST">PST</option>
                        <option value="other">other</option>
                    </select>
                </div>

                <div class="form-group" ng-show="timezone2 == 'other'">
                    <label for="otherTimeZone2">Please enter the timezone: </label>
                    <input type="text" class="form-control" id="otherTimeZone2" ng-model="otherTimeZone2">
                </div>
            </form>

            <form ng-show="scheduleOptions >= 3" class="form-inline">
                <h5>Option 3</h5>
                <div class="form-group">
                    <label for="day3">Day: </label>
                    <select class="form-control" id="day3" ng-model="day3">
                        <option value="Sunday">Sunday</option>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday" disabled>Saturday</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="hour3">@ Time: </label>
                    <select class="form-control" id="hour3" ng-model="hour3">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="minutes3"> </label>
                    <select class="form-control" id="minutes3" ng-model="minutes3">
                        <option value="00">00</option>
                        <option value="15">15</option>
                        <option value="30">30</option>
                        <option value="45">45</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="ampm3"> </label>
                    <select class="form-control" id="ampm3" ng-model="ampm3">
                        <option value="am">am</option>
                        <option value="pm">pm</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="timezone3"> </label>
                    <select class="form-control" id="timezone3" ng-model="timezone3">
                        <option value="EST">EST</option>
                        <option value="PST">PST</option>
                        <option value="other">other</option>
                    </select>
                </div>

                <div class="form-group" ng-show="timezone3 == 'other'">
                    <label for="otherTimeZone3">Please enter the timezone: </label>
                    <input type="text" class="form-control" id="otherTimeZone3" ng-model="otherTimeZone3">
                </div>
            </form>

            <div ng-show="hidePrivateData == false">
                {{ option1Info = {'day' : day1, 'time' : hour1 + ":" + minutes1 + ampm1 +' '+ timezone1 +' '+ otherTimeZone1 } }}
                {{ option2Info = {'day' : day2, 'time' : hour2 + ":" + minutes2 + ampm2 +' '+ timezone2 +' '+ otherTimeZone2 } }}
                {{ option3Info = {'day' : day3, 'time' : hour3 + ":" + minutes3 + ampm3 +' '+ timezone3 +' '+ otherTimeZone3 } }}
            </div>

            <div id="schedulerSectionController">
                <div>
                    <a ng-show="scheduleOptions <= 2" ng-click="addScheduleOption()">+Add another time day/time option</a>
                </div>
                <div ng-show="day1 && hour1 && minutes1 && ampm1 && timezone1">
                    <button class="btn btn-warning btn-lg" ng-click="sendOptions(companyName, option1Info, option2Info, option3Info)">Send</button>
                </div>
            </div>


        </div>
    </div>
</div>
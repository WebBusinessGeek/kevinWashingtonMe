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
        <button class="btn btn-primary btn-lg" ng-click="setContentOrSchedule('content')">5 Things I'll bring to {{companyName}}</button>
        or
        <button class="btn btn-primary btn-lg" ng-click="setContentOrSchedule('scheduler')">Let's set up a time to talk</button>
    </div>

    <div id="reEngagementContentSection" ng-show="contentOrSchedule == 'content'">
        <div id="reEngagementContent1" class="reEngagementContent">
            <div class="reEngagementContentNumber">
                <img class="img-responsive img-circle center-block" src="http://placehold.it/80">
            </div>
            <div class="reEngagementContentHeader">
                <h2>'There is no box' Creativity</h2>
            </div>
            <div class="reEngagementContentImage">
                <img class="img-responsive img-circle center-block" src="http://placehold.it/256">
            </div>
            <div class="reEngagementContentBody">
                <h4>How will this benefit {{companyName}}?</h4>
            </div>
        </div>

        <div id="reEngagementContent2" class="reEngagementContent">
            <div class="reEngagementContentNumber">
                <img class="img-responsive img-circle center-block" src="http://placehold.it/80">
            </div>
            <div class="reEngagementContentHeader">
                <h2>Agility & Adaptability</h2>
            </div>
            <div class="reEngagementContentImage">
                <img class="img-responsive img-circle center-block" src="http://placehold.it/256">
            </div>
            <div class="reEngagementContentBody">
                <h4>How will this benefit {{companyName}}?</h4>
            </div>
        </div>

        <div id="reEngagementContent3" class="reEngagementContent">
            <div class="reEngagementContentNumber">
                <img class="img-responsive img-circle center-block" src="http://placehold.it/80">
            </div>
            <div class="reEngagementContentHeader">
                <h2>Honorable Character Traits</h2>
            </div>
            <div class="reEngagementContentImage">
                <img class="img-responsive img-circle center-block" src="http://placehold.it/256">
            </div>
            <div class="reEngagementContentBody">
                <h4>How will this benefit {{companyName}}?</h4>
            </div>
        </div>

        <div id="reEngagementContent4" class="reEngagementContent">
            <div class="reEngagementContentNumber">
                <img class="img-responsive img-circle center-block" src="http://placehold.it/80">
            </div>
            <div class="reEngagementContentHeader">
                <h2>Battle Tested Experience</h2>
            </div>
            <div class="reEngagementContentImage">
                <img class="img-responsive img-circle center-block" src="http://placehold.it/256">
            </div>
            <div class="reEngagementContentBody">
                <h4>How will this benefit {{companyName}}?</h4>
            </div>
        </div>

        <div id="reEngagementContent5" class="reEngagementContent">
            <div class="reEngagementContentNumber">
                <img class="img-responsive img-circle center-block" src="http://placehold.it/80">
            </div>
            <div class="reEngagementContentHeader">
                <h2>Patience & Efficiency</h2>
            </div>
            <div class="reEngagementContentImage">
                <img class="img-responsive img-circle center-block" src="http://placehold.it/256">
            </div>
            <div class="reEngagementContentBody">
                <h4>How will this benefit {{companyName}}?</h4>
            </div>
        </div>

        <div>
            <div>
                <button class="btn btn-danger btn-lg" ng-click="setContentOrSchedule('scheduler')">Ok, Let's set up a time to talk now!</button>
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
                {{day1}} {{hour1}} {{minutes1}} {{ampm1}} {{timezone1}} {{otherTimeZone1}}
                {{day2}} {{hour2}} {{minutes2}} {{ampm2}} {{timezone2}} {{otherTimeZone2}}
                {{day3}} {{hour3}} {{minutes3}} {{ampm3}} {{timezone3}} {{otherTimeZone3}}
            </div>

            <div id="schedulerSectionController">
                <div>
                    <a ng-show="scheduleOptions <= 2" ng-click="addScheduleOption()">+Add another time day/time option</a>
                </div>
                <div>
                    <button class="btn btn-warning btn-lg" ng-click="sendOptions(option1Info)">Send</button>
                </div>
            </div>


        </div>
    </div>
</div>
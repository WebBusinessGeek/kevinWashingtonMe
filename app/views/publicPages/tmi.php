
<div class="text-center" ng-controller="tmiController">
    <div id="tmiHeadline">
        <h1>Welcome to my TMI page.</h1>
    </div>

    <div class="row text-center" id="tmiNavList">
        <div class="tmiImageLinks col-sm-4 col-md-4 col-lg-4"><a ng-click="show('resume')"><img src="http://placehold.it/64"><br/>My Resume</a></div>

        <div class="tmiImageLinks col-sm-4 col-md-4 col-lg-4"><a ng-click="show('10Things')"><img src="http://placehold.it/64"><br/>10 Random Things</a></div>

        <div class="tmiImageLinks col-sm-4 col-md-4 col-lg-4"><a ng-click="show('skills')"><img src="http://placehold.it/64"><br/>My Skills</a></div>
    </div>


    <div class="tmiCard col-sm-6 col-md-6 col-lg-6 col-sm-offset-3 col-md-offset-3 col-lg-offset-3" id="tmiWelcome" ng-hide="showing">
        <div>
            <h3>What is this place?</h3>
        </div>
        <div>
            <img src="http://placehold.it/128">
        </div>
        <div>
            <p>
                This is my TMI page. You can use it to learn more about me.
                Get started by checking out <span class="tmiInnerContentLinks" ng-click="show('resume')">My Resume</span>, or learning <span class="tmiInnerContentLinks" ng-click="show('10Things')">10 Random Things about me</span>.
            </p>
        </div>
    </div>
    <div class="tmiCard col-sm-6 col-md-6 col-lg-6 col-sm-offset-3 col-md-offset-3 col-lg-offset-3" id="tmiResume" ng-show="showing == 'resume'">
        <div>
            <h3>Resume</h3>
        </div>
        <div>
            <img class="img-responsive center-block" src="http://placehold.it/128">
        </div>
        <div>
            <p>The link below will take you to my resume.</p>
            <a href="/resume" target="_blank">My Resume</a>
        </div>
    </div>

    <div id="tmi10Things" class="text-center row" ng-show="showing == '10Things'">
        <div ng-show="currentTMI == '0'" class="tmiCard col-sm-6 col-md-6 col-lg-6 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
            <div>
                <h3>10 Random Things</h3>
            </div>
            <div>
                <img class="center-block" src="http://placehold.it/128">
            </div>
            <div>
                <p> The following is a list of 10 very random things about me. Enjoy!</p>
            </div>
            <div>
                <button class="btn btn-warning" ng-click="setTMIto1()">Launch</button>
            </div>
        </div>
        <div ng-show="currentTMI == '1'" class="tmi10ThingsCard col-sm-6 col-md-6 col-lg-6 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
            <div>
                <h3>#1 I'm a follower of Jesus Christ</h3>
            </div>

            <div>
                <img class="center-block" src="http://placehold.it/128">
            </div>

            <div>
                <p>
                    I put this first because my relationship with God has a enormous influence on my character.
                    This makes me value qualities such as honesty, integrity, and selflessness and those that possess them.
                </p>
            </div>

            <div>
                <button class="btn btn-warning" ng-click="nextTMI()">Next</button>
            </div>

        </div>
        <div ng-show="currentTMI == '2'" class="tmi10ThingsCard col-sm-6 col-md-6 col-lg-6 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
            <div>
                <h3>#2 I'm Married and a Father of 2</h3>
            </div>

            <div>
                <img class="center-block" src="http://placehold.it/128">
            </div>

            <div>
                <p>
                    I am the proud father of two kids who are doing very well in school.
                    I am also happily married to my beautiful wife who only ever nags on weekdays.
                    I love them all very much.
                </p>
            </div>

            <div>
                <button class="btn btn-warning" ng-click="prevTMI()">Prev</button>
                <button class="btn btn-warning" ng-click="nextTMI()">Next</button>
            </div>
        </div>
        <div ng-show="currentTMI == '3'" class="tmi10ThingsCard col-sm-6 col-md-6 col-lg-6 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
            <div>
                <h3>#3 I am partially Ambidextrous?</h3>
            </div>

            <div>
                <img class="center-block" src="http://placehold.it/128">
            </div>

            <div>
                <p>
                    I write, drive, and eat with my left hand.
                    However I use my right to brush my teeth, and throw a football.
                    Pretty much everything else is up for grabs.
                </p>
            </div>

            <div>
                <button class="btn btn-warning" ng-click="prevTMI()">Prev</button>
                <button class="btn btn-warning" ng-click="nextTMI()">Next</button>
            </div>
        </div>
        <div ng-show="currentTMI == '4'" class="tmi10ThingsCard col-sm-6 col-md-6 col-lg-6 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
            <div>
                <h3>#4 Brain >= Brawn</h3>
            </div>

            <div>
                <img class="center-block" src="http://placehold.it/128">
            </div>

            <div>
                <p>
                    I think its important to stay in shape physically.
                    Im always working to improve my 5RM's which are currently a 315lb Bench press, 390lb DeadLift, 375lb HackSquat, 105lb PullUp, and also a 5.2 sec 120ft Sprint.
                </p>
            </div>

            <div>
                <button class="btn btn-warning" ng-click="prevTMI()">Prev</button>
                <button class="btn btn-warning" ng-click="nextTMI()">Next</button>
            </div>
        </div>
        <div ng-show="currentTMI == '5'" class="tmi10ThingsCard col-sm-6 col-md-6 col-lg-6 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
            <div>
                <h3>#5 I'm a recovered SneakerHead</h3>
            </div>

            <div>
                <img class="center-block" src="http://placehold.it/128">
            </div>

            <div>
                <p>
                    Me 5 yrs ago: "Hello, I'm Kevin and can't seem to stop buying Jordans."
                </p>
            </div>

            <div>
                <button class="btn btn-warning" ng-click="prevTMI()">Prev</button>
                <button class="btn btn-warning" ng-click="nextTMI()">Next</button>
            </div>
        </div>
        <div ng-show="currentTMI == '6'" class="tmi10ThingsCard col-sm-6 col-md-6 col-lg-6 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
            <div>
                <h3>#6 I'm currently Addicted to Learning</h3>
            </div>

            <div>
                <img class="center-block" src="http://placehold.it/128">
            </div>

            <div>
                <p>
                    Most of the time its a new technology that peaks my interest.
                    However I do enjoy reading and hearing about other people's experiences within a wide variety of topics including:
                    Business, Psychology, and Engineering.
                </p>
            </div>

            <div>
                <button class="btn btn-warning" ng-click="prevTMI()">Prev</button>
                <button class="btn btn-warning" ng-click="nextTMI()">Next</button>
            </div>
        </div>
        <div ng-show="currentTMI == '7'" class="tmi10ThingsCard col-sm-6 col-md-6 col-lg-6 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
            <div>
                <h3>#7 I can't swim... yet</h3>
            </div>

            <div>
                <img class="center-block" src="http://placehold.it/128">
            </div>
            <div>
                <p>
                    I was that kid who always clung to the side of the pool and NEVER ventured out further than arms reach of it.
                    Now I'm an adult who rarely ever goes near the pool.
                </p>
            </div>

            <div>
                <button class="btn btn-warning" ng-click="prevTMI()">Prev</button>
                <button class="btn btn-warning" ng-click="nextTMI()">Next</button>
            </div>
        </div>
        <div ng-show="currentTMI == '8'" class="tmi10ThingsCard col-sm-6 col-md-6 col-lg-6 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
            <div>
                <h3>#8 I'm not very Tall </h3>
            </div>

            <div>
                <img class="center-block" src="http://placehold.it/128">
            </div>

            <div>
                <p>I'm 5'6". That is all. <br/>#Touchy subject </p>
            </div>

            <div>
                <button class="btn btn-warning" ng-click="prevTMI()">Prev</button>
                <button class="btn btn-warning" ng-click="nextTMI()">Next</button>
            </div>
        </div>
        <div ng-show="currentTMI == '9'" class="tmi10ThingsCard col-sm-6 col-md-6 col-lg-6 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
            <div>
                <h3>#9 I'm chronically Efficient</h3>
            </div>

            <div>
                <img class="center-block" src="http://placehold.it/128">
            </div>
            <div>
                <p>This trait pays off when optimizing business processes.
                    Although my wife gets pretty annoyed when I present her with options for best method of travel based on current traffic and our destination. </p>
            </div>

            <div>
                <button class="btn btn-warning" ng-click="prevTMI()">Prev</button>
                <button class="btn btn-warning" ng-click="nextTMI()">Next</button>
            </div>
        </div>
        <div id="tmi10ThingsCard10" ng-show="currentTMI == '10'" class="tmi10ThingsCard col-sm-6 col-md-6 col-lg-6 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
            <div>
                <h3>#10 I love what I do</h3>
            </div>

            <div>
                <img class="center-block" src="http://placehold.it/128">
            </div>

            <div>
                <p>
                    I really find excitement in my daily blend of customer acquisition, business, and web development activities.
                    I love the consistent learning, collaboration, and experiences I gain as I pursue mastery.
                </p>
            </div>

            <div>
                <button class="btn btn-warning" ng-click="prevTMI()">Prev</button>
                <button class="btn btn-warning" ng-click="nextTMI()">Next</button>
            </div>
        </div>
    </div>

    <div id="tmiSkills" class="text-center" ng-show="showing == 'skills'">
        <div class="tmiCard col-sm-6 col-md-6 col-lg-6 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
            <div>
                <h3>Wanna review my skills?</h3>
            </div>
            <div>
                <img class="img-responsive center-block" src="http://placehold.it/128">
            </div>
            <div>
                <p>I developed an interactive page that can help you quickly determine if I have the skills you are looking for.</p>
                <a href="/skills" target="_blank">Here it is</a>
            </div>
        </div>
    </div>

</div>
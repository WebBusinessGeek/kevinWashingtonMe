
<div class="text-center" ng-controller="tmiController">
    <div id="tmiHeadline">
        <h1>Some additional information</h1>
    </div>

    <div class="row text-center" id="tmiNavList">
        <div class="col-sm-3 col-md-3 col-lg-3"><a ng-click="show('resume')"><img src="http://placehold.it/125">resume</a></div>

        <div class="col-sm-3 col-md-3 col-lg-3"><a ng-click="show('10Things')"><img src="http://placehold.it/125">10things</a></div>

        <div class="col-sm-3 col-md-3 col-lg-3"><a ng-click="show('skills')"><img src="http://placehold.it/125">skills</a></div>

        <div class="col-sm-3 col-md-3 col-lg-3"><a ng-click="show('visualWorkHistory')"><img src="http://placehold.it/125">visual</a></div>
    </div>


    <div id="tmiResume" ng-show="showing == 'resume'">
        <div>
            <p>Resume section</p>
        </div>
    </div>

    <div id="tmi10Things" class="text-center row" ng-show="showing == '10Things'">
        <div ng-show="currentTMI == '0'" class="tmi10ThingsCard col-sm-6 col-md-6 col-lg-6 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
            <div>
                <h4>This is intro to my 10 things</h4>
            </div>

            <div>
                <img class="center-block" src="http://placehold.it/150">
            </div>

            <div>
                <p>This will be the body of the card.</p>
            </div>

            <div>
                <button class="btn btn-warning" ng-click="setTMIto1()">Begin</button>
            </div>

        </div>
        <div ng-show="currentTMI == '1'" class="tmi10ThingsCard col-sm-6 col-md-6 col-lg-6 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
            <div>
                <h3>#1 I'm a follower of Jesus Christ</h3>
            </div>

            <div>
                <img class="center-block" src="http://placehold.it/150">
            </div>

            <div>
                <p>
                    I thought to put this first because my relationship with God has a enormous influence on my character.
                    This makes me attribute high value to qualities such as honesty, integrity, and selflessness and those that possess them.
                </p>
            </div>

            <div>
                <button class="btn btn-warning" ng-click="nextTMI()">Next</button>
            </div>

        </div>
        <div ng-show="currentTMI == '2'" class="tmi10ThingsCard col-sm-6 col-md-6 col-lg-6 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
            <div>
                <h3>#2 I'm married and a father of two</h3>
            </div>

            <div>
                <img class="center-block" src="http://placehold.it/150">
            </div>

            <div>
                <p>
                    I am the father of two kids who are doing very well in school.
                    And I am happily married to my beautiful wife who only ever nags on weekdays.
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
                <h3>#3 I'm a Lefty...and a Righty?</h3>
            </div>

            <div>
                <img class="center-block" src="http://placehold.it/150">
            </div>

            <div>
                <p>
                    I write, drive, and eat with my left hand.
                    However I brush my teeth, throw a football, and shoot at the range with my right.
                    Everything else is pretty much up for grabs.
                </p>
            </div>

            <div>
                <button class="btn btn-warning" ng-click="prevTMI()">Prev</button>
                <button class="btn btn-warning" ng-click="nextTMI()">Next</button>
            </div>
        </div>
        <div ng-show="currentTMI == '4'" class="tmi10ThingsCard col-sm-6 col-md-6 col-lg-6 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
            <div>
                <h3>#4 I pump iron</h3>
            </div>

            <div>
                <img class="center-block" src="http://placehold.it/150">
            </div>

            <div>
                <p>
                    While I do sit in front of my machine all day I think its important to stay in great shape.
                    Currently I am chasing a 400lb Bench press, 600lb DeadLift, 500lb HackSquat, 200lb PullUp, and 4.4 sec 120ft Sprint.
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
                <img class="center-block" src="http://placehold.it/150">
            </div>

            <div>
                <p>
                    Me 2 yrs ago: "Hello, I'm Kevin and cant stop buying Jordans."
                </p>
            </div>

            <div>
                <button class="btn btn-warning" ng-click="prevTMI()">Prev</button>
                <button class="btn btn-warning" ng-click="nextTMI()">Next</button>
            </div>
        </div>
        <div ng-show="currentTMI == '6'" class="tmi10ThingsCard col-sm-6 col-md-6 col-lg-6 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
            <div>
                <h3>#6 I'm currently addicted to learning new things</h3>
            </div>

            <div>
                <img class="center-block" src="http://placehold.it/150">
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
                <img class="center-block" src="http://placehold.it/150">
            </div>
            <div>
                <p>
                    Yup. I was that kid who always clung to the side of the pool and NEVER ventured further than arms reach of it.
                    Now I'm that adult who stays out the pool and splashes everyone. Sad.
                </p>
            </div>

            <div>
                <button class="btn btn-warning" ng-click="prevTMI()">Prev</button>
                <button class="btn btn-warning" ng-click="nextTMI()">Next</button>
            </div>
        </div>
        <div ng-show="currentTMI == '8'" class="tmi10ThingsCard col-sm-6 col-md-6 col-lg-6 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
            <div>
                <h3>#8 I would love to work at Google</h3>
            </div>

            <div>
                <img class="center-block" src="http://placehold.it/150">
            </div>

            <div>
                <p>This will be the body of the card.</p>
            </div>

            <div>
                <button class="btn btn-warning" ng-click="prevTMI()">Prev</button>
                <button class="btn btn-warning" ng-click="nextTMI()">Next</button>
            </div>
        </div>
        <div ng-show="currentTMI == '9'" class="tmi10ThingsCard col-sm-6 col-md-6 col-lg-6 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
            <div>
                <h3>#9 I'm chronically efficient</h3>
            </div>

            <div>
                <img class="center-block" src="http://placehold.it/150">
            </div>
            <div>
                <p>While this trait pays off when optimizing business processes.
                    My wife gets pretty annoyed when I present her with options for best method of travel based on current traffic and destinations. lol </p>
            </div>

            <div>
                <button class="btn btn-warning" ng-click="prevTMI()">Prev</button>
                <button class="btn btn-warning" ng-click="nextTMI()">Next</button>
            </div>
        </div>
        <div ng-show="currentTMI == '10'" class="tmi10ThingsCard col-sm-6 col-md-6 col-lg-6 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
            <div>
                <h3>#10 I love what I do</h3>
            </div>

            <div>
                <img class="center-block" src="http://placehold.it/150">
            </div>

            <div>
                <p>This will be the body of the card.</p>
            </div>

            <div>
                <button class="btn btn-warning" ng-click="prevTMI()">Prev</button>
                <button class="btn btn-warning" ng-click="nextTMI()">Next</button>
            </div>
        </div>
    </div>

    <div id="tmiSkills" class="text-center" ng-show="showing == 'skills'">
        <div class="tmi10ThingsCard col-sm-6 col-md-6 col-lg-6 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
            <div>
                <h4>Wanna review my skills?</h4>
            </div>
            <div>
                <img class="img-responsive center-block" src="http://placehold.it/150">
            </div>
            <div>
                <p>I developed a light application that can help you quickly determine if I have the skills you are looking for.</p>
                <a href="/skills">Here it is</a>
            </div>
        </div>
    </div>

    <div id="tmiVisualWorkHistory" ng-show="showing == 'visualWorkHistory'">
        <div>
            <p>Visual work history section</p>
        </div>
    </div>
</div>
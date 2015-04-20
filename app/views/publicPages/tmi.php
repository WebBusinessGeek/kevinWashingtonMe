
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
                <p>This will be the body of the card.</p>
            </div>

            <div>
                <button class="btn btn-warning" ng-click="setTMIto1()">Begin</button>
            </div>

        </div>
        <div ng-show="currentTMI == '1'" class="tmi10ThingsCard col-sm-6 col-md-6 col-lg-6 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
            <div>
                <h4>This will be the header of 1</h4>
            </div>

            <div>
                <p>This will be the body of the card.</p>
            </div>

            <div>
                <button class="btn btn-warning" ng-click="nextTMI()">Next</button>
            </div>

        </div>
        <div ng-show="currentTMI == '2'" class="tmi10ThingsCard col-sm-6 col-md-6 col-lg-6 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
            <div>
                <h4>This will be the header of 2</h4>
            </div>

            <div>
                <p>This will be the body of the card.</p>
            </div>

            <div>
                <button class="btn btn-warning" ng-click="prevTMI()">Prev</button>
                <button class="btn btn-warning" ng-click="nextTMI()">Next</button>
            </div>
        </div>
        <div ng-show="currentTMI == '3'" class="tmi10ThingsCard col-sm-6 col-md-6 col-lg-6 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
            <div>
                <h4>This will be the header of 3</h4>
            </div>

            <div>
                <p>This will be the body of the card.</p>
            </div>

            <div>
                <button class="btn btn-warning" ng-click="prevTMI()">Prev</button>
                <button class="btn btn-warning" ng-click="nextTMI()">Next</button>
            </div>
        </div>
        <div ng-show="currentTMI == '4'" class="tmi10ThingsCard col-sm-6 col-md-6 col-lg-6 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
            <div>
                <h4>This will be the header of 4</h4>
            </div>

            <div>
                <p>This will be the body of the card.</p>
            </div>

            <div>
                <button class="btn btn-warning" ng-click="prevTMI()">Prev</button>
                <button class="btn btn-warning" ng-click="nextTMI()">Next</button>
            </div>
        </div>
        <div ng-show="currentTMI == '5'" class="tmi10ThingsCard col-sm-6 col-md-6 col-lg-6 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
            <div>
                <h4>This will be the header of 5</h4>
            </div>

            <div>
                <p>This will be the body of the card.</p>
            </div>

            <div>
                <button class="btn btn-warning" ng-click="prevTMI()">Prev</button>
                <button class="btn btn-warning" ng-click="nextTMI()">Next</button>
            </div>
        </div>
        <div ng-show="currentTMI == '6'" class="tmi10ThingsCard col-sm-6 col-md-6 col-lg-6 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
            <div>
                <h4>This will be the header of 6</h4>
            </div>

            <div>
                <p>This will be the body of the card.</p>
            </div>

            <div>
                <button class="btn btn-warning" ng-click="prevTMI()">Prev</button>
                <button class="btn btn-warning" ng-click="nextTMI()">Next</button>
            </div>
        </div>
        <div ng-show="currentTMI == '7'" class="tmi10ThingsCard col-sm-6 col-md-6 col-lg-6 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
            <div>
                <h4>This will be the header of 7</h4>
            </div>

            <div>
                <p>This will be the body of the card.</p>
            </div>

            <div>
                <button class="btn btn-warning" ng-click="prevTMI()">Prev</button>
                <button class="btn btn-warning" ng-click="nextTMI()">Next</button>
            </div>
        </div>
        <div ng-show="currentTMI == '8'" class="tmi10ThingsCard col-sm-6 col-md-6 col-lg-6 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
            <div>
                <h4>This will be the header of 8</h4>
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
                <h4>This will be the header of 9</h4>
            </div>

            <div>
                <p>This will be the body of the card.</p>
            </div>

            <div>
                <button class="btn btn-warning" ng-click="prevTMI()">Prev</button>
                <button class="btn btn-warning" ng-click="nextTMI()">Next</button>
            </div>
        </div>
        <div ng-show="currentTMI == '10'" class="tmi10ThingsCard col-sm-6 col-md-6 col-lg-6 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
            <div>
                <h4>This will be the header of 10</h4>
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
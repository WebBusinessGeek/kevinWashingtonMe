
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

    <div id="tmi10Things" ng-show="showing == '10Things'">
        <div>
            <p>10 things section</p>
        </div>
    </div>

    <div id="tmiSkills" ng-show="showing == 'skills'">
        <div>
            <p>Skills section</p>
        </div>
    </div>

    <div id="tmiVisualWorkHistory" ng-show="showing == 'visualWorkHistory'">
        <div>
            <p>Visual work history section</p>
        </div>
    </div>
</div>
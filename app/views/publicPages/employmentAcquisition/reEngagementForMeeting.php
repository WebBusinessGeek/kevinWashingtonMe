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
                <p>This is the content</p>
            </div>
        </div>
    </div>

    <div id="schedulerSection" ng-show="contentOrSchedule == 'scheduler'">
        <p>schedule section showing</p>
    </div>
</div>
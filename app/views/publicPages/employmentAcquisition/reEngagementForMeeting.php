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
        <p>content section showing</p>
    </div>

    <div id="schedulerSection" ng-show="contentOrSchedule == 'scheduler'">
        <p>schedule section showing</p>
    </div>
</div>
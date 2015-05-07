<div class="demonstrationBody text-center" ng-controller="demonstrationController">


    <div class="demoContentHeading">
        <h1>{{headline}}</h1>
    </div>

    <div class="demoContentBody">
        <p>
            I would like to think I could be a great addition to your team.
            However I don't know your business as well as you do.
            So I put this together to help you come to your own conclusion.
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
        <div ng-show="VTSetting == 'video'" class="demoVideoSection">
            <div>
                <p>This will be the video</p>
            </div>
        </div>

        <div ng-show="VTSetting == 'transcript'" class="demoTranscriptSection">
            <div>
                <p>This will be the transcript</p>
            </div>
        </div>
    </div>


    <div class="demoCallToActionSection">
        <a href="{{ctaLink}}" class="btn btn-warning">How we can work together</a>
    </div>








</div>
<div class="demonstrationBody text-center" ng-controller="demonstrationController">


    <div class="demoContentHeading">
        <h1>{{headline}}</h1>
    </div>

    <div class="demoContentBody col-lg-8 col-lg-offset-2">
        <p>
            I would like to think I could be a great addition to your team.
            However I don't know your business as well as you do.
        </p>
        <p class="pHeavyTopMargin">
            So I put this short video (and transcript) together to help you come to your own conclusion.
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
            <div id="demoVideoContainer">
                <video muted loop controls>
                    <source src="/assets/kevinwashingtonmevideo.mp4" type="video/mp4">
                    <source src="https://www.youtube.com/watch?v=locvDX2xrLc" type="video/ogg">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>

        <div ng-show="VTSetting == 'transcript'" class="demoTranscriptSection">
            <div>
                <p>This will be the transcript</p>
            </div>
        </div>
    </div>


    <div class="demoCallToActionSection">
        <a id="demoCTA" href="{{ctaLink}}" class="btn btn-warning btn-lg">How we can work together</a>
    </div>








</div>
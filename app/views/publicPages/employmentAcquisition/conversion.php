<div id="recruitmentConversionBody" class="text-center" ng-controller="conversionController">


    <div id="recruitmentConversionContentHeader">
        <div>
            <h1>Let's Talk!</h1>
        </div>

        <div>
            <p>
                I'm glad you think I could make a good addition to your team.
            </p>
            <p>
                Please fill out the really short form below and I will get back to you (within 24 hours) with my availability.
            </p>
            <p>
                Looking forward to learning more about your opportunity.
            </p>
        </div>

        <div>
            <div class="interviewOrConnectSection">
                <div class="slider-toggle left">
                    <span class="label">Request an interview</span>
              <span ng-click="interviewConnectSettingSwitch()" class="slider">
                    <span class="toggle">
                        <span class="grip"></span>
                    </span>
                </span>
                    <span class="label">Connect with me</span>
                </div>
            </div>
        </div>
        <div id="interviewFormSection" ng-show="interviewConnectSetting == 'interview'">
            <p>This will be the interview form.</p>
            
        </div>
        <div id="connectFormSection" ng-show="interviewConnectSetting == 'connect'">
            <p>This will be the connect form. </p>
        </div>
    </div>
</div>
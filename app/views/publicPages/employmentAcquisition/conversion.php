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
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Check me out
                    </label>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
        <div id="connectFormSection" ng-show="interviewConnectSetting == 'connect'">
            <p>This will be the connect form. </p>
        </div>
    </div>
</div>
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
                Looking forward to learning more about your opportunity!
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
        <p id="formHelpText">Please fill out this short form and I will plan to get back to you with my availability within 24 hours.</p>

        <div id="interviewFormSection" ng-show="interviewConnectSetting == 'interview'">

            <form>
                <div id="requesterInformation">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="example - Carl Winslow" ng-model="contactName">
                    </div>
                    <div class="form-group">
                        <label for="contactMethod">Best Contact Method</label>
                        <select class="form-control" id="contactMethod"  ng-model="contactMethodValue">
                            <option value="email">Email</option>
                            <option value="phone">Phone</option>
                        </select>
                    </div>
                    <div class="form-group" ng-show="contactMethodValue == 'email'">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="example - carlWinslow@familymatters.com" ng-model="contactEmail">
                    </div>
                    <div class="form-group" ng-show="contactMethodValue == 'phone'">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" placeholder="example - 610-444-4444" ng-model="contactPhone">
                    </div>
                </div>

                <div id="interviewInformation">
                    <div class="form-group">
                        <label for="interviewType">Interview Type</label>
                        <select class="form-control" id="interviewType" ng-model="interviewTypeValue">
                            <option value="video">Video (Skype, Google Hangouts, etc.)</option>
                            <option value="person">In Person (Reasonably close to Philadelphia please.)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="interviewContactPersonDifferent">Interview Contact Different from above?</label>
                        <input type="checkbox" id="interviewContactPersonDifferent" value="true"  ng-model="interviewContactPersonDifferentValue">
                    </div>
                    <div ng-show="interviewContactPersonDifferentValue">
                        <div class="form-group">
                            <label for="interviewContactPersonName">Contact Person's Name</label>
                            <input type="text" class="form-control" id="interviewContactPersonName" ng-model="interviewContactPersonName" placeholder="example - Laura Winslow">
                        </div>
                        <div class="form-group">
                            <label for="interviewContactMethod">Best Contact Method</label>
                            <select class="form-control" id="interviewContactMethod"  ng-model="interviewContactMethodValue">
                                <option value="email">Email</option>
                                <option value="phone">Phone</option>
                            </select>
                        </div>
                        <div class="form-group" ng-show="interviewContactMethodValue == 'email'">
                            <label for="interviewEmail">Contact Person's Email</label>
                            <input type="email" class="form-control" id="interviewEmail" placeholder="example - lauraWinslow@familymatters.com" ng-model="interviewContactEmail">
                        </div>
                        <div class="form-group" ng-show="interviewContactMethodValue == 'phone'">
                            <label for="interviewPhone">Contact Person's Phone</label>
                            <input type="text" class="form-control" id="interviewPhone" placeholder="example - 610-444-4444" ng-model="interviewContactPhone">
                        </div>
                    </div>
                </div>

                <div id="positionInformation" ng-show="!interviewContactPersonDifferentValue || interviewContactEmail || interviewContactPhone">

                    <div class="form-group">
                        <label for="companyName">Company Name</label>
                        <input type="text" id="companyName" class="form-control" ng-model="companyName" placeholder="example - Google">
                    </div>
                    <div class="form-group">
                        <label for="companyWebsite">Url</label>
                        <input type="text" id="companyWebsite" class="form-control" ng-model="companyWebsite" placeholder="http://example.com">
                    </div>
                    <div class="form-group">
                        <label for="positionInfo">What will be my Roles or Responsibilities?</label>
                        <textarea class="form-control" id="positionInfo" ng-model="positionInformation"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="remoteOrOffice">Is this position remote or on location?</label>
                        <select class="form-control" id="remoteOrOffice" ng-model="remoteOrOfficeBased">
                            <option value="remote">Remote</option>
                            <option value="office">Office</option>
                            <option value="optionalBoth">Optional/Both</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="employment">Employment Type</label>
                        <select class="form-control" id="employment" ng-model="employmentType">
                            <option value="fullTime">Full-time</option>
                            <option value="partTime">Part-time</option>
                            <option value="project">Project based</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="compensation">Estimated Yearly Compensation</label>
                        <input type="range" id="compensation" min="30000" max="90000" step="1000" ng-model="compensationRange">
                        <div ng-show="!compensationRange">
                            $60,000.00 yearly
                        </div>
                        <div ng-show="compensationRange">
                            {{compensationRange | currency}} yearly
                        </div>

                    </div>
                </div>

                <button type="submit" class="btn btn-default" ng-click="submitInterviewRequest()">Submit</button>
            </form>
        </div>
        <div id="connectFormSection" ng-show="interviewConnectSetting == 'connect'">
            <form>
                <div id="requesterInformation">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="example - Carl Winslow" ng-model="connectName">
                    </div>
                    <div class="form-group">
                        <label for="connectMethod">Best Contact Method</label>
                        <select class="form-control" id="connectMethod"  ng-model="connectMethodValue">
                            <option value="email">Email</option>
                            <option value="phone">Phone</option>
                        </select>
                    </div>
                    <div class="form-group" ng-show="connectMethodValue == 'email'">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="example - carlWinslow@familymatters.com" ng-model="connectEmail">
                    </div>
                    <div class="form-group" ng-show="connectMethodValue == 'phone'">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" placeholder="example - 610-444-4444" ng-model="connectPhone">
                    </div>
                    <div class="form-group">
                        <label for="connectMessage">How can I help?</label>
                        <textarea class="form-control" id="connectMessage" ng-model="connectMessage"></textarea>
                    </div>
                </div>

                <div ng-hide="hidePrivateData">
                    {{ connectInfo = {'name': connectName, 'email': connectEmail, 'phone':connectPhone,'contactMethod':connectMethodValue, 'message': connectMessage } }}
                </div>
                    <button type="submit" class="btn btn-default" ng-click="submitConnectRequest(connectInfo)">Submit</button>

            </form>
        </div>
    </div>
</div>
<div ng-controller="connectController">
    <div ng-show="message" class="alert alert-info">
        {{message}}
    </div>

    <div id="contactNav" >
        <div class="row" id="contactNavHeader">
            <h1 class="text-center">4 Easy Ways to Connect</h1>
        </div>
        <div class="row text-center" id="contactNavList">
                <div class="col-sm-1 col-md-1 col-lg-1"></div>
                <div class="contactImage col-sm-2 col-md-2 col-lg-2"><a ng-click="show('form')"><img src="http://placehold.it/150/fff/000/"></a></div>
                <div class="col-sm-1 col-md-1 col-lg-1"></div>
                <div class="contactImage col-sm-2 col-md-2 col-lg-2"><a ng-click="show('email')"><img src="http://placehold.it/150/fff/000/"></a></div>
                <div class="col-sm-1 col-md-1 col-lg-1"></div>
                <div class="contactImage col-sm-2 col-md-2 col-lg-2"><a ng-click="show('skype')"><img src="http://placehold.it/150/fff/000/"></a></div>
                <div class="col-sm-1 col-md-1 col-lg-1"></div>
                <div class="contactImage col-sm-2 col-md-2 col-lg-2"><a ng-click="show('voiceMail')"><img src="http://placehold.it/150/fff/000/"></a></div>

        </div>

    </div>


    <div id="contactForm" class="col-sm-12 col-md-12 col-lg-12 well" ng-if="showing == 'form'">
        <div id="contactFormHeader" class="text-center">
            <h4>Simple Contact Form</h4>
            <p>A quick way to get in touch with me. When happy with your message just hit send.</p>
        </div>

        <div id="contactFormInputs" class="col-md-5 well">
            <form class="form-horizontal">


                <div class="form-group">
                    <label for="body" >Help me understand your business objectives, and how I can help:</label>
                        <textarea name="body" ng-model="inquiryBody" class="form-control" rows="10" cols="30"></textarea>
                </div>

                <div class="form-group">
                    <label for="name" class="text-center">Enter your name: </label>
                    <input type="text" ng-model="inquiryName"  class="form-control input-lg" name="name" id="name" placeholder="Name">

                </div>

                <div class="form-group">
                    <label for="contactMethod" ng-model="inquiryContactMethod" class="text-center">Preferred Contact Method: </label>
                    <select ng-model="inquiryContactMethod" class="form-control input-lg">
                        <option>Email</option>
                        <option>Phone</option>
                    </select>
                </div>


    <!--            ONe of the below groups should be hidden based on previous input value-->
                <div class="form-group" ng-show="inquiryContactMethod == 'Email'">
                    <label for="email" class="text-center">Enter your email: </label>
                    <input type="email" ng-model="inquiryEmail" class="form-control input-lg" name="email" id="email" placeholder="Email...">

                </div>
                <div class="form-group" ng-show="inquiryContactMethod == 'Phone'">
                    <label for="phone" class="text-center">Enter your phone: </label>
                    <input type="text" ng-model="inquiryPhone"  class="form-control input-lg" name="phone" id="phone" placeholder="Phone...">

                </div>


    <!--        inputs form-->
    </div>
        <div id="contactFormPreview" class="col-md-6 col-sm-offset-1" >
            <div  style="min-height: 500px;">

                <h3 ng-hide="(inquiryBody || inquiryName || inquiryContactMethod)">Preview your message here.</h3>

                <div>
                    <h4 ng-show="inquiryBody">My Message: </h4>
                    <p>{{inquiryBody}}</p>
                </div>

                <div>
                    <h4 ng-show="inquiryName">My Name: </h4>
                    <p>{{inquiryName}}</p>
                </div>

                <div>
                    <h4 ng-show="inquiryContactMethod">Reach Me By: </h4>
                    <p>{{inquiryContactMethod}}</p>
                </div>

                <div>
                    <h4 ng-show="inquiryEmail">My Email: </h4>
                    <p>{{inquiryEmail}}</p>
                </div>

                <div>
                    <h4 ng-show="inquiryPhone">My Phone Number: </h4>
                    <p>{{inquiryPhone}}</p>
                </div>



                <div ng-if="(inquiryBody && inquiryName && inquiryContactMethod) && (inquiryEmail || inquiryPhone)">
                    <button class="btn btn-primary btn-lg center-block" ng-if="inquiryBody" ng-click="newInquiry(inquiryBody, inquiryName, inquiryContactMethod, inquiryEmail, inquiryPhone)">Send my inquiry!</button>
                </div>
            </div>
        </div>


    </div>




    <div class="col-md-6 contactSection col-sm-offset-1 text-center" ng-if="showing == 'email'">
        <h4>Email Me</h4>
        <img src="http://placehold.it/200x150">
        <h5>inquiry@kevinwashington.me</h5>
        <p>{{helperMessage}}</p>
    </div>


    <div class="col-md-6 contactSection col-sm-offset-1 text-center" ng-if="showing == 'skype'">
        <h4>Add Me on Skype</h4>
        <img src="http://placehold.it/200x150">
        <h5>@webbusinessdeveloper</h5>
        <p class="reminder">{{helperMessage}}</p>
    </div>


    <div class="col-md-6 contactSection col-sm-offset-1 text-center" ng-if="showing == 'voiceMail'">
        <h4>Leave me a message</h4>
        <img src="http://placehold.it/200x150">
        <h5>@215-744-7444</h5>
        <p>{{helperMessage}}</p>
    </div>
</div>
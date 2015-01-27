<div ng-controller="connectController">
    <div id="contactNav" class="col-md-3 well">
        <div id="contactNavHeader">
            <h4>4 Easy Ways to Connect</h4>
        </div>

        <div id="contactNavList">
            <ol>
                <li><a ng-click="show('form')">Simple Contact Form</a></li>
                <li><a ng-click="show('email')">Email Me</a></li>
                <li><a ng-click="show('skype')">Add Me on Skype</a></li>
                <li><a ng-click="show('voiceMail')">Leave Me a Voicemail</a></li>
            </ol>
        </div>

    </div>


    <div id="contactForm" class="col-md-8 col-sm-offset-1 well" ng-if="showing == 'form'">
        <div id="contactFormHeader" class="text-center">
            <h4>Simple Contact Form</h4>
            <p>A quick way to get in touch with me. When happy with your message just hit send.</p>
        </div>

        <div id="contactFormInputs" class="col-md-5 well">
            <form class="form-horizontal">


                <div class="form-group">
                    <label for="body" >Help me understand your business objectives, and how I can help:</label>
                        <textarea name="body" class="form-control" rows="10" cols="30"></textarea>
                </div>

                <div class="form-group">
                    <label for="name" class="text-center">Enter your name: </label>
                    <input type="text" class="form-control input-lg" name="name" id="name" placeholder="Name">

                </div>

                <div class="form-group">
                    <label for="contactMethod" class="text-center">Preferred Contact Method: </label>
                    <select class="form-control input-lg">
                        <option>Email</option>
                        <option>Phone</option>
                    </select>
                </div>


    <!--            ONe of the below groups should be hidden based on previous input value-->
                <div class="form-group">
                    <label for="email" class="text-center">Enter your email: </label>
                    <input type="text" class="form-control input-lg" name="email" id="email" placeholder="Email...">

                </div>
                <div class="form-group">
                    <label for="phone" class="text-center">Enter your phone: </label>
                    <input type="text" class="form-control input-lg" name="phone" id="phone" placeholder="Phone...">

                </div>


    <!--        inputs form-->
    </div>
        <div id="contactFormPreview" class="col-md-6 col-sm-offset-1 well">
            <p>This will be preview text....This will be preview text....This will be preview text....
                This will be preview text....This will be preview text....This will be preview text....
                This will be preview text....This will be preview text....This will be preview text....
                This will be preview text....This will be preview text....This will be preview text....
                This will be preview text....This will be preview text....This will be preview text....
                This will be preview text....This will be preview text....This will be preview text....
                This will be preview text....This will be preview text....This will be preview text....
                This will be preview text....This will be preview text....This will be preview text....
                This will be preview text....This will be preview text....This will be preview text....
            </p>
            <div>
                <button class="btn btn-primary btn-lg center-block">Send my inquiry!</button>
            </div>
        </div>


    </div>


    <br/>
    <br/>
    <br/>
    <br/>



    <div class="col-md-6 well col-sm-offset-4 text-center" ng-if="showing == 'email'">
        <h4>Email Me</h4>
        <img src="http://placehold.it/200x150">
        <p>Please include your name, business objectives,
            and other other information you think important for us to be effective working together.</p>
    </div>


    <div class="col-md-6 well col-sm-offset-4 text-center" ng-if="showing == 'skype'">
        <h4>Add Me on Skype</h4>
        <img src="http://placehold.it/200x150">
        <p>In your add message - Please include your name, business objectives,
            and other other information you think would be important.</p>
    </div>


    <div class="col-md-6 well col-sm-offset-4 text-center" ng-if="showing == 'voiceMail'">
        <h4>Leave me a message @ 215-744-7444</h4>
        <img src="http://placehold.it/200x150">
        <p>In your message - Please include your name, business objectives,
            and other other information you think would be important.</p>
    </div>
</div>
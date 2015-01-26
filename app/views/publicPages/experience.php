<div id="experienceIndex" class="text-center" ng-controller="experienceController">

    <div ng-hide="showing">
        <div id="experienceIndexText">
            <h1>Some recent projects I have been apart of.</h1>
        </div><br/>

        <div id="experienceIndexResults" class="row col-sm-offset-1">
            <div class="col-sm-4 col-md-offset-1 well" ng-repeat="experience in experiences | limitTo:2">
                <h4>{{experience.name}}</h4>
                <img src="http://placehold.it/200x150">
                <p>Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly. Danish soufflé I love sweet tiramisu I love.</p>
                <button class="btn btn-success" ng-click="show(experience)">See more</button>
            </div>
        </div>

    </div>




<div id="experienceShow" ng-if="showing">

    <div class="row">
        <div class="col-md-4">
            <a ng-click="stopShow()">Back</a>

        </div>
    </div>

    <div class="row text-center">
        <div id="companyClientInfo" class="col-md-4 well">
            <h4>Company/Client Info</h4>
            <img src="http://placehold.it/150x120">
            <p><b>Some info: </b>Info about it. </p>
            <p><b>Some info: </b>Info about it. </p>
            <p><b>Some info: </b>Info about it. </p>
        </div>

        <div id="highlights" class="col-md-7 col-sm-offset-1 well">
            <h4>Highlights working with {{showing.name}}</h4>
            <ul>
                <li>Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.</li>
                <li>Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.</li>
                <li>Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.</li>
                <li>Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.</li>
                <li>Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.</li>
                <li>Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.</li>
                <li>Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.</li>
                <li>Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.</li>
                <li>Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.</li>
                <li>Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.</li>
                <li>Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.</li>

            </ul>
        </div>
    </div>

    <div class="row">
        <div id="rolesResponsibilities" class="col-md-12 well">
            <h4>Description of project</h4>
            <p> Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.
            Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.
            Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.
            Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.
            Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.
            Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.
            Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.
            Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly. </p>

            <br/>
            <h4>Roles and Responsiblities</h4>
            <ul>
                <li>Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.</li>
                <li>Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.</li>
                <li>Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.</li>
                <li>Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.</li>
                <li>Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.</li>
                <li>Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.</li>
                <li>Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.</li>
                <li>Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.</li>
                <li>Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.</li>
                <li>Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.</li>
            </ul>

        </div>
    </div>


    <div class="row">
        <div id="interview" class="col-md-12 well">
            <h4 class="text-center">Feedback From the Client</h4>

            <div class="questionGroup">
                    <h4>Q: A Question that needs an answer</h4>
                    <div class="row">
                        <div class="col-sm-1">
                            <img src="http://placehold.it/150x120">
                        </div>
                        <div class="col-sm-10 col-lg-offset-1">
                        <p> Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.
                            Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.
                            Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.
                            Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.
                            Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.
                            Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.
                            Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.
                            Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly. </p>
                        </div>
                    </div>
            </div>
            <div class="questionGroup">
                <h4>Q: A Question that needs an answer</h4>
                <div class="row">
                    <div class="col-sm-1">
                        <img src="http://placehold.it/150x120">
                    </div>
                    <div class="col-sm-10 col-lg-offset-1">
                        <p> Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.
                            Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.
                            Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.
                            Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.
                            Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.
                            Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.
                            Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.
                            Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly. </p>
                    </div>
                </div>
            </div>
            <div class="questionGroup">
                <h4>Q: A Question that needs an answer</h4>
                <div class="row">
                    <div class="col-sm-1">
                        <img src="http://placehold.it/150x120">
                    </div>
                    <div class="col-sm-10 col-lg-offset-1">
                        <p> Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.
                            Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.
                            Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.
                            Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.
                            Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.
                            Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.
                            Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.
                            Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
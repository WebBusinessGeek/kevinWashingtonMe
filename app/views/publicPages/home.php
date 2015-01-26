


    <div class="text-center" ng-controller="homeController">

        <div id="searchBarGroup">
            <div id="searchBarText">
                <h1>Do I have the skills your looking for?</h1>
            </div>
            <div id="searchBar">
                <input type="text" class="form-control input-lg">
            </div>
        </div>


        <br/>
        <div id="CTAGroup">
            <div id="CTA">
                <button class="btn btn-primary btn-lg">
                    Work with me.
                </button>
            </div>
            <div id="subCTA">
                <a href="#">
                    Or See Why You Should.
                </a>
            </div>
        </div>

        <br/>

        <div style="max-height: 500px; overflow: auto;" >

             <div class="row col-sm-offset-1" ng-repeat="tag in tags.tags">
                <h3>{{tag.title}} related skills</h3>
                <div class="col-sm-11 well" ng-repeat="skill in tag.skills">
                    <div class="row">
                        <div class="col-sm-4">
                            <h4>{{skill.title}} from {{tag.title}}</h4>
                            <img src="http://placehold.it/120x90">
                        </div>
                        <div class="col-sm-6"><br/><br/>
                            <p>Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly. Danish soufflé I love sweet tiramisu I love.</p>
                            <button class="btn btn-success">See more</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        
        <button class="btn btn-lg btn-primary pull-right">More skills</button>
    </div>




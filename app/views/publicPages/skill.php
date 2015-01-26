<div ng-controller="skillController">
    <div id="mainSearchGroup" class="well col-lg-4 text-center">

        <div id="tagSearchGroup">

            <div id="tagSearchText">
                <h4>Know what skills your looking for?</h4>
            </div>
            <div id="tagSearchBar">
                <input type="text" ng-model="tagQuery" class="form-control input-lg" placeholder="Start typing...">
            </div>
        </div>


        <div>
            <h5>Or...</h5>
        </div>

    <br/>
        <div id="categorySearchGroup">
            <div id="categorySearchHeading">
                <h4>Browse by Category</h4>
            </div>
            <br/>
            <div>
                <h5>Parent Category</h5>
                    <p>Category</p>
                    <p>Category</p>
                    <p>Category</p>
                    <p>Category</p>
                <h5>Parent Category</h5>
                    <p>Category</p>
                    <p>Category</p>
                    <p>Category</p>
                    <p>Category</p>
                <h5>Parent Category</h5>
                    <p>Category</p>
                    <p>Category</p>
                    <p>Category</p>
                    <p>Category</p>
            </div>
        </div>

    </div>


    <div id="tagResultsSection" class="col-lg-7 col-lg-offset-1 well" ng-if="tagQuery">
        <div id="tagResultsIndex" class="text-center" >

            <div ng-repeat="tag in tags | filter:tagQuery" ng-hide="showing">
                <h3>{{tag.title}}</h3>
                <div class="row">
                    <div ng-repeat="skill in tag.skills">

                            <div class="col-sm-offset-1" ng-if="($index + 1) == 1 || (($index +1) -1) % 3 == 0 ">
                                <div class="col-md-3 well">
                                {{skill.title}}
                                    <img src="http://placehold.it/120/90">
                                    <p>Some text about the skill. Some text about the skill.
                                        Some text about the skill.</p>
                                    <button class="btn btn-primary" ng-click="show(skill)">See Skill</button>
                                </div>
                            </div>

                            <div class="col-md-3 well col-md-offset-1" ng-if="(($index+1) -1) % 3 != 0">
                                {{skill.title}}
                                <img src="http://placehold.it/120/90">
                                <p>Some text about the skill. Some text about the skill.
                                    Some text about the skill.</p>
                                <button class="btn btn-primary" ng-click="show(skill)">See Skill</button>

                            </div>
                    </div>
                </div>
            </div>



        <br/><br/>
        <div id="resultsShow" class="text-center" ng-show="showing">

            <div class="row col-md-offset-1">
                <div id="showDefinition" class="col-md-4 well">
                    <h4>What is {{showing.title}}</h4>
                    <p>{{showing.definition}}</p>
                </div>

                <div id="showTools" class="col-sm-6 col-md-offset-1 well">
                    <h4>Related Tools</h4>
                    <div style="max-height:100px; overflow:auto;">
                        <div ng-repeat="tool in showing.tools">
                            <h5>{{tool.title}}</h5>
                            <img src="http://placehold.it/100x100">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row col-md-offset-1">
                <div id="showShortArticle" class="col-sm-11 well">
                    <h4>{{showing.title}} in my own words.</h4>
                    <img src="http://placehold.it/100x100">
                    <p>{{showing.article}}</p>
                </div>
            </div>
            <button class="btn btn-primary btn-lg center-block" ng-click="stopShow()">Back to index</button>

        </div>


    </div>

</div>

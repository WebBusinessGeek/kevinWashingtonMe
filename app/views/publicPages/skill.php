<div ng-controller="skillController">
    <div id="mainSearchGroup" class="row text-center">

        <div id="tagSearchGroup" class="col-lg-6">

            <div id="tagSearchText">
                <h4>Know what skills your looking for?</h4>
            </div>
            <div id="tagSearchBar">
                <input type="text" ng-model="tagQuery" class="form-control input-lg" placeholder="Start typing...">
            </div>
        </div>


        <div id="categorySearchGroup" class="col-lg-6">
            <div id="categorySearchHeading">
                <h4>Browse by Category</h4>
            </div>
            <br/>
            <!--<div ng-repeat="supercategory in supercategories">
                <h5>{{supercategory.title}}</h5>
                    <div>
                        <span ng-repeat="category in supercategory.categories">
                            <img src="http://placehold.it/55x55"  ng-click="categorySelect(category)"> &nbsp;
                        </span>
                    </div>
            </div>-->
        </div>

    </div>

    <br/><br/><br/>

    <div id="resultsSection" class="col-lg-10 col-lg-offset-1  well" ng-if="!tagQuery && !selectedCategory">

        <div >
            <div class="carousel slide" id="myCarousel">
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="col-md-4"><a href="#"><img src="http://placehold.it/500/bbbbbb/fff&amp;text=1" class="img-responsive"></a></div>
                    </div>
                    <div class="item">
                        <div class="col-md-4"><a href="#"><img src="http://placehold.it/500/CCCCCC&amp;text=2" class="img-responsive"></a></div>
                    </div>
                    <div class="item">
                        <div class="col-md-4"><a href="#"><img src="http://placehold.it/500/eeeeee&amp;text=3" class="img-responsive"></a></div>
                    </div>
                    <div class="item">
                        <div class="col-md-4"><a href="#"><img src="http://placehold.it/500/f4f4f4&amp;text=4" class="img-responsive"></a></div>
                    </div>
                    <div class="item">
                        <div class="col-md-4"><a href="#"><img src="http://placehold.it/500/fcfcfc/333&amp;text=5" class="img-responsive"></a></div>
                    </div>
                    <div class="item">
                        <div class="col-md-4"><a href="#"><img src="http://placehold.it/500/f477f4/fff&amp;text=6" class="img-responsive"></a></div>
                    </div>
                </div>
                <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
            </div>
        </div>

    </div>


    <div id="resultsSection" class="col-lg-10 col-lg-offset-1 well" ng-if="tagQuery || selectedCategory">
        <!--
************************************    TAG QUERY INDEX SECTION ***************************************
        -->

        <div id="tagResultsIndex" class="text-center" ng-if="tagQuery" >
            <div ng-repeat="tag in tags | filter:tagQuery" ng-hide="showing">
                <h3>{{tag.title}}</h3>
                <div class="row">
                    <div ng-repeat="skill in tag.skills">

                            <div class="col-sm-offset-1" ng-if="($index + 1) == 1 || (($index +1) -1) % 3 == 0 ">
                                <div class="col-md-3 well">
                                {{skill.title}}
                                    <img src="http://placehold.it/120x90">
                                    <p>Some text about the skill. Some text about the skill.
                                        Some text about the skill.</p>
                                    <button class="btn btn-primary" ng-click="show(skill)">See Skill</button>
                                </div>
                            </div>

                            <div class="col-md-3 well col-md-offset-1" ng-if="(($index+1) -1) % 3 != 0">
                                {{skill.title}}
                                <img src="http://placehold.it/120x90">
                                <p>Some text about the skill. Some text about the skill.
                                    Some text about the skill.</p>
                                <button class="btn btn-primary" ng-click="show(skill)">See Skill</button>

                            </div>
                    </div>
                </div>
            </div>
        </div>
        <!--
        ************************************    SELECTED CATEGORY SECTION ***************************************
                -->
        <div id="categoryResultsIndex" class="text-center" ng-if="selectedCategory && tagQuery == null" >
            <div ng-hide="showing">
                <h3>{{selectedCategory.title}}</h3>
                <div class="row">
                    <div ng-repeat="skill in selectedCategory.skills">

                        <div class="col-sm-offset-1" ng-if="($index + 1) == 1 || (($index +1) -1) % 3 == 0 ">
                            <div class="col-md-3 well">
                                {{skill.title}}
                                <img src="http://placehold.it/120x90">
                                <p>Some text about the skill. Some text about the skill.
                                    Some text about the skill.</p>
                                <button class="btn btn-primary" ng-click="show(skill)">See Skill</button>
                            </div>
                        </div>

                        <div class="col-md-3 well col-md-offset-1" ng-if="(($index+1) -1) % 3 != 0">
                            {{skill.title}}
                            <img src="http://placehold.it/120x90">
                            <p>Some text about the skill. Some text about the skill.
                                Some text about the skill.</p>
                            <button class="btn btn-primary" ng-click="show(skill)">See Skill</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>

<!--
************************************    SKILLS SHOW SECTION ***************************************
        -->

        <br/><br/>
        <div id="resultsShow" class="text-center" ng-if="showing">

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

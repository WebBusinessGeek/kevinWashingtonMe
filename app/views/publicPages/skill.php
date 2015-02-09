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


<!--
******************************************DIRECTORY MODULE SECTION********************************************
-->

        <div id="DirectoryModule" class="col-lg-6">
            <div id="categorySearchHeading">
                <h4>Browse by Categorys</h4>
            </div>

            <div>
                Current Super: <b>{{supercategorySetTo.title}}</b>
                current category:<b> {{categorySetTo.title}}</b>
                current skill: <b>{{skillSetTo.title}}</b>
                <button class="btn btn-primary" ng-click="clearSupercategory()">see another category</button>
            </div>
            <!--
            *********************************** SuperCategory ICON Section **********************************************/
            -->
            <div class="col-lg-2" ng-if="!supercategorySetTo" ng-repeat="supercategory in supercategories"  ng-mouseenter="hover(supercategory)" ng-mouseleave="clearHover()" ng-click="setSupercategory(supercategory)">
                <span class="ngMessage" ng-if="hovered == supercategory">{{supercategory.title}}</span>
                <img src="http://placehold.it/50/">
                {{supercategory.title}}
            </div>

        <!--
          *********************************** Category ICON Section **********************************************/
          -->

            <div ng-repeat="supercategory in supercategories" ng-if="!categorySetTo">
                <div class="col-lg-2" ng-repeat="category in supercategory.categories" ng-if="supercategorySetTo == supercategory" ng-click="setCategory(category)"  ng-mouseenter="hover(category)" ng-mouseleave="clearHover()">
                    <span  class="ngMessage" ng-if="hovered == category">{{category.title}}</span>
                    <img src="http://placehold.it/50/">
                    {{category.title}}
                </div>
            </div>






        </div>

<!--
****************************************** END DIRECTORY MODULE SECTION********************************************
-->
    </div>


    <!--
         *********************************** DIRECTORY SKILL INDEX Section **********************************************/
         -->

    <div class="row" ng-if="categorySetTo">
        <br/><br/><br/><br/>
        <div id="directoryModuleSkillIndex" class="skillIndex" ng-repeat="supercategory in supercategories">
            <div ng-repeat="category in supercategory.categories">
                <div class="col-md-4 col-lg-offset-4" ng-repeat="skill in category.skills" ng-if="categorySetTo == category"  ng-click="setSkill(skill)">
                    <span  class="ngMessage" ng-if="hovered == skill">{{skill.title}}</span>
                    <img src="http://placehold.it/200/">
                    <p>{{skill.title}}</p>
                </div>
            </div>
        </div>
    </div>



    <br/><br/><br/>






<!--
******************************************CAROUSEL SECTION *************************************************************
-->
    <div id="carouselModule" class="col-lg-12" ng-if="!tagQuery && !selectedCategory && !categorySetTo">

        <div >
            <div class="carousel slide col-lg-12" id="myCarousel">
                <div class="carousel-inner ">

                    <div class="item active">
                        <div class="col-md-4 col-lg-offset-4"><a href="#"><img src="http://placehold.it/800/bbbbbb/" class="img-responsive">Need something here.</a></div>
                    </div>

                    <div ng-repeat="category in categories" class="item">
                        <div class="col-md-4 col-lg-offset-4"><a href="#"><img src="http://placehold.it/500/bbbbbb/" class="img-responsive">{{category.title}}</a></div>
                    </div>

                </div>

                <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
            </div>
        </div>

    </div>

<!--
******************************************/END CAROUSEL SECTION *************************************************************
-->

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

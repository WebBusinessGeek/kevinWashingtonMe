<div ng-controller="skillController">


    <div id="textSearchAndDirectorySearchGroup" class="row text-center">

        <!--
        ******************************************TEXT SEARCH MODULE SECTION********************************************
        -->
        <div id="textSearch" class="col-lg-6">

            <div id="tagSearchText">
                <h4>Know what skills your looking for?</h4>
            </div>
            <div id="tagSearchBar">
                <input type="text" ng-model="textQuery" ng-keypress="clearSupercategory()" class="form-control input-lg" placeholder="Start typing...">
            </div>
        </div>
        <!--
        ******************************************End TEXT SEARCH MODULE SECTION********************************************
        -->

        <!--
        ******************************************DIRECTORY MODULE SECTION********************************************
        -->
        <div id="directorySearch" class="col-lg-6">
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



    <div id="resultsSection">
        <!--
        *********************************** TEXT SEARCH RESULTS Section **********************************************/
        -->

        <div class="row" ng-if="textQuery">
            <br/><br/><br/>
            <h4> <em>{{filteredSkills.length}}</em> Skills related to <em>{{textQuery}}</em></h4>
            <div class="skillIndex">
                <div class="col-md-4 col-lg-offset-3" ng-repeat="skill in filteredSkills = (skills |filter:textQuery)"  ng-click="setSkill(skill)">
                    <span  class="ngMessage" ng-if="hovered == skill">{{skill.title}}</span>
                    <img src="http://placehold.it/450x250/">
                    <p>{{skill.title}}</p>
                    <p>{{skill.tools.length}} tools</p>
                </div>
            </div>
        </div>
        <!--
        *********************************** END TEXT SEARCH RESULTS Section **********************************************/
        -->


        <!--
        *********************************** CAROUSEL AND DIRECTORY RESULTS SECTION **********************************************/
        -->

        <div class="row" ng-if="categorySetTo">
            <br/><br/><br/>
            <h4> <em>{{categorySetTo.skills.length}}</em> skills that match <em>{{categorySetTo.title}}</em></h4>
            <div class="skillIndex" ng-if="categorySetTo">
                <div class="col-md-4 col-lg-offset-3" ng-repeat="skill in categorySetTo.skills"  ng-click="setSkill(skill)">
                    <span  class="ngMessage" ng-if="hovered == skill">{{skill.title}}</span>
                    <img src="http://placehold.it/450x250/">
                    <p>{{skill.title}}</p>
                    <p>{{skill.tools.length}} tools</p>
                </div>
            </div>
        </div>
        <!--
        *********************************** END CAROUSEL AND DIRECTORY RESULTS SECTION **********************************************/
        -->
    </div>

    <br/><br/><br/>

    <!--
    ******************************************CAROUSEL SEARCH SECTION *************************************************************
    -->
    <div id="carouselModule" class="col-lg-12" ng-if="!textQuery && !selectedCategory && !categorySetTo">

        <div >
            <div class="carousel slide col-lg-12" id="myCarousel">
                <div class="carousel-inner ">

                    <div class="item active">
                        <div class="col-md-4 col-lg-offset-4"><a href="#"><img src="http://placehold.it/800/bbbbbb/" class="img-responsive">Need something here.</a></div>
                    </div>

                    <div ng-repeat="category in categories" class="item" ng-click="setCategory(category)">
                        <div class="col-md-4 col-lg-offset-4"><a href="#"><img src="http://placehold.it/500/bbbbbb/" class="img-responsive">{{category.title}}</a></div>
                    </div>

                </div>

                <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
            </div>
        </div>

    </div>

    <!--
    ******************************************/END CAROUSEL SEARCH SECTION *************************************************************
    -->


</div>

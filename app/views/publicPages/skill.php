
<div ng-controller="skillController">

    <h1 class="text-center header">3 quick ways to review my skills.</h1><br/>
    <h4 class="text-center subheader">Search skills with text. Browse the directory. Or click a category in the carousel below. </h4>


    <div id="textSearchAndDirectorySearchGroup" class="row text-center">

        <div class="col-lg-1">

        </div>

        <!--
        ******************************************TEXT SEARCH MODULE SECTION********************************************
        -->
        <div id="textSearch" class="col-lg-4">

            <div id="textSearchText">
                <h4>Search a specific skill.</h4>
            </div>
            <div id="textSearchBar">
                <input type="text" ng-model="textQuery" ng-keypress="clearSupercategory()" class="form-control input-lg" placeholder="Start typing...">
            </div>

        </div>
        <!--
        ******************************************End TEXT SEARCH MODULE SECTION********************************************
        -->

        <div class="col-lg-2">

        </div>
        <!--
        ******************************************DIRECTORY MODULE SECTION********************************************
        -->
        <div id="directorySearch" class="col-lg-4 text-center">
            <div id="categorySearchHeading" ng-if="!supercategorySetTo">
                <h4>Skills Directory</h4>
            </div>

            <!--
            *********************************** SuperCategory ICON Section **********************************************/
            -->
            <div class="col-lg-1">

            </div>
            <div class="col-lg-2 text-center" ng-if="!supercategorySetTo" ng-repeat="supercategory in supercategories"  ng-mouseenter="hover(supercategory)" ng-mouseleave="clearHover()" ng-click="setSupercategory(supercategory)">
                <span class="ngMessage" ng-if="hovered == supercategory">{{supercategory.title}}</span>
                <img src="http://placehold.it/50/ffffff">
            </div>

            <!--
              *********************************** Category ICON Section **********************************************/
            -->

            <p class="helpText" ng-if="supercategorySetTo && !categorySetTo">Now let's narrow <a class="btn btn-primary btn-text-btn" ng-click="clearSupercategory()"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>{{supercategorySetTo.title}}</a> skills down a bit...</p>
            <p class="helpText" ng-if="supercategorySetTo && categorySetTo">Currently viewing <a class="btn btn-primary btn-text-btn" ng-click="clearCategory()"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>{{categorySetTo.title}}</a> skills below.</p>

            <div ng-repeat="supercategory in supercategories">
                <div class="col-lg-2" ng-repeat="category in supercategory.categories" ng-if="supercategorySetTo == supercategory" ng-click="setCategory(category)"  ng-mouseenter="hover(category)" ng-mouseleave="clearHover()">
                    <span  class="ngMessage" ng-if="hovered == category">{{category.title}}</span>
                    <img src="http://placehold.it/50/ffffff">
                </div>
            </div>


        </div>
        <!--
        ****************************************** END DIRECTORY MODULE SECTION********************************************
        -->
    </div>



    <div id="resultsSection" ng-if="textQuery || categorySetTo">
        <!--
        *********************************** TEXT SEARCH RESULTS Section **********************************************/
        -->

        <div class="row" ng-if="textQuery">
            <br/><br/><br/>
            <h4> <em>{{filteredSkills.length}}</em> Skills related to <em>'{{textQuery}}'</em></h4>
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
            <h4> <em>{{categorySetTo.skills.length}}</em> skills in <a class="btn btn-primary btn-text-btn btn-lg" ng-click="clearCategory()"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>{{categorySetTo.title}}</a></h4>
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
        <div class="col-lg-1">

        </div>
        <div>
            <div class="carousel slide col-lg-10 " id="myCarousel">

                <div id="carouselModuleText" class="text-center">
                    <h4>Pick a Category.</h4>
                </div>

                <div class="carousel-inner ">

                    <div class="item active">
                        <div class="col-md-6 col-lg-offset-3"><a href="#"><img src="http://placehold.it/800/bbbbbb/" class="img-responsive">Need something here.</a></div>
                    </div>

                    <div ng-repeat="category in categories" class="item" ng-click="carouselSetCategory(category)">
                        <div class="col-md-6 col-lg-offset-3">
                            <span class="propertyName">Category: </span> <span class="propertyValue">{{category.title}}</span> |
                            <span class="propertyName">Skills in category: </span> <span class="propertyValue">{{category.skills.length}}</span>

                            <a href="#">
                                <img src="http://placehold.it/500/bbbbbb/" class="img-responsive">
                            </a>
                        </div>
                    </div>

                </div>

                <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>

    </div>

    <!--
    ******************************************/END CAROUSEL SEARCH SECTION *************************************************************
    -->


</div>

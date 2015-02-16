
<div ng-controller="skillController">

    <h1 class="text-center header">Review my skills in 3 quick ways below.</h1><br/>
    <h4 class="text-center subheader">Search for specific skills in the search bar, click the icons in skills directory, or choose a category in the slider below. Your choice! </h4>
    <br/>


    <img ng-if="!textQuery" id="moduleHelper1" src="/assets/moduleHelper1.png">
    <img ng-if="!supercategorySetTo" id="moduleHelper2" src="/assets/moduleHelper2.png">
    <img ng-if="!categorySetTo && !textQuery" id="moduleHelper3" src="/assets/moduleHelper3.png">

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
                <input type="text" ng-model="textQuery" ng-keypress="clearSupercategory()" class="form-control input-lg input-super" placeholder="Start typing...">
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
                <img ng-src="/assets/supercategoryIcons/KWICON{{getImageNameFromTitle(supercategory.title)}}.png">
            </div>

            <!--
              *********************************** Category ICON Section **********************************************/
            -->

            <p class="helpText" ng-if="supercategorySetTo && !categorySetTo">Now let's narrow <a class="btn btn-primary btn-text-btn" ng-click="clearSupercategory()"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>{{supercategorySetTo.title}}</a> skills down a bit...</p>
            <p class="helpText" ng-if="supercategorySetTo && categorySetTo">Currently viewing <a class="btn btn-primary btn-text-btn" ng-click="clearCategory()"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>{{categorySetTo.title}}</a> skills below.</p>

            <div ng-repeat="supercategory in supercategories">
                <div class="col-lg-2" ng-repeat="category in supercategory.categories" ng-if="supercategorySetTo == supercategory" ng-click="directorySetCategory(category)"  ng-mouseenter="hover(category)" ng-mouseleave="clearHover()">
                    <span  class="ngMessage" ng-if="hovered == category">{{category.title}}</span>
                    <img ng-src="/assets/categoryIcons/5050/KWICON{{getImageNameFromTitle(category.title)}}.png">
                </div>
            </div>


        </div>
        <!--
        ****************************************** END DIRECTORY MODULE SECTION********************************************
        -->
    </div>



    <div id="resultsSection" ng-if="(textQuery || categorySetTo) && !skillSetTo">
        <!--
        *********************************** TEXT SEARCH RESULTS Section **********************************************/
        -->

        <div class="row" ng-if="textQuery">
            <br/><br/><br/>
            <div class="col-md-4">
                <h4> <em>{{filteredSkills.length}}</em> Skills related to <em>'{{textQuery}}'</em></h4>
            </div>
            <div class="skillIndex">
                <div class="col-md-4 skillIndexItem"  ng-repeat="skill in filteredSkills = (skills |filter:textQuery)" ng-click="setSkill(skill)">
                    <div class="row">
                        <div class="col-md-2">
                            <img ng-src="/assets/categoryIcons/150150/KWICON{{getImageNameFromTitle(skill.category.title)}}.png">
                        </div>
                        <div class="col-md-7 col-md-offset-2">
                            <p class="propertyName  skillIndexHeading" ng-class="{'skillIndexHeadingL':skill.title.length > 20, 'skillIndexHeadingXL':skill.title.length >= 24, 'skillIndexHeadingXXL': skill.title.length >= 28}">{{skill.title}}</p>
                        </div>
                        <div class="col-md-7 col-md-offset-2">
                            <p class="propertyName">Related tools I'm familiar with: <span class="propertyValue">{{skill.tools.length}}</span></p>
                            <a class="btn btn-primary btn-text-btn pull-right">View tools</a>
                        </div>
                        <div class="col-md-7 col-md-offset-2">
                            <p class="propertyName">Thinking out loud: <span class="propertyValue">{{skill.article | limitTo:92}}. . .</span></p>
                            <a class="btn btn-primary btn-text-btn pull-right">View more</a>
                        </div>
                    </div>
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
            <br/><br/>
            <div class="col-md-4">
                <h4> <em>{{categorySetTo.skills.length}}</em> skills in <a class="btn btn-primary btn-text-btn btn-lg" ng-click="clearCategory()"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>{{categorySetTo.title}}</a></h4>
            </div>
            <div class="skillIndex" ng-if="categorySetTo">
                <div class="col-md-4 skillIndexItem" ng-repeat="skill in categorySetTo.skills"  ng-click="setSkill(skill)">
                    <div class="row">
                        <div class="col-md-2">
                            <img ng-src="/assets/categoryIcons/150150/KWICON{{getImageNameFromTitle(categorySetTo.title)}}.png">
                        </div>
                        <div class="col-md-7 col-md-offset-2">
                            <p class="propertyName  skillIndexHeading" ng-class="{'skillIndexHeadingL':skill.title.length > 20, 'skillIndexHeadingXL':skill.title.length >= 24, 'skillIndexHeadingXXL': skill.title.length >= 28}">{{skill.title}}</p>
                        </div>
                        <div class="col-md-7 col-md-offset-2">
                            <p class="propertyName">Related tools I'm familiar with: <span class="propertyValue">{{skill.tools.length}}</span></p>
                            <a class="btn btn-primary btn-text-btn pull-right">View tools</a>
                        </div>
                        <div class="col-md-7 col-md-offset-2">
                            <p class="propertyName">Thinking out loud: <span class="propertyValue">{{skill.article | limitTo:92}}. . .</span></p>
                            <a class="btn btn-primary btn-text-btn pull-right">View more</a>
                        </div>
                    </div>
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
                                <img ng-src="/assets/categoryCarouselImages/KWIMAGE{{getImageNameFromTitle(category.title)}}.png" class="img-responsive">
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



    <!--
   ******************************************SKILL SHOW SECTION *************************************************************
   -->

    <div id="skillShowSection" ng-if="skillSetTo">


        <br/><br/>
        <div class="row">

            <div class="col-md-3">
                <h4><span>Currently viewing</span> <a class="btn btn-primary btn-text-btn btn-lg" ng-click="clearSkill()"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>{{skillSetTo.title}}</a></h4>
            </div>

            <div id="skillArticleSection" class="col-md-6 skillArticle">

                <div id="skillArticle" class="text-center">
                    <h4>{{skillSetTo.title}}</h4>
                    <img ng-src="/assets/categoryIcons/8080/KWICON{{getImageNameFromTitle(skillSetTo.category.title)}}.png">
                    <p class="bodyText">{{skillSetTo.article}}</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="skillShowHeading text-center">
                   {{skillSetTo.tools.length}} tools I have used for {{skillSetTo.title}}.
                </div>

                <div id="skillToolsSection">
                    <div class="skillTool text-center" ng-repeat="tool in skillSetTo.tools">
                        <h4 class="skillToolHeading">{{tool.title}}</h4>
                        <img src="http://placehold.it/80/#555555">
                    </div>
                </div>
            </div>



        </div>


    </div>

    <!--
    ******************************************/END SKILL SHOW SECTION *************************************************************
    -->

</div>

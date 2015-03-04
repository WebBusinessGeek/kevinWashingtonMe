
<div ng-controller="skillController">



    <div class="col-sm-12 col-md-12 col-lg-12 text-center" ng-if="loading" >
        <img class="loader" src="/assets/preLoader.gif"><img class="loader" src="/assets/preLoader.gif"><img class="loader" src="/assets/preLoader.gif">
        <img class="loader" src="/assets/preLoader.gif"><img class="loader" src="/assets/preLoader.gif">
        <p>Loading</p>
    </div>


    <div ng-show="!loading">

        <h1 class="text-center header">Choose 1 of 3 ways to review my skills below.</h1><br/>
        <h4 class="text-center subheader"> Search for specific skills in the <b class="bolder">Skill Finder</b>, click around in the <b class="bolder">Skill Directory</b>, or choose a category from the <b class="bolder">Skill Slider</b>. </h4>
        <br/>


        <img ng-if="!textQuery" id="moduleHelper1" class="moduleHelpers" src="/assets/moduleHelper1.png">
        <img ng-if="!supercategorySetTo" id="moduleHelper2" class="moduleHelpers" src="/assets/moduleHelper2.png">
        <img ng-if="!categorySetTo && !textQuery" id="moduleHelper3" class="moduleHelpers" src="/assets/moduleHelper3.png">

        <div id="textSearchAndDirectorySearchGroup" class="row text-center">

            <div class="col-lg-1">

            </div>

            <!--
            ******************************************TEXT SEARCH MODULE SECTION********************************************
            -->
            <div id="textSearch" class="col-sm-12 col-md-12 col-lg-4">

                <div id="textSearchText">
                    <h4>Skill Finder</h4>
                    <p class="helpText2">(Search skills by typing below)</p>
                </div>
                <div id="textSearchBar">
                    <input type="text" ng-model="textQuery" ng-keypress="clearSupercategory()" class="form-control input-lg input-super lighterText" placeholder="example - 'marketing'">
                </div>

            </div>
            <!--
            ******************************************End TEXT SEARCH MODULE SECTION********************************************
            -->

            <div class="col-sm-12 col-md-1 col-lg-2">

            </div>
            <!--
            ******************************************DIRECTORY MODULE SECTION********************************************
            -->
            <div id="directorySearch" class="col-sm-12 col-md-12 col-lg-4 text-center">
                <div id="categorySearchHeading" ng-if="!supercategorySetTo">
                    <h4>Skill Directory</h4>
                    <p class="helpText2">(Start by clicking icons)</p>
                </div>

                <!--
                *********************************** SuperCategory ICON Section **********************************************/
                -->
                <div class="col-sm-1 col-md-1 col-lg-1">

                </div>
                <div class="col-sm-2 col-md-2 col-lg-2 text-center" ng-if="!supercategorySetTo" ng-repeat="supercategory in supercategories"  ng-click="setSupercategory(supercategory)">
                    <img tooltip title="{{supercategory.title}}" data-toggle="tooltip" ng-src="/assets/supercategoryIcons/KWICON{{getImageNameFromTitle(supercategory.title)}}.png">
                </div>

                <!--
                  *********************************** Category ICON Section **********************************************/
                -->

                <p class="helpText" ng-if="supercategorySetTo && !categorySetTo">Now let's narrow my <a class="btn btn-primary btn-text-btn" ng-click="clearSupercategory()"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>{{supercategorySetTo.title}}</a> skills down a bit...</p>
                <p class="helpText" ng-if="supercategorySetTo && categorySetTo">Currently viewing <a class="btn btn-primary btn-text-btn" ng-click="clearCategory()"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>{{categorySetTo.title}}</a> skills below.</p>

                <div ng-repeat="supercategory in supercategories">
                    <div class="col-sm-2 col-md-2 col-lg-2" ng-repeat="category in supercategory.categories" ng-if="supercategorySetTo == supercategory" ng-click="directorySetCategory(category)">
                        <img tooltip title="{{category.title}}" data-toggle="tooltip" ng-src="/assets/categoryIcons/5050/KWICON{{getImageNameFromTitle(category.title)}}.png"  ng-class="{'activeIcon': categorySetTo == category}">
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
                                <div ng-if="skill.article.length > 1">
                                    <p class="propertyName">Thinking out loud: <span class="propertyValue">{{skill.article | limitTo:92}}. . .</span></p>
                                    <a class="btn btn-primary btn-text-btn pull-right">View more</a>
                                </div>
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

        <div id="carouselModule" class="col-sm-12 col-md-12 col-lg-12" ng-if="!textQuery && !selectedCategory && !categorySetTo">
            <div class="col-lg-1">

            </div>
            <div>
                <div class="carousel slide col-sm-12 col-md-12 col-lg-10 " id="myCarousel">

                    <div id="carouselModuleText" class="text-center">
                        <h4>Skill Slider</h4>
                        <p class="helpText2">(Pick a category)</p>

                    </div>

                    <div class="carousel-inner ">

                        <div class="item active">
                            <div class="col-md-6 col-lg-offset-3">
                                <a href="#"><img src="/assets/categoryCarouselImages/KWIMAGEdirection.png" class="img-responsive"></a></div>
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
                        <p ng-if='skillSetTo.article.length > 1' class="bodyText">{{skillSetTo.article}}</p>
                        <p ng-if='skillSetTo.article.length < 1' class="bodyText">Haven't been inspired to think out loud on {{skillSetTo.title}} yet. Please check back another time.</p>

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="skillShowHeading text-center">
                        {{skillSetTo.tools.length}} tools I have used for {{skillSetTo.title}}.
                    </div>

                    <div id="skillToolsSection">
                        <div class="skillTool text-center" ng-repeat="tool in skillSetTo.tools">
                            <h4 class="skillToolHeading">{{tool.title}}</h4>
                            <img src="/assets/KWICONdefaultTool.png">
                        </div>
                    </div>
                </div>



            </div>


        </div>

        <!--
        ******************************************/END SKILL SHOW SECTION *************************************************************
        -->
    </div>


</div>

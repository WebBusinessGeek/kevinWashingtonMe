<div ng-controller="skillController">
    <div id="mainSearchGroup" class="well col-lg-4 text-center">

        <div id="tagSearchGroup">

            <div id="tagSearchText">
                <h4>Know what skills your looking for?</h4>
            </div>
            <div id="tagSearchBar">
                <input type="text" class="form-control input-lg" placeholder="Start typing...">
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


    <div id="tagResultsSection" class="col-lg-7 col-lg-offset-1 well">
        <div id="tagResultsIndex" class="text-center">

<!--            offset row-->

<!--            col-md-3 well for first item-->
<!--            col-md-3 col-sm-offset-1 well for second and third item-->
<!--            new row if three items are reached-->





    <div ng-repeat="tag in tags">
        <h3>{{tag.title}}</h3>
        <div ng-repeat="skill in tag.skills">

            <div class="row col-sm-offset-1" ng-if="($index + 1) == 1 || (($index +1) -1) % 3 == 0 ">
                <div class="col-md-3 well">
                {{skill.title}} 1st or AFTER 3rd.
                </div>
            </div ng-if="$last ||($index +1) % 3 == 0">

            <div class="col-md-3 well col-md-offset-1" ng-if="($index +1) - 1 % 3 != 0">
                {{skill.title}} not the 1st.
            </div>
            </div ng-if="$last ||($index +1) % 3 == 0">
        </div>
    </div>




<!---->
<!---->
<!---->
<!--<!---->
<!--            <div class="row col-sm-offset-1">-->
<!--                <div class="col-md-3 well">-->
<!--<!--                    should be before first item-->
<!--                    <h4>Title</h4>-->
<!--                    <img src="http://placehold.it/100x120">-->
<!--                    <p>Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.</p>-->
<!--                    <button class="btn btn-success">See more</button>-->
<!--                </div>-->
<!---->
<!--                <div  class="col-md-3 col-md-offset-1 well">-->
<!---->
<!--                    <h4>Title</h4>-->
<!--                    <img src="http://placehold.it/100x120">-->
<!--                    <p>Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.</p>-->
<!--                    <button class="btn btn-success">See more</button>-->
<!---->
<!--                </div>-->
<!---->
<!--                <div  class="col-md-3 col-sm-offset-1 well">-->
<!--                    <h4>Title</h4>-->
<!--                    <img src="http://placehold.it/100x120">-->
<!--                    <p>Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.</p>-->
<!--                    <button class="btn btn-success">See more</button>-->
<!--                </div>-->
<!---->
<!--            </div>-->

<!---->
<!---->
<!--            <div class="row col-sm-offset-1">-->
<!--                <div class="col-md-3 well">-->
<!--                    <h4>Title</h4>-->
<!--                    <img src="http://placehold.it/100x120">-->
<!--                    <p>Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.</p>-->
<!--                    <button class="btn btn-success">See more</button>-->
<!--                </div>-->
<!--                <div  class="col-md-3 col-sm-offset-1 well">-->
<!--                    <h4>Title</h4>-->
<!--                    <img src="http://placehold.it/100x120">-->
<!--                    <p>Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.</p>-->
<!--                    <button class="btn btn-success">See more</button>-->
<!--                </div>-->
<!--                <div  class="col-md-3 col-sm-offset-1 well">-->
<!--                    <h4>Title</h4>-->
<!--                    <img src="http://placehold.it/100x120">-->
<!--                    <p>Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.</p>-->
<!--                    <button class="btn btn-success">See more</button>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->

<!--        <br/><br/>-->
<!--        <div id="tagResultsShow" class="text-center row">-->
<!---->
<!--            <div id="showDefinition" class="col-md-4 well">-->
<!--                <h4>What is Skill?</h4>-->
<!--                <p>Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.</p>-->
<!--            </div>-->
<!---->
<!--            <div id="showShortArticle" class="col-sm-7 col-md-offset-1 well">-->
<!--                <h4>Skill in my own words.</h4>-->
<!--                <img src="http://placehold.it/100x100">-->
<!--                <p>Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.</p>-->
<!--                <p>Chupa chups unerdwear.com liquorice tiramisu marshmallow marzipan jelly.</p>-->
<!--            </div>-->
<!---->
<!--            <div id="showTools" class="col-sm-4 well">-->
<!--                <h4>Related Tools</h4>-->
<!--                <div id="toolsList" style="max-height:200px; overflow:auto;">-->
<!--                    <h5>Tool Name</h5>-->
<!--                    <img src="http://placehold.it/100x100">-->
<!--                    <h5>Tool Name</h5>-->
<!--                    <img src="http://placehold.it/100x100">-->
<!--                    <h5>Tool Name</h5>-->
<!--                    <img src="http://placehold.it/100x100">-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!---->
<!---->
<!--        </div>-->


<!--    </div>-->

</div>

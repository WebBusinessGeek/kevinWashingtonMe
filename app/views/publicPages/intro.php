<div ng-controller="introController">

    <div class="row text-center">

        <div id="introBackground" class="col-lg-12">
            <div id="introMainImage" ng-mouseenter="changePic()" ng-mouseleave="changePic()">
                <div ng-show="currentPic == 'original'">
                    <img class="img-circle img-responsive center-block" src="/assets/selfPictures/typing_color.png">
                </div>
                <div ng-show="currentPic == 'funny'">
                    <img class="img-circle img-responsive center-block" src="/assets/selfPictures/thumbsUp_color.png">
                </div>
            </div>

            <div id="introContent">
                <div id="introContentHeader" class="row">
                    <p class="arvo">Hello, I'm Kevin</p>
                </div>
                <div id="introContentBody" class="row">
                    <p class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">I not only help businesses create innovative products and grow their customer base - i enjoy it.</p>

                    <p class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
                        Im a web developer with experience in core development technologies like PHP, Javascript, HTML, CSS, and SQL.
                        I have also worked extensively with these technologies in well known frameworks like Angular, Laravel, and Twitter Bootstrap.
                    </p>

                    <p class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
                        In addition to web development I have a great deal of tacit experience in customer acquisition.
                    </p>
                    <p class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
                        I understand the processes involved in architecting, building, and optimizing effective acquisition channels.
                        I also have experience funneling targets into these channels using a combination of traction mediums.
                    </p>
                    <p class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
                        These mediums often include well known methods like SEO, Social, and Paid Advertising.
                        However I don't neglect unique opportunities like Direct Interactions and Custom Web Applications.
                    </p>

                    <p class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
                        I'm always looking for opportunities to work with talented people on cool projects, learn something new, and get paid in the process.
                    </p>
                    <p class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
                        If you know of any such opportunities feel free to <a href="/connect">contact me</a>.
                    </p>
                </div>
                <div id="introContentSig">
                    <p class="arvo">
                        <span class="handWriting">Kevin Washington</span> <br/>
                        Product Craftsman & Customer Acquisition Artisan
                    </p>
                </div>

            </div>
        </div>

    </div>
</div>

    <div class="container">
        <h1>Hello, world!</h1>
        <input type="text" ng-model="name">{{name}}


        <div ng-controller="someController">
            <div ng-repeat="tag in tags">
                {{tag.title}}
            </div>
            <hr/>

            <div ng-repeat="tag in tagsFromCall">
                <h4>{{tag.title}}</h4>
                <p>{{tag.skill.title}}</p>
            </div><hr/>

        </div>

    </div>


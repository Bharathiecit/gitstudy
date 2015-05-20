<html>
<head>
<script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
</head>
<body>
<div ng-app = "app" ng-controller = "formcontroller">
<form novalidate name="studyform">
<table>
<tr><td>fname:</td>
<td><input type="text" ng-model="user.fname" name="fname" required=""></td></tr>
<div ng-show="studyform.$submitted || studyform.fname.$touched">
<div ng-show="studyform.fname.$error.required">please enter your first name</div>
</div>
<tr><td>lname</td>
<td><input type="text" ng-model="user.lname" name="lname" required=""></td></tr>
<div ng-show="studyform.$submitted || studyform.lname.$touched">
<div ng-show="studyform.lname.$error.required">please enter your last name</div>
</div>
<tr><td>email:</td>
<td><input type="email" ng-model="user.email" name="uemail" required=""></td></tr>
<div ng-show="studyform.$submitted || studyform.uemail.$touched">
<span ng-show="studyform.uemail.$error.required">please enter your email address</span>
<span ng-show="studyform.uemail.$error.email">please enter valid email adress</span>
</div>
<tr><td><input type="button" ng-click="reset()" value="Reset"></td></tr>
<tr><td><input type="submit" ng-disabled="studyform.$invalid" ng-click="update(user)" value="update"></td></tr>
</table>
</form>
<p>form = {{user}}</p>
<p>updated value = {{value}}</p>
</div>
<script>
var app=angular.module("app",[]);
app.controller('formcontroller', function($scope,$http){
		$scope.value = {};
		 

		$scope.update = function(user){
			$scope.value = angular.copy(user);
			$http.post("http://localhost/Bharathi/server.php", {data:$scope.user});
		};

		$scope.reset = function(){
			$scope.user =  angular.copy($scope.value);
		};

		$scope.reset();
});
</script>
</body>
</html>

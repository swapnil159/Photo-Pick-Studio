var app=angular.module('login',[]);
app.controller('login_dash',function($scope,$http){
  $scope.user={};
  $scope.in=function(){
    var config={
      method : 'POST',
      url : 'login.php',
      data : {
          'Username' : $scope.user.username,
          'Password' : $scope.user.password
      }
    }
    var request = $http(config);
    request.then(function(response){
      var temp=response.data;
      alert(response.data);
      var str="Success";
      if(temp===str){
        location='dashboard.php';
      }
      else {
        alert('Either Username or Password is wrong.');
      }
    });
  }
});

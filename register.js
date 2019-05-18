var app=angular.module('registration',[]);
app.controller('reg',function($scope,$http){
  $scope.msg="WELCOME"
  $scope.user={};
  $scope.send=function(){
    var config={
      method : 'POST',
      url : 'upd.php',
      data : {
          'First_Name' : $scope.user.fname,
          'Last_Name' : $scope.user.lname,
          'Gender' : $scope.user.gender,
          'Email' : $scope.user.email,
          'Username' : $scope.user.username,
          'Password' : $scope.user.pass
      }
    }
    var request = $http(config);
    request.then(function(response){
      location='index.php';
    },function(error){
      alert('Something went wrong.Please try again');
    });
  }
});

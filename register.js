var app=angular.module('registration',[]);
app.controller('reg',function($scope,$http){
  $scope.msg="WELCOME"
  $scope.form={ First_Name : '' , Last_Name : '' , Gender : '' , Email : '' , Username : '' , Password : ''};
  $scope.send=function(){
    var config={
      method : 'POST';
      url : 'upd.php';
      data : {
          'First_Name' : $scope.form.fname,
          'Last_Name' : $scope.form.lname,
          'Gender' : $scope.form.gender,
          'Email' : $scope.form.email,
          'Username' : $scope.form.username,
          'Password' : $scope.form.pass
      }
    };
    var request = $http(config);
    request.then(function(response){
      $scope.msg=response.data;
    },function(error){
      $scope.msg=error.data;
    });
  };
});

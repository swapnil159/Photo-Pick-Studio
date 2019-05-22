var app=angular.module('forget',[]);

app.controller('pass',function($scope,$http){
  $scope.change=function(){
    var config={
      method : 'POST',
      url : 'pass_change.php',
      data : {
        'user' : $scope.user,
        'otp' : $scope.otp,
        'pass' : $scope.pass
      }
    }
    var request=$http(config);
    request.then(function(response){
      alert(response.data);
      var str="Password changed successfully";
      var temp=response.data;
      if(str===temp)
      {
        location='dashboard.php';
      }
    })
  }
});

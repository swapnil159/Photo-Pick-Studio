var app=angular.module('forget',[]);

app.controller('pass',function($scope,$http){
  $scope.change=function(){
    var config = {
      method : 'POST',
      url : 'forget_password.php',
      data : {
        'email' : $scope.mail
      }
    }
    var request=$http(config);
    request.then(function(response){
      location='forget2.php';
    });
  }
});

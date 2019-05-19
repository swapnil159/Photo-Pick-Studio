var app=angular.module('registration',[]);
app.controller('reg',function($scope,$http){
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
          'Password' : $scope.user.pass,
          'CPassword' : $scope.user.cpass
      }
    }
    var request = $http(config);
    request.then(function(response){
      alert(response.data);
      var temp=response.data;
      var res="You have been successfully registered";
      if(temp === res)
      {
        location='index.php';
      }
    },function(error){
      alert('Something went wrong.Please try again');
    });
  }
});

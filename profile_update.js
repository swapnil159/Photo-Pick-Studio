var app=angular.module('profile',[]);

app.controller('upd',function($scope,$http,$window){
  $scope.user={};
  var config={
    method: 'GET',
    url: 'profile_fetch.php'
  }
  var result=$http(config);
  result.then(function(response){
      $scope.user=response.data;
  })

  $scope.update=function(){
    var config={
      method : 'PUT',
      url : 'update.php',
      data : {
        'First_Name' : $scope.user.fname,
        'Last_Name' : $scope.user.lname,
        'Gender' : $scope.user.gender,
        'Email' : $scope.user.email,
        'Currpass' : $scope.user.currpass,
        'Newpass' : $scope.user.newpass,
        'Cnewpass' : $scope.user.cnewpass
      }
    }
    var request = $http(config);
    request.then(function(response){
        alert(response.data);
        location='profile_update.php';
    },function(error){
      alert('Something went wrong. Please try again');
    })
  }

  $scope.rem=function(){
    var config= {
      method : 'DELETE',
      url : 'dp_remove.php'
    }
    var res=$http(config);
    res.then(function(){
      location='profile_update.php';
    })
  }

  $scope.upload=function(){
    var fd = new FormData();
    var files = document.getElementById('file').files[0];
    fd.append('file',files);

    $http({
     method: 'post',
     url: 'updpic.php',
     data: fd,
     headers: {'Content-Type': undefined}
   }).then(function(response){
     alert(response.data);
     $window.location.reload();
   })
  }
});

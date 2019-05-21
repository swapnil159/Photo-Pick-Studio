var app=angular.module('profile',[]);

app.controller('display',function($scope,$http){
  var config={
    method : 'GET',
    url : 'disp_profile.php'
  }
  var request=$http(config);
  request.then(function(response){
    $scope.disp=response.data;
  });
});

app.controller('edel',function($scope,$http,$window){
  $scope.obj=$scope.x.name;
  $scope.edit=function(){
    $window.location.href='crtalbum.php?album='+$scope.obj;
  }

  $scope.delete=function(){
    var config = {
      method : 'DELETE',
      url : 'album_delete.php',
      data : {
        'Name' : $scope.x.name
      }
    }
    var request=$http(config);
    request.then(function(response){
      alert(response.data);
      $window.location.reload();
    })
  }
});

var app = angular.module('album',[]);

app.controller('create_album',function($scope,$http){
  $scope.user={};
  $scope.create=function(){
    var config={
      method : 'POST',
      url : 'alb.php',
      data : {
        'Album_Name' : $scope.user.Album_Name,
        'Album_Description' : $scope.user.album_description
      }
    }
    var request = $http(config);
    request.then(function(response){
      alert(response.data);
      location='create_album.php';
    });
  }
});

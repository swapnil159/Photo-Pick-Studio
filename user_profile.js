var app=angular.module('use',[]);

app.config(function($locationProvider){
  $locationProvider.html5Mode({enabled: true,requireBase: false});
});

app.controller('album',function($scope,$http,$location){
  var mn=$location.search().user;
  $scope.name=mn;
  var config={
    method : 'POST',
    url : 'get_user_profile.php',
    data : {
      'Name' : $scope.name
    }
  }
    var request=$http(config);
    request.then(function(response){
      $scope.prof=response.data;
    })
});

app.controller('likes',function($scope,$http,$location,$window){
  var mn=$location.search().user;
  $scope.name=mn;
  $scope.change=function(){
    var config={
      method : 'POST',
      url : 'Album_Likes.php',
      data : {
        'username' : $scope.name,
        'album' : $scope.x.album
      }
    }
    var request=$http(config);
    request.then(function(response){
      $window.location.reload();
    })
  }
});

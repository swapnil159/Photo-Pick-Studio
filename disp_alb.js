var app=angular.module('photo',[]);

app.config(function($locationProvider){
  $locationProvider.html5Mode({enabled: true,requireBase: false});
});

app.controller('pic',function($scope,$http,$location,$window){
  var temp=$location.search().user;
  var temp1=$location.search().alb;
  $scope.name=temp;
  $scope.album=temp1;
  var config= {
    method : 'POST',
    url : 'alb_fetch.php',
    data : {
      'User' : $scope.name,
      'Album' : $scope.album
    }
  }
  var request = $http(config);
  request.then(function(response){
    $scope.pic=response.data;
  })
});

app.controller('likes',function($scope,$http,$location,$window){
  var temp=$location.search().user;
  var temp1=$location.search().alb;
  $scope.name=temp;
  $scope.album=temp1;
  $scope.change=function(){
    var config= {
      method : 'POST',
      url : 'likes.php',
      data : {
        'Name' : $scope.name,
        'Album' : $scope.album,
        'Pic' : $scope.x.pic
      }
    }
    var request=$http(config);
    request.then(function(response){
      $window.location.reload();
    });
  }
});

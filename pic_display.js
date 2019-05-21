var app=angular.module('photo',[]);

app.config(function($locationProvider){
  $locationProvider.html5Mode({enabled: true,requireBase: false});
});

app.controller('disp',function($scope,$http,$location){
  var temp=$location.search().name;
  $scope.name=temp;
  var config={
      method : 'POST',
      url : 'album_fetch.php',
      data : {
        'Album_Name' : $scope.name
      }
  }
  var request=$http(config);
  request.then(function(response){
    $scope.pics=response.data;
  })
});

app.controller('del',function($scope,$http,$location,$window){
  var temp=$location.search().name;
  $scope.name=temp;
  $scope.delete=function(){
    $scope.obj=$scope.x.path;
    var config={
      method : 'POST',
      url : 'delete_pic.php',
      data : {
        'Path' : $scope.obj,
        'Album' : $scope.name,
        'Photo' : $scope.x.name
      }
    }
    var request=$http(config);
    request.then(function(response){
      $window.location.reload();
    },function(error){
      alert('Please try again');
    })
  }
});

var app=angular.module('photo',[]);

app.config(function($locationProvider){
  $locationProvider.html5Mode({enabled: true,requireBase: false});
});

app.controller('pic',function($scope,$http,$location){
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
    console.log(response.data);
    $scope.pic=response.data;
  })
});

var app=angular.module('profile',[]);

app.controller('display',function($scope,$http){
  var config={
    method : 'GET',
    url : 'disp_profile.php'
  }
  var request=$http(config);
  request.then(function(response){
    console.log(response.data);
    $scope.disp=response.data;
  })
});

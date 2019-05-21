var app=angular.module('feed',[]);

app.controller('newsfeed',function($scope,$http){
  var config={
    method : 'GET',
    url : 'feed_fetch.php'
  }
  var request = $http(config);
  request.then(function(response){
    $scope.feeds=response.data;
  })
});

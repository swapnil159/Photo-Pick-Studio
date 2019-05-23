var app=angular.module('view',[]);

app.config(function($locationProvider){
  $locationProvider.html5Mode({enabled: true,requireBase: false});
});

app.controller('display',function($scope,$location,$http){
  var temp=$location.search().user;
  var temp1=$location.search().album;
  var temp2=$location.search().pic;
  var config={
    method : 'POST',
    url : 'find_pic_priv.php',
    data : {
      'user' : temp,
      'album' : temp1,
      'photo' : temp2
    }
  }
  var request=$http(config);
  request.then(function(response){
    var str="private",s=response.data;
    if(s!==str)
    {
      $scope.user=temp;
      $scope.album=temp1;
      $scope.pic=temp2;
    }
    else {
      $scope.user="QwErTy";
      $scope.album=temp1;
      $scope.pic=temp2;
    }
  })
});

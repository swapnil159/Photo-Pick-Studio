var upload = angular.module('album',[]);

upload.controller('crtalbum',function($scope,$http){
  $scope.upload=function(){
    var fd = new FormData();
   angular.forEach($scope.uploadfiles,function(file){
     fd.append('file[]',file);
   });

   $http({
     method: 'post',
     url: 'crtalbum.php',
     data: fd,
     headers: {'Content-Type': undefined},
   }).then(function successCallback(response) {
     $scope.response = response.data;
   });
  }
});

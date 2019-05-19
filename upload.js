var upload= angular.module('upload', []);

upload.controller('upload_pic', ['$scope', '$http', function ($scope, $http) {
 $scope.upload = function(){

  var fd = new FormData();
  var files = document.getElementById('file').files[0];
  fd.append('file',files);

  $http({
   method: 'post',
   url: 'updpic.php',
   data: fd,
   headers: {'Content-Type': undefined},
  }).then(function(response) {
    alert(response.data);
    var temp=response.data;
    var res="Profile Pic successfully uploaded";
    if(temp===res){
      location='index.php';
    }
    else {
      alert('Something went wrong');
    }
  },function(error){
    alert('Please try again');
  });
 }

}]);

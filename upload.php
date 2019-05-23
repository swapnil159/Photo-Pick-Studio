<?php
  include 'conn.php';

  if(!$_SESSION['user'])
  {
    header('location: index.php');
  }
  $user=$_SESSION['user'];
?>

<!Doctype html>
<html>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="upload.js"></script>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div ng-app="upload" style="padding-top: 250px;">
      <form name="profile_pic" ng-controller="upload_pic">
      <table cellspacing="40" style="border: 1px solid black;box-shadow: 5px 10px #888888;" align="center">
        <caption><b>Upload Profile Picture<b></caption>
        <tr>
            <td><b>Profile Picture</b></td>
            <td><input id="file" name="file" type="file"></td>
        </tr>
        <tr>
          <td><button ng-click="skip()">SKIP</button></td>
          <td><button ng-click="upload()">UPLOAD</button></td>
        </tr>
      </table>
    </form>
    </div>
  </body>
</html>

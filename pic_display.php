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
    <title>PHOTOS</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="pic_display.js"></script>
    <link rel="stylesheet" href="style.css">
  </head>
  <bpdy>
    <div id="menu">
      <nav id="bar">
        <ul>
          <li><a href="dashboard.php">HOME</a>
          <li><a href="profile.php">VIEW PROFILE</a>
          <li><a href="album.php">CREATE ALBUM</a>
          <li><a href="profile_update.php">UPDATE PROFILE</a>
          <li><a href="log_out.php">LOG OUT</a>
        </ul>
      </nav>
    </div>
    <div ng-app="photo" ng-controller="disp" style="padding-top: 150px">
      <table align="center" cellspacing="40" style="border: 1px solid black;box-shadow: 5px 10px #888888;">
        <tr>
          <th colspan="2" align="right">Created on Date Time</th>
          <th>Description</th>
        </tr>
        <tr ng-repeat="x in pics" ng-controller="del">
          <td><img height="150" width="200" ng-src="{{x.path}}"></td>
          <td>{{x.dat}}</td>
          <td>{{x.desc}}</td>
          <td><button ng-click="delete()" ng-model="obj.name">DELETE</button></td>
        </tr>
      </table>
    </div>
  </body>
</html>

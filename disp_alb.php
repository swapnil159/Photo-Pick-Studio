<?php
  include 'conn.php';
  if($_SESSION['user'])
  {
    $user=$_SESSION['user'];
  }
?>
<!Doctype html>
<html>
  <head>
    <title>ALBUM</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="disp_alb.js"></script>
    <link rel="stylesheet" href="style.css">
  </head>
  <body >
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
    <div ng-app="photo" ng-controller="pic" style="padding-top: 150px;">
          <h1 align="center">{{album}}</h1>
        <table cellspacing="40" align="center" style="border: 1px solid black;box-shadow: 5px 10px #888888">
          <tr>
            <th colspan="2" align="right">Album Name</th>
            <th>Created On</th>
            <th>Photo description</th>
          </tr>
        <tr ng-repeat="x in pic" ng-controller="likes">
          <td><img height="100" width="100" ng-src="{{x.path}}" alt="No Images found"></td>
          <td>{{x.dat}}</td>
          <td>{{x.desc}}</td>
          <td><button ng-click="change()" ng-model="obj.name">{{x.state}}</button></td>
          <td><a style="text-decoration: none;" ng-href="view_pic.php?user={{name}}&album={{album}}&pic={{x.pic}}">VIEW</a></td>
        </tr>
      </table>
    </div>
  </body>
</html>

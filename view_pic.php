<?php
  include 'conn.php';

  $user=$_SESSION['user'];
?>
<!Doctype html>
<html>
  <head>
    <title>VIEW PIC</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="view_pic.js"></script>
  </head>
  <body ng-app="view" ng-controller="display">
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
    <img src="ALBUMS/{{user}}/{{album}}/{{pic}}" alt="You are not allowed to view this">
  </body>
</html>

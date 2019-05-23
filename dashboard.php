<?php
  include 'conn.php';

  $user=$_SESSION['user'];
?>

<!Doctype html>
<html>
  <head>
    <title>DASHBOARD</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="dashboard.js"></script>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
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
    <div>
    <table style="padding-top: 100px;" cellspacing="20">
      <tr>
        <td><img height="100" width="100" src=<?php echo "pp/".$user ?> alt="Not Found" onerror=this.src="def.jpg"></td>
        <td style="vertical-align:bottom;text-align:center;"><h2> <?php echo $user ?><h2></td>
      </tr>
    </table>
    <hr>
    <h1><center>USERS<center></h1>
    <div ng-app="feed" ng-controller="newsfeed" style="padding-top: 80px">
      <table cellspacing="40">
        <tr ng-repeat="x in feeds">
          <td><img ng-src="{{x.path}}" height="100" width="100" alt="No image found" onerror=this.src="def.jpg"></td>
          <td><a ng-href="user_profile.php?user={{x.name}}" style="text-decoration: none">{{x.name}}</a></td>
        </tr>
      </table>
    </div>
  </div>
  </body>
</html>

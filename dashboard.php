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
  </head>
  <body>
    <div id="menu">
      <nav id="bar">
        <ul>
          <li><a href="profile.php">VIEW PROFILE</a>
          <li><a href="album.php">CREATE ALBUM</a>
          <li><a href="profile_update.php">UPDATE PROFILE</a>
          <li><a href="#">LOG OUT</a>
        </ul>
      </nav>
    </div>
    <table>
      <tr>
        <td><img height="100" width="100" src=<?php echo "pp/".$user ?> alt="def.jpg"></td>
        <td><h2> <?php echo $user ?><h2></td>
      </tr>
    </table>
    <hr>
    <div ng-app="feed" ng-controller="newsfeed">
      <table>
        <tr ng-repeat="x in feeds">
          <td><img ng-src="{{x.path}}" height="100" width="100" alt="def.jpg"></td>
          <td><a ng-href="user_profile.php?user={{x.name}}">{{x.name}}</a></td>
        </tr>
      </table>
    </div>
  </body>
</html>

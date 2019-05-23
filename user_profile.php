<?php
  include 'conn.php';
  $user=$_SESSION['user'];
?>

<!Doctype html>
<html>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="user_profile.js"></script>
  </head>
  <body ng-app="use" ng-controller="album">
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
      <span>
      <img height="200" src=<?php echo "pp/".$user ?> alt="Not Found" onerror=this.src="def.jpg">
      <h2><?php echo $user ?></h2>
    </span>
      <table cellspacing="40" >
        <tr ng-repeat="x in prof" ng-controller="likes">
          <td><img ng-src={{x.path}} height="100" width="100"></td>
          <td><a ng-href="disp_alb.php?user={{name}}&alb={{x.album}}">{{x.album}}</a></td>
          <td><button ng-click="change()" ng-model="obj.name">{{x.state}}</button></td>
        </tr>
      </table>
    </div>
  </body>
</html>

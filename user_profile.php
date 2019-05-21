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
  <body ng-app="use">
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
    <div>
      <span>
      <img height="200" src=<?php echo "pp/".$user ?> alt="Not Found" onerror=this.src="def.jpg">
      <h2><?php echo $user ?></h2>
    </span>
      <table cellspacing="40"  ng-controller="album">
        <tr ng-repeat="x in prof">
          <td><img ng-src={{x.path}} height="100" width="100"></td>
          <td><a ng-href="disp_alb.php?user={{name}}&alb={{x.album}}">{{x.album}}</a></td>
        </tr>
      </table>
    </div>
  </body>
</html>

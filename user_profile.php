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
    <script src="user_profile.js"></script>
    <link rel="stylesheet" href="style.css">
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
      <div style="padding-top:100px;">
      <img height="200" src=<?php echo "pp/".$user ?> alt="Not Found" onerror=this.src="def.jpg">
      <h3><?php echo $user ?></h3>
      <table cellspacing="40" align="center" style="border: 1px solid black;box-shadow: 5px 10px #888888">
        <tr>
          <th colspan="2" align="right">Album Name</th>
          <th>Created On</th>
          <th>Album description</th>
        </tr>
        <tr ng-repeat="x in prof" ng-controller="likes">
          <td><img ng-src={{x.path}} height="100" width="100"></td>
          <td><a style="text-decoration: none;" ng-href="disp_alb.php?user={{name}}&alb={{x.album}}">{{x.album}}</a></td>
          <td>{{x.dat}}</td>
          <td>{{x.desc}}</td>
          <td><button ng-click="change()" ng-model="obj.name">{{x.state}}</button></td>
        </tr>
      </table>
    </div>
    </div>
  </body>
</html>

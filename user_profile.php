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
    <div>
      <table  ng-controller="album">
        <tr>
          <td><img height="200" ng-src="pp/{{name}}" alt="def.jpg"></td>
          <td><h2>{{name}}</h2></td>
        </tr>
        <tr ng-repeat="x in prof">
          <td><img ng-src={{x.path}} height="100" width="100"></td>
          <td><a ng-href="disp_alb.php?user={{name}}&alb={{x.album}}">{{x.album}}</a></td>
        </tr>
      </table>
    </div>
  </body>
</html>

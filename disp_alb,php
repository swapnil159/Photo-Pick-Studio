<?php
  include 'conn.php';
?>
<!Doctype html>
<html>
  <head>
    <title>ALBUM</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="disp_alb.js"></script>
  </head>
  <body >
    <div ng-app="photo" ng-controller="pic">
      <table >
        <tr>
          <h1>{{album}}</h1>
        </tr>
        <tr ng-repeat="x in pic">
          <td><img height="100" width="100" ng-src="{{x.path}}"></td>
          <td>Created on {{x.dat}}</td>
          <td>{{x.desc}}</td>
        </tr>
      </table>
    </div>
  </body>
</html>

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
    <img src="ALBUMS/{{user}}/{{album}}/{{pic}}" alt="You are not allowed to view this">
  </body>
</html>

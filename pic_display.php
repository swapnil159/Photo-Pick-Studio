<!Doctype html>
<html>
  <head>
    <title>PHOTOS</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="pic_display.js"></script>
  </head>
  <bpdy>
    <div id="menu">
      <nav id="bar">
        <ul>
          <li><a href="dashboard.php">HOME</a>
          <li><a href="profile.php">VIEW PROFILE</a>
          <li><a href="album.php">CREATE ALBUM</a>
          <li><a href="profile_update.php">UPDATE PROFILE</a>
          <li><a href="#">LOG OUT</a>
        </ul>
      </nav>
    </div>
    <div ng-app="photo" ng-controller="disp">
      <table>
        <tr ng-repeat="x in pics" ng-controller="del">
          <td><img height="100" width="100" ng-src="{{x.path}}"></td>
          <td>Created On {{x.dat}}</td>
          <td>{{x.desc}}</td>
          <td><button ng-click="delete()" ng-model="obj.name">DELETE</button></td>
        </tr>
      </table>
    </div>
  </body>
</html>

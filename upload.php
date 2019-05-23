<!Doctype html>
<html>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="upload.js"></script>
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
    <div ng-app="upload" style="padding-top: 250px;">
      <form name="profile_pic" ng-controller="upload_pic">
      <table cellspacing="40" style="border: 1px solid black;box-shadow: 5px 10px #888888;" align="center">
        <caption><b>Upload Profile Picture<b></caption>
        <tr>
            <td><b>Profile Picture</b></td>
            <td><input id="file" name="file" type="file"></td>
        </tr>
        <tr>
          <td><button ng-click="skip()">SKIP</button></td>
          <td><button ng-click="upload()">UPLOAD</button></td>
        </tr>
      </table>
    </form>
    </div>
  </body>
</html>

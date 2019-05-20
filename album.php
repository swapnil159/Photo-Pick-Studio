<!Doctype html>
<html>
  <head>
    <title>ALBUM</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="album.js"></script>
  </head>
  <body ng-app="album">
    <div id="menu">
      <nav id="bar">
        <ul>
          <li><a href="create_album.php">CREATE ALBUM</a>
          <li><a href="profile_update.php">UPDATE PROFILE</a>
          <li><a href="#">LOG OUT</a>
        </ul>
      </nav>
    </div>
    <div>
      <form name="CreateAlbum" ng-controller="create_album" ng-submit="create()">
        <table cellspacing="40">
          <tr>
            <td><b>Album Name*:</b></td>
            <td><input type="text" name="albumname" ng-model="user.Album_Name" size="30" placeholder="Enter the Album Name" required></td>
          </tr>
          <tr>
            <td><b>Album Description:</b></td>
            <td><textarea rows="5" cols="50" ng-model="user.album_description"></textarea>
          </tr>
          <tr>
            <td colspan="3" align="center"><button type="submit">CREATE</button></td>
          </tr>
        </table>
      </form>
    </div>
  </body>
</html>

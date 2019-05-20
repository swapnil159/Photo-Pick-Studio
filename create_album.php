<!Doctype html>
<html>
  <head>
    <title>CREATE ALBUM</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="create_album.js"></script>
  </head>
  <body ng-app="album">
    <div id="menu">
      <nav id="bar">
        <ul>
          <li><a href="album.php">CREATE ALBUM</a>
          <li><a href="profile_update.php">UPDATE PROFILE</a>
          <li><a href="#">LOG OUT</a>
        </ul>
      </nav>
    </div>
    <div>
      <form ng-controller="crtalbum">
        <table>
          <tr>
            <td><input type='file' multiple ng-file='uploadfiles'></td>
            <td><input type='button' value='Upload' id='upload' ng-click='upload()'></td>
          </tr>
        </table>
      </form>
    </div>
  </body>
</html>

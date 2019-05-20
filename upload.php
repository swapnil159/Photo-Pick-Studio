<!Doctype html>
<html>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="upload.js"></script>
  </head>
  <body>
    <div ng-app="upload">
      <form name="profile_pic" ng-controller="upload_pic">
      <table>
        <caption>Upload Profile Picture</caption>
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

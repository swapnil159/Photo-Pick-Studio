<!DOCTYPE html>
<html>
  <head>
    <title>FORGOT PASSWORD</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="forget2.js"></script>
  </head>
  <body ng-app="forget">
    <main>
      <form name="fpass" ng-controller="pass" ng-submit="change()">
        <table>
            <tr>
              <td>Username:</td>
              <td colspan="2"><input type="text" name="user" ng-model="user" placeholder="Enter the username"></td>
            </tr>
            <tr>
              <td>OTP:</td>
              <td colspan="2"><input type="number" name="otp" ng-model="otp" placeholder="Enter the OTP"></td>
            </tr>
            <tr>
              <td>New Password:</td>
              <td colspan="2"><input type="password" name="pass" ng-model="pass" placeholder="Enter the new password"></td>
            </tr>
            <tr>
              <td colspan="3"><input type="submit" name="submit" value="SUBMIT"></td>
            </tr>
        </table>
      </form>
    </main>
  </body>
</html>

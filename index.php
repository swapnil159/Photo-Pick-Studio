<!Doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="login.js"></script>
  </head>
  <body ng-app="login">
    <br /><br /><br />
    <div>
      <form name="LoginForm" ng-controller="login_dash" ng-submit="in()">
      <table cellspacing="50" style="border: 1px solid black;box-shadow: 5px 10px #888888;margin-top:150px;" align="center">
        <thead>
        <tr>
          <th colspan="3" align="center" style="font-size:20pt"><u>LOGIN</u></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <b>USERNAME:</b>
          </td>
          <td>
            <input id="user" type="text" value="" name="username" size="30" ng-model="user.username" placeholder="Enter your username." required>
          </td>
        </tr>
        <tr>
          <td>
            <b>PASSWORD:</b>
          </td>
          <td>
            <input id="password" type="password" value="" name="pass" size="30" ng-model="user.password" placeholder="Enter your password." required>
          </td>
        </tr>
        <tr>
          <td colspan="3" align="center">
            <input id="submit_button" type="submit" name="submit_button" value="LOGIN" style="font-size:17pt;">
          </td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <td align="center">
            <a href="register.php" style="text-decoration: none;">New User?</a>
          </td>
          <td></td>
          <td>
            <a href="forget.php" style="text-decoration: none;">Forgot Password?</a>
          </td>
        </tr>
      </tfoot>
      </table>
    </form>
    </div>
  </body>
</html>

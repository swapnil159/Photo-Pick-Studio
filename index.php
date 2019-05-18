<!Doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
  </head>
  <body>
    <br /><br /><br />
    <div>
      <form>
      <table cellspacing="50">
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
            <input id="user" type="text" value="" name="username" size="30" placeholder="Enter your roll number." required>
          </td>
        </tr>
        <tr>
          <td>
            <b>PASSWORD:</b>
          </td>
          <td>
            <input id="password" type="password" value="" name="pass" size="30" placeholder="Enter your password." required>
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
            <a href="register.php">New User?</a>
          </td>
          <td></td>
          <td>
            <a href="">Forgot Password?</a>
          </td>
        </tr>
      </tfoot>
      </table>
    </form>
    </div>
  </body>
</html>

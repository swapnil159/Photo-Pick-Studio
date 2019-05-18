
<!Doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>REGISTER</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="register.js"></script>
  </head>
  <body>
    <div ng-app="registration" ng-controller="reg">
      <h1>REGISTER</h1>
      <p>{{msg}}</p>
      <form  ng-submit="send()">
        <div>
          <table cellspacing="40">
            <div>
              <tr>
                <td>
                  <b>First Name*:<b>
                </td>
                <td>
                  <input id="fname" type="text" value="" name="fname" size="30" ng-model="form.fname" placeholder="Enter your first name." required>
                </td>
              </tr>
            </div>
            <div>
              <tr>
                <td>
                  <b>Last Name*:<b>
                </td>
                <td>
                  <input id="lname" type="text" value="" name="lname" size="30" ng-model="form.lname" placeholder="Enter your last name." required>
                </td>
              </tr>
            </div>
            <div>
              <tr>
                <td>
                  <b>Gender*:</b>
                </td>
                <td>
                  <input id="gm" type="radio" value="male" name="gender" ng-model="form.gender" ng-value="male" checked>Male
                  <input id="gf" type="radio" name="gender" value="female" ng-model="form.gender" ng-value="female">Female
                </td>
              </tr>
            </div>
            <div>
              <tr>
                <td><b>E-mail*:</b></td>
                <td><input id="e-mail" type="email" value="" name="e_mail" size="30" ng-model="form.email" placeholder="Enter your E-mail" required></td>
              </tr>
            </div>
            <div>
              <tr>
                <td><b>Username*:</b></td>
                <td><input id="user" type="text" value="" name="user" size="30" ng-model="form.username" placeholder="Enter your username" required></td>
              </tr>
            </div>
            <div>
              <tr>
                <td><b>PASSWORD*:</b></td>
                <td><input id="pass" type="password" value="" name="pass" size="30" ng-model="form.pass" placeholder="Enter the password you want to set" required></td>
              </tr>
            </div>
            <div>
              <tr>
                <td><b>CONFIRM PASSWORD*:</b></td>
                <td><input id="confirm_pass" type="password" value="" name="cpass" size="30" ng-model="form.cpass" placeholder="Confirm your password" required></td>
              </tr>
            </div>
            <div>
              <tr>
                <td colspan="2" align="center"><input id="submit" type="submit" value="REGISTER" name="submit_button" style="font-size: 17pt;"></td>
              </tr>
            </div>
          </table>
        </div>
      </form>
    </div>
  </body>
</html>

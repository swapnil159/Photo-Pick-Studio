<?php
    $servername='localhost';
    $username='root';
    $password='swapnil159';
    $dbname='Photo_Gallery';

    $conn=mysqli_connect($servername,$username,$password,$dbname);

    ini_set('display_errors',1);
    error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html>
  <head>
    <title>FORGOT PASSWORD</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="forget.js"></script>
    <link rel="stylesheet" href="style.css">
  </head>
  <body ng-app="forget">
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
    <main style="padding-top: 100px;">
      <form name="fpass" ng-controller="pass" ng-submit="change()">
        <table cellspacing="40" style="border: 1px solid black;box-shadow: 5px 10px #888888;margin-top:150px;" align="center">
          <tbody>
            <tr>
              <td>E-mail:</td>
              <td colspan="2"><input type="email" name="email" ng-model="mail" placeholder="Enter the registered E-mail"></td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="3" align="center"><input type="submit" name="submit" value="SUBMIT"></td>
            </tr>
          </tfoot>
        </table>
      </form>
    </main>
  </body>
</html>

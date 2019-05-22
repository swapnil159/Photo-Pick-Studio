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
  </head>
  <body ng-app="forget">
    <main>
      <form name="fpass" ng-controller="pass" ng-submit="change()">
        <table>
          <thead>
            <tr>
              <td colspan="3">Enter the registered E-mail</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>E-mail:</td>
              <td colspan="2"><input type="email" name="email" ng-model="mail" placeholder="Enter the registered E-mail"></td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="3"><input type="submit" name="submit" value="SUBMIT"></td>
            </tr>
          </tfoot>
        </table>
      </form>
    </main>
  </body>
</html>

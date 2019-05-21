<?php
  include 'conn.php';
  $user=$_SESSION['user'];

  $query="SELECT First_Name,Last_Name,Gender,Email FROM Register WHERE Username='$user'";
  $result=mysqli_query($conn,$query);

  $row=mysqli_fetch_array($result);
?>
<!Doctype html>
<html>
  <head>
    <title>PROFILE PAGE</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="profile.js"></script>
  </head>
  <body>
    <div>
      <h1>WELCOME  <?php echo $user ?> </h1>
    </div>
    <div>
      <table cellspacing="30">
        <tr>
          <td>First Name</td>
          <td><?php echo $row['First_Name'] ?></td>
        </tr>
        <tr>
          <td>Last Name</td>
          <td><?php echo $row['Last_Name'] ?></td>
        </tr>
        <tr>
          <td>Gender</td>
          <td><?php echo $row['Gender'] ?></td>
        </tr>
        <tr>
          <td>Email</td>
          <td><?php echo $row['Email'] ?></td>
        </tr>
      </table>
      <hr>
    </div>
    <div ng-app="profile" ng-controller="display">
      <table>
        <tr ng-repeat="x in disp">
          <td><img height="100" width="100" src="{{x.path}}"><br />
          <a ng-href="pic_display.php?name={{x.name}}">{{x.name}}</a></td>
          <td>Created on {{x.dat}}</td>
          <td>{{x.desc}}</td>
        </tr>
      </table>
    </div>
  </body>
</html>

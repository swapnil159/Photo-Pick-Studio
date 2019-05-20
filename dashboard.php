<?php
  session_start();
  $servername='localhost';
  $username='root';
  $password='swapnil159';
  $dbname='Photo_Gallery';

  $conn=mysqli_connect($servername,$username,$password,$dbname);

  $user=$_SESSION['user'];
?>

<!Doctype html>
<html>
  <head>
    <title>DASHBOARD</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
  </head>
  <body>
    <div id="menu">
      <nav id="bar">
        <ul>
          <li><a href="profile.php">VIEW PROFILE</a>
          <li><a href="album.php">CREATE ALBUM</a>
          <li><a href="profile_update.php">UPDATE PROFILE</a>
          <li><a href="#">LOG OUT</a>
        </ul>
      </nav>
    </div>
  </body>
</html>

<?php
  include 'conn.php';
  $user=$_SESSION['user'];
  $album=$_GET['album'];

  $query="SELECT Cover FROM Album WHERE Username='$user'";
  $result=mysqli_query($conn,$query);
  $cov=mysqli_fetch_assoc($result);
  $cover=$cov['Cover'];
?>
<!Doctype html>
<html>
  <head>
    <title>DISPLAY ALBUM</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
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
    <div style="padding-top: 150px;" align="center">
      <img height="500" src=<?php echo "ALBUMS/".$user."/".$album."/".$cover ?>>
    </div>
    <div>
      <table cellspacing="40" style="border: 1px solid black;box-shadow: 5px 10px #888888;margin-top:150px;" align="center">
        <?php
          $query="SELECT Photo_Name,date_time,Description FROM Photo WHERE Username='$user' AND Album_Name='$album'";
          $result=mysqli_query($conn,$query);
          while($row=mysqli_fetch_array($result))
          {?>
            <tr>
              <td><img height="100" width="100" src=<?php echo "ALBUMS/".$user."/".$album."/".$row['Photo_Name'] ?>>
                <td>Created on<?php echo $row['date_time'] ?></td>
                <td><?php echo $row['Description'] ?></td>
            </tr>
          <?php
          }
         ?>
      </table>
    </div>
  </body>
</html>

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
  </head>
  <body>
    <div>
      <img height="500" src=<?php echo "ALBUMS/".$user."/".$album."/".$cover ?>>
    </div>
    <div>
      <table cellspacing="40">
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

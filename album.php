<?php
  include 'conn.php';
  $user=$_SESSION['user'];
 ?>


<!Doctype html>
<html>
  <head>
    <title>ALBUM</title>
  </head>
  <body>
    <div id="menu">
      <nav id="bar">
        <ul>
          <li><a href="album.php">CREATE ALBUM</a>
          <li><a href="profile_update.php">UPDATE PROFILE</a>
          <li><a href="#">LOG OUT</a>
        </ul>
      </nav>
    </div>
    <div>
      <form method="post" enctype="multipart/form-data">
        <table cellspacing="40">
          <tr>
            <td><b>Album Name*:</b></td>
            <td><input type="text" name="albumname" size="30" placeholder="Enter the Album Name" required></td>
          </tr>
          <tr>
            <td><b>Album Description:</b></td>
            <td><textarea rows="5" cols="50" name="description"></textarea>
          </tr>
          <tr>
            <td><b>Cover Pic*</b></td>
            <td><input id="userfile" name="userfile" type="file" required></td>
          </tr>
          <tr>
            <td colspan="3" align="center"><input type="submit" value="SUBMIT" name="submit_button"></td>
          </tr>
        </table>
      </form>
    </div>
  </body>
</html>

<?php
  if(isset($_POST['submit_button']))
  {
    if($_FILES['userfile']['size']>0)
    {
      $album=$_POST['albumname'];
      $desc=$_POST['description'];
      $file=$_FILES['userfile'];
      $filename=$file['name'];

      mkdir("/var/www/html/ALBUMS/".$user."/".$album);
      $my_date = date("Y-m-d H:i:s");

      if(strlen($desc)>0)
      {
        $query="INSERT INTO Album (Username,Album_Name,Album_Description,date_time,Cover) VALUES ('$user','$album','$desc','$my_date','$filename')";
      }
      else {
        $query="INSERT INTO Album (Username,Album_Name,date_time,Cover) VALUES ('$user','$album','$my_date','$filename')";
      }
      $result=mysqli_query($conn,$query);
      $location="/var/www/html/ALBUMS/".$user."/".$album;
      if(move_uploaded_file($file['tmp_name'],$location."/".$file['name']))
      {
        echo "Success";
      }

      $_SESSION['Album']=$album;

      header('location: crtalbum.php');
    }
    else {
      echo '<script type="text/javascript">
      alert("Cover Pic not uploaded");
      </script>';
    }
  }
?>

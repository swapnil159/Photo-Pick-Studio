<?php
  include 'conn.php';

  if(!$_SESSION['user'])
  {
    header('location: index.php');
  }

  $user=$_SESSION['user'];
 ?>


<!Doctype html>
<html>
  <head>
    <title>ALBUM</title>
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
    <div style="padding-top: 100px;">
      <h1 align="center">Create Album</h1>
      <form method="post" enctype="multipart/form-data">
        <table cellspacing="50" align="center" style="border: 1px solid black;box-shadow: 5px 10px #888888;">
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
            <td><b>Privacy:<b></td>
            <td><input id="pu" type="radio" value="public" name="privacy" checked>Public
                <input id="pr" type="radio" name="privacy" value="private">Private
                <input id="pro" type="radio" name="privacy" value="protected">Protected</td>
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
      $privacy=$_POST['privacy'];


      mkdir("/var/www/html/ALBUMS/".$user."/".$album);
      $my_date = date("Y-m-d H:i:s");

      if(strlen($desc)>0)
      {
        $query="INSERT INTO Album (Username,Album_Name,Album_Description,date_time,Cover,Privacy) VALUES ('$user','$album','$desc','$my_date','$filename','$privacy')";
      }
      else
      {
        $query="INSERT INTO Album (Username,Album_Name,date_time,Cover,Privacy) VALUES ('$user','$album','$my_date','$filename','$privacy')";
      }

      $location="/var/www/html/ALBUMS/".$user."/".$album;
      if(is_dir($location))
      {
        echo '<script type="text/javascript">
        alert("Album already exists");
        </script>';
        header('location: album.php');
      }
      $result=mysqli_query($conn,$query);
      move_uploaded_file($file['tmp_name'],$location."/".$file['name']);

      header('location: crtalbum.php?album='.$album);
    }
    else
    {
      echo '<script type="text/javascript">
      alert("Cover Pic not uploaded");
      </script>';
    }
  }
?>

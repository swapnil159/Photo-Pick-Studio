<?php
  include 'conn.php';

  $user=$_SESSION['user'];
  $album=$_GET['album'];

  $query="SELECT Cover,Size FROM Album WHERE Username='$user' AND Album_Name='$album'";
  $result=mysqli_query($conn,$query);
  $cov=mysqli_fetch_assoc($result);
  $cover=$cov['Cover'];

  $size=$rcov['Size'];
?>

<!Doctype html>
<html>
  <head>
    <title>UPLOAD PICS</title>
  </head>
  <body>
    <div>
      <img src=<?php echo "ALBUMS/".$user."/".$album."/".$cover ?> height="300">
      <h1 align="center"><?php echo $album ?></h1>
    </div>
    <form method="post" enctype="multipart/form-data">
        <table>
          <tr>
            <td><b>Select Photo*</b></td>
            <td><input type='file' name="file" required></td>
          </tr>
          <tr>
            <td><b>Photo Description:</b></td>
            <td><textarea rows="5" cols="50" name="description"></textarea>
          </tr>
          <tr>
            <td align="center"><a href="dashboard.php">Skip</a></td>
            <td align="center"><input type='submit' value='Upload' id='upload' name="submit"></td>
          </tr>
        </table>
    </form>
  </body>
</html>


<?php
  if(isset($_POST['submit']))
  {
    if($_FILES['file']['size']>0)
    {
      $desc=$_POST['description'];
      $my_date = date("Y-m-d H:i:s");
      $file=$_FILES['file'];
      $name=$file['name'];

      $size=$size+1;
      if($size>1000)
      {
        echo '<script type="text/javascript">
        alert("Pic not uploaded");
        </script>';

        $size=1000;

        header('location: crtalbum.php?album='.$album);
      }

      if(strlen($desc)>0)
      {
        $query="INSERT INTO Photo (Username,Album_Name,Photo_Name,date_time,Description) VALUES ('$user','$album','$name','$my_date','$desc')";
      }
      else {
        $query="INSERT INTO Photo (Username,Album_Name,Photo_Name,date_time) VALUES ('$user','$album','$name','$my_date')";
      }

      $result=mysqli_query($conn,$query);

      $location="/var/www/html/ALBUMS/".$user."/".$album;
      if(move_uploaded_file($file['tmp_name'],$location."/".$file['name']))
      {
        echo "Success";
      }
      else {
        echo "Failure";
      }

      $query="UPDATE Album SET Size=$size WHERE Album_Name='$album' AND Username='$user'";
      $result=mysqli_query($conn,$query);
      
      header('location: crtalbum.php?album='.$album);
    }
    else {
      echo '<script type="text/javascript">
      alert("Pic not uploaded");
      </script>';
    }
  }
?>

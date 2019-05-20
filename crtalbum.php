<?php
  include 'conn.php';

  $user=$_SESSION['user'];
  $album=$_SESSION['Album'];

  $query="SELECT Cover FROM Album WHERE Username='$user' AND Album_Name='$album'";
  $result=mysqli_query($conn,$query);
  $cov=mysqli_fetch_assoc($result);
  $cover=$cov['Cover'];
?>

<!Doctype html>
<html>
  <head>
    <title>UPLOAD PICS</title>
  </head>
  <body>
    <div>
      <img src=<?php echo "ALBUMS/".$user."/".$album."/".$cover ?> height="500">
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

      if(strlen($desc)>0)
      {
        $query="INSERT INTO Photo (Username,Album_Name,Photo_Name,date_time,Description) VALUES ('$user','$album','$name','$my_date','$desc')";
      }
      else {
        $query="INSERT INTO Photo (Username,Album_Name,Photo_Name,date_time) VALUES ('$user','$album','$name','$my_date')";
      }
      echo $query;

      $result=mysqli_query($conn,$query);

      $location="/var/www/html/ALBUMS/".$user."/".$album;
      if(move_uploaded_file($file['tmp_name'],$location."/".$file['name']))
      {
        echo "Success";
      }
      else {
        echo "Failure";
      }
      header('location: crtalbum.php');
    }
    else {
      echo '<script type="text/javascript">
      alert("Pic not uploaded");
      </script>';
    }
  }
?>

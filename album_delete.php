<?php
  include 'conn.php';

  $postdata = file_get_contents("php://input");
  $request = json_decode($postdata);

  $name = $request->Name;
  $user=$_SESSION['user'];

  $query="DELETE FROM Album WHERE Album_name='$name' AND Username='$user'";
  $result=mysqli_query($conn,$query);

  $query="DELETE FROM Photo WHERE Album_name='$name' AND Username='$user'";
  $result=mysqli_query($conn,$query);

  function deleteDir($path) {
    return is_file($path) ?
            @unlink($path) :
            array_map(__FUNCTION__, glob($path.'/*')) == @rmdir($path);
          }


  $path="/var/www/html/ALBUMS/".$user."/".$name;
  deleteDir($path);

?>

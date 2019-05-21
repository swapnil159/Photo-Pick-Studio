<?php
  include 'conn.php';

  $user=$_SESSION['user'];

  $postdata = file_get_contents("php://input");
  $request = json_decode($postdata);

  $file = $request->Path;

  unlink($file);

  $album = $request->Album;
  $photo = $request->Photo;

  $query="DELETE FROM Photo WHERE Photo_Name='$photo' AND Album_Name='$album' AND Username='$user'";
  $result=mysqli_query($conn,$query);

?>

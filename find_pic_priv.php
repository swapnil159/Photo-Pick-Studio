<?php
  include 'conn.php';

  $postdata = file_get_contents("php://input");
  $request = json_decode($postdata);

  $user = $request->user;
  $album = $request->album;
  $pic = $request->photo;

  $query="SELECT Privacy FROM Photo WHERE Username='$user' AND Album_Name='$album' AND Photo_Name='$pic'";
  $result=mysqli_query($conn,$query);

  $res=mysqli_fetch_assoc($result);
  $priv=$res['Privacy'];

  echo $priv;
?>

<?php
  include 'conn.php';

  $user=$_SESSION['user'];

  $postdata = file_get_contents("php://input");
  $request = json_decode($postdata);

  $username = $request->username;
  $album = $request->album;

  $query="SELECT * FROM Album_Likes WHERE Username='$username' AND Album_Name='$album' AND Liked_By='$user'";
  $result=mysqli_query($conn,$query);

  if(mysqli_num_rows($result)>0)
  {
    $que="DELETE FROM Album_Likes WHERE Username='$username' AND Album_Name='$album' AND Liked_By='$user'";
  }
  else {
    $que="INSERT INTO Album_Likes (Username,Album_Name,Liked_By) VALUES ('$username','$album','$user')";
  }

  $res=mysqli_query($conn,$que);
?>

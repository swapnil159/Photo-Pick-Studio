<?php
  include 'conn.php';

  $user=$_SESSION['user'];

  $postdata = file_get_contents("php://input");
  $request = json_decode($postdata);

  $name = $request->Name;
  $album = $request->Album;
  $pic = $request->Pic;

  $query="SELECT * FROM Likes WHERE Username='$name' AND Album_Name='$album' AND Photo_Name='$pic' AND Liked_By='$user'";
  $result=mysqli_query($conn,$query);


  if(mysqli_num_rows($result)>0)
  {
    $query="DELETE FROM Likes WHERE Username='$name' AND Album_Name='$album' AND Photo_Name='$pic' AND Liked_By='$user'";
    $res=mysqli_query($conn,$query);
  }
  else {
    $query="INSERT INTO Likes (Username,Album_Name,Photo_Name,Liked_By) VALUES ('$name','$album','$pic','$user')";
    $res=mysqli_query($conn,$query);
  }
?>

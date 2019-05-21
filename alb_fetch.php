<?php
  include 'conn.php';

  $user=$_SESSION['user'];

  $postdata = file_get_contents("php://input");
  $request = json_decode($postdata);

  $name=$request->User;
  $album=$request->Album;


  $query="SELECT Photo_Name,date_time,Description FROM Photo WHERE Username='$name' AND Album_Name='$album'";
  $result=mysqli_query($conn,$query);

  $rows=array();
  while($row=mysqli_fetch_assoc($result))
  {
    $pic=$row['Photo_Name'];
    $quer="SELECT * FROM Likes WHERE Username='$name' AND Album_Name='$album' AND Photo_Name='$pic' AND Liked_By='$user'";
    $res=mysqli_query($conn,$quer);
    if(mysqli_num_rows($res)>0)
    {
      $state="Unlike";
    }
    else {
      $state="Like";
    }
    $temp=Array("path"=>"ALBUMS/".$name."/".$album."/".$row['Photo_Name'],"dat"=>$row['date_time'],"desc"=>$row['Description'],"pic"=>$row['Photo_Name'],"state"=>$state);
    $rows[]=$temp;
  }

  echo json_encode($rows);
?>

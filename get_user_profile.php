<?php
  include 'conn.php';


  $postdata = file_get_contents("php://input");
  $request = json_decode($postdata);

  $username = $request->Name;

  $query="SELECT Album_Name,Cover FROM Album WHERE Username='$username' AND Privacy='public'";
  $result=mysqli_query($conn,$query);

  $rows=array();

  while($row=mysqli_fetch_assoc($result))
  {

    $album=$row['Album_Name'];
    $que="SELECT * FROM Album_Likes WHERE Username='$username' AND Album_Name='$album'";
    $res=mysqli_query($conn,$que);

    if(mysqli_num_rows($res)>0)
    {
      $state="Unlike";
    }
    else {
      $state="Like";
    }

    $temp=Array("album"=>$row['Album_Name'],"path"=>"ALBUMS/".$username."/".$row['Album_Name']."/".$row['Cover'],"state"=>$state);
    $rows[]=$temp;
  }

  echo json_encode($rows);
?>

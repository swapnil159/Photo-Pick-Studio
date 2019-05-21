<?php
  include 'conn.php';


  $postdata = file_get_contents("php://input");
  $request = json_decode($postdata);

  $username = $request->Name;

  $query="SELECT Album_Name,Cover FROM Album WHERE Username='$username'";
  $result=mysqli_query($conn,$query);

  $rows=array();

  while($row=mysqli_fetch_assoc($result))
  {
    $temp=Array("album"=>$row['Album_Name'],"path"=>"ALBUMS/".$username."/".$row['Album_Name']."/".$row['Cover']);
    $rows[]=$temp;
  }

  echo json_encode($rows);
?>

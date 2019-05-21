<?php
  include 'conn.php';

  $user=$_SESSION['user'];

  $query="SELECT Album_Name,Album_Description,date_time,Cover FROM Album WHERE Username='$user'";
  $result=mysqli_query($conn,$query);

  $rows=array();
  while($row=mysqli_fetch_assoc($result))
  {
    $temp=Array("path"=>"ALBUMS/".$user."/".$row['Album_Name']."/".$row['Cover'],"dat"=>$row['date_time'],"desc"=>$row['Album_Description'],"name"=>$row['Album_Name']);
    $rows[]=$temp;
  }
  echo json_encode($rows);
?>

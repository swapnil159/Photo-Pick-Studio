<?php
  include '../conn.php';

  $user=$_GET['username'];

  $rows = array();
  $query="SELECT Username,Profile_Pic_Name FROM Register WHERE Username!='$user'";
  $result=mysqli_query($conn,$query);

  while($row=mysqli_fetch_assoc($result))
  {
    $path = '../PROFILE/'.$row['Profile_Pic_Name'];
    $temp = array("path"=>$path,"name"=>$row['Username']);
    $rows[] = $temp;
  }
    
  echo json_encode($rows);
?>
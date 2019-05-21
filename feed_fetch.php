<?php
  include 'conn.php';
  $user=$_SESSION['user'];
  $rows = array();
  $query="SELECT Username FROM Register WHERE Username!='$user'";
  $result=mysqli_query($conn,$query);

  while($row=mysqli_fetch_assoc($result))
  {
    $temp=Array("path"=>"pp/".$row['Username'],"name"=>$row['Username']);
    $rows[]=$temp;
  }
  echo json_encode($rows);
?>

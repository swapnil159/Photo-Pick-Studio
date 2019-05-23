<?php
  include 'conn.php';

  $user=$_SESSION['user'];

  $postdata = file_get_contents("php://input");
  $request = json_decode($postdata);

  $album = $request->Album_Name;

  $query="SELECT Photo_Name,Description,date_time FROM Photo WHERE Username='$user' AND Album_Name='$album'";
  $result=mysqli_query($conn,$query);

  $rows=array();
  while($row=mysqli_fetch_assoc($result))
  {
    $temp=Array("path"=>"ALBUMS/".$user."/".$album."/".$row['Photo_Name'],"desc"=>$row['Description'],"dat"=>$row['date_time'],"name"=>$row['Photo_Name']);
    $rows[]=$temp;
  }

  echo json_encode($rows);
?>

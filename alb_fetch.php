<?php
  include 'conn.php';

  $postdata = file_get_contents("php://input");
  $request = json_decode($postdata);

  $name=$request->User;
  $album=$request->Album;


  $query="SELECT Photo_Name,date_time,Description FROM Photo WHERE Username='$name' AND Album_Name='$album'";
  $result=mysqli_query($conn,$query);

  $rows=array();
  while($row=mysqli_fetch_assoc($result))
  {
    $temp=Array("path"=>"ALBUMS/".$name."/".$album."/".$row['Photo_Name'],"dat"=>$row['date_time'],"desc"=>$row['Description']);
    $rows[]=$temp;
  }

  echo json_encode($rows);
?>

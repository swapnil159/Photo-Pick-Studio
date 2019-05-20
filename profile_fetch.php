<?php
  session_start();
  $servername='localhost';
  $username='root';
  $password='swapnil159';
  $dbname='Photo_Gallery';

  $conn=mysqli_connect($servername,$username,$password,$dbname);

  $user=$_SESSION['user'];



  $query="SELECT First_Name,Last_Name,Email,Password,Gender FROM Register WHERE Username='$user'";
  $result=mysqli_query($conn,$query);

  $row=mysqli_fetch_assoc($result);

  $conpass=$row['Password'];
  $_SESSION['pass']=$conpass;

  $data=array("fname"=>$row['First_Name'],"lname"=>$row['Last_Name'],"email"=>$row['Email'],"gender"=>$row['Gender']);
  echo json_encode($data);
?>

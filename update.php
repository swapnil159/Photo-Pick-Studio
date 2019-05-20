<?php
  session_start();
  $servername='localhost';
  $username='root';
  $password='swapnil159';
  $dbname='Photo_Gallery';

  $conn=mysqli_connect($servername,$username,$password,$dbname);

  $user=$_SESSION['user'];
  $conpass=$_SESSION['pass'];


  $postdata = file_get_contents("php://input");
  $request = json_decode($postdata);


  $fname = $request->First_Name;
  $lname = $request->Last_Name;
  $gender = $request->Gender;
  $email = $request->Email;
  $currpass = $request->Currpass;
  $newpass = $request->Newpass;
  $cnewpass = $request->Cnewpass;


  if(strlen($newpass)==0)
  {
    echo "ty ";
    $newpass=$currpass;
    $cnewpass=$newpass;
  }
  if($currpass!=$conpass)
  {
    echo '<script type="text/javascript">
    alert("Enter correct password");
    </script>';
  }
  else if($newpass!=$cnewpass)
  {
    echo '<script type="text/javascript">
    alert("Passwords did not match");
    </script>';
  }
  else {
    $que="UPDATE Register SET First_Name='$fname' , Last_Name='$lname' , Gender='$gender' , Email='$email', Password='$newpass'";
    $res=mysqli_query($conn,$que);
    echo "successfully updated";
  }
?>

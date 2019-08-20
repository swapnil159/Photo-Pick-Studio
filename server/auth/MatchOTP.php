<?php
  include '../conn.php';

  $user=$_POST['username'];
  $otp=$_POST['otp'];
  $pass=$_POST['password'];

  $my_date = date("Y-m-d H:i:s");

  $query="SELECT otp,otp_time FROM Register WHERE Username='$user'";
  $result=mysqli_query($conn,$query);

  if(mysqli_num_rows($result)>0)
  {
    $res=mysqli_fetch_assoc($result);

    $saotp=$res['otp'];
    $satime=$res['otp_time'];

    $elapsed=(strtotime($my_date)-strtotime($satime));

    if($elapsed>3600)
    {
      echo json_encode(array("done"=>false,"message"=>"OTP Expired"));
    }
    else if($otp==$saotp) {
      $que="UPDATE Register SET Password='$pass' WHERE Username='$user'";
      $temp=mysqli_query($conn,$que);

      echo json_encode(array("done"=>true,"message"=>"Password Changed Successfully"));
    }
    else {
        echo json_encode(array("done"=>false,"message"=>"OTP did not match"));
    }
  }
?>
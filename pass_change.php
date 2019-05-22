<?php
  include 'conn.php';

  $postdata = file_get_contents("php://input");
  $request = json_decode($postdata);

  $user=$request->user;
  $otp=$request->otp;
  $pass=$request->pass;

  $my_date = date("Y-m-d H:i:s");

  $query="SELECT otp,otp_time FROM Register WHERE Username='$user'";
  $result=mysqli_query($conn,$query);

  if(mysqli_num_rows($result)>0)
  {
    $res=mysqli_fetch_assoc($result);

    $saotp=$res['otp'];
    $satime=$res['otp_time'];

    $elapsed=(strtotime($my_date)-strtotime($satime));

    if($elapsed>60)
    {
      session_destroy();
      echo "OTP Expired";
    }
    else if($otp==$saotp) {
      $que="UPDATE Register SET Password='$pass' WHERE Username='$user'";
      $temp=mysqli_query($conn,$que);

      $_SESSION['user']=$user;
      echo "Password changed successfull";
    }
    else {
      session_destroy();
      echo "OTP did not match";
    }
  }
  else {
    session_destroy();
    echo "Incorrect Username";
  }
?>

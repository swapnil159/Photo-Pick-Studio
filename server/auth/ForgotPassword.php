<?php

    include '../conn.php';

    $username=$_POST['username'];

    $query="SELECT Email FROM Register WHERE Username='$username'";
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_assoc($result);

    $email = $row['Email'];
    $my_date = date("Y-m-d H:i:s");
    $math = mt_rand(100000,999999);

    $query="UPDATE Register SET otp=$math , otp_time='$my_date' WHERE Username='$username'";
    $result=mysqli_query($conn,$query);

    echo json_encode(array("done"=>true));

    require_once('../PHPMailer/PHPMailerAutoload.php');
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = 'swapphotogallery@gmail.com';
    $mail->Password = 'swapnil159';
    $mail->setFrom('SwapPhotoGallery@gmail.com');


    $mail->Subject = 'Password Change';
    $mail->Body = 'Your OTP is '.$math.'. It is valid for one hour only.';
    $mail->addAddress($email);

    $mail->send();
?>
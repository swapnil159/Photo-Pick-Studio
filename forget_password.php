<?php
$servername='localhost';
$username='root';
$password='swapnil159';
$dbname='Photo_Gallery';

$conn=mysqli_connect($servername,$username,$password,$dbname);

ini_set('display_errors',1);
error_reporting(E_ALL);

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$email = $request->email;
require_once('PHPMailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = 'swapphotogallery@gmail.com';
$mail->Password = 'swapnil159';
$mail->setFrom('SwapPhotoGallery@gmail.com');

$math = mt_rand(100000,999999);

$mail->Subject = 'Password Change';
$mail->Body = 'Your OTP is '.$math.'. It is valid for one hour only.';
$mail->addAddress($email);

$mail->send();

$my_date = date("Y-m-d H:i:s");

$query="UPDATE Register SET otp=$math , otp_time='$my_date' WHERE Email='$email'";
$result=mysqli_query($conn,$query);
?>

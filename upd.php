<?php
      session_start();
      $servername='localhost';
      $username='root';
      $password='swapnil159';
      $dbname='Photo_Gallery';

      $conn=mysqli_connect($servername,$username,$password,$dbname);

      $postdata = file_get_contents("php://input");
      $request = json_decode($postdata);

      $fname = $request->First_Name;
      $lname = $request->Last_Name;
      $gender = $request->Gender;
      $email = $request->Email;
      $username = $request->Username;
      $password = $request->Password;
      $cpassword = $request->CPassword;

      $qur="SELECT * FROM Register WHERE Username='$username'";
      $res=mysqli_query($conn,$qur);

      if(mysqli_num_rows($res)>0)
      {
        echo "Username already exists";
      }
      else if($password!=$cpassword)
      {
        echo "Passwords do not match";
      }
      else
      {
        $query = "INSERT INTO Register (First_Name,Last_Name,Gender,Email,Username,Password) VALUES ('$fname','$lname','$gender','$email','$username','$password')";
        $result = mysqli_query($conn,$query);
        $_SESSION['user']=$username;
        mkdir("/var/www/html/ALBUMS/".$username);

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

        $mail->Subject = 'Gallery Registration';
        $mail->Body = 'Congratulations !! You have been successfully registered '.$username;
        $mail->addAddress($email);

        $mail->send();



        echo "You have been successfully registered";
      }
?>

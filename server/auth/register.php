<?php
    include '../conn.php';

    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);

    $fname = $request->firstName;
    $lname = $request->lastName;
    $gender = $request->gender;
    $email = $request->email;
    $username = $request->username;
    $password = $request->password;
    $cpassword = $request->confirmPassword;

    $qur="SELECT * FROM Register WHERE Username='$username'";
    $res=mysqli_query($conn,$qur);

    if(mysqli_num_rows($res)>0)
    {
        echo json_encode(array(
            "registered"=>false,
            "message"=>"Username already exists"
        ));
    }
    else if($password!=$cpassword)
    {
        echo json_encode(array(
            "registered"=>false,
            "message"=>"Passwords do not match"
        ));
    }
    else
      {
        $query = "INSERT INTO Register (First_Name,Last_Name,Gender,Email,Username,Password) VALUES ('$fname','$lname','$gender','$email','$username','$password')";
        $result = mysqli_query($conn,$query);

        $oldmask = umask(0);
        if(mkdir("/home/swapnil/Desktop/client/public/ALBUMS/".$username,0777))
        {
            umask($oldmask);
            echo json_encode(array(
                "loggedIn"=>true,
                "path"=>"./PROFILE/def.jpg",
            ));

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

            $mail->Subject = 'Gallery Registration';
            $mail->Body = 'Congratulations !! You have been successfully registered '.$username;
            $mail->addAddress($email);

            $mail->send();
        }
        else
        {
            echo json_encode(array(
                "registered"=>false
            ));
        }

      }
?>
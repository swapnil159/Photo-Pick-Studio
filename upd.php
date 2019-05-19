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
        echo "You have been successfully registered";
      }
?>

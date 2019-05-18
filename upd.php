<?php
      $servername='localhost';
      $username='root';
      $password='swapnil159';
      $dbname='Photo_Gallery';

      $conn=mysqli_connect($servername,$username,$password,$dbname);

      ini_set('display_errors',1);
      error_reporting(E_ALL);
      if(!$conn)
      {
        die("Connection Failed: ".mysqli_connect_error());
      }
      $postdata = file_get_contents("php://input");
      $request = json_decode($postdata);

      $fname = $request->First_Name;
      $lname = $request->Last_Name;
      $gender = $request->Gender;
      $email = $request->Email;
      $username = $request->Username;
      $password = $request->Password;

      $query = "INSERT INTO Register (First_Name,Last_Name,Gender,Email,Username,Password) VALUES ('$fname','$lname','$gender','$email','$username','$password')";
      $result = mysqli_query($conn,$query);
      if($result)
      {
        echo "Success";
      }
      else {
        echo "Failure";
      }
?>

<?php
      session_start();
      $servername='localhost';
      $username='root';
      $password='swapnil159';
      $dbname='Photo_Gallery';

      $conn=mysqli_connect($servername,$username,$password,$dbname);

      $postdata = file_get_contents("php://input");
      $request = json_decode($postdata);

      $username=$request->Username;
      $password=$request->Password;

      $query="SELECT Username,Password FROM Register WHERE Username='$username' AND Password='$password'";
      $result=mysqli_query($conn,$query);

      if(mysqli_num_rows($result))
      {
        $_SESSION['user']=$username;
        echo "Success";
      }
      else {
        echo "Failure";
      }
?>

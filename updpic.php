<?php
      session_start();
      $servername='localhost';
      $username='root';
      $password='swapnil159';
      $dbname='Photo_Gallery';

      $conn=mysqli_connect($servername,$username,$password,$dbname);

      $user=$_SESSION['user'];

      $filename = $_FILES['file']['name'];

      $fil=$_FILES['file'];

      if(move_uploaded_file($fil['tmp_name'], __DIR__.'/pp/'.$user))
      {
        echo "Profile Pic successfully uploaded";
      }
      else {
        echo "Please try again";
      }
?>

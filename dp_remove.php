<?php
  include 'conn.php';
  $user=$_SESSION['user'];

  $path="/var/www/html/pp/".$user;
  if(file_exists($path))
  {
    unlink($path);
  }
?>

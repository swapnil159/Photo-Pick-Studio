<?php
  session_start();
  $servername='localhost';
  $username='root';
  $password='swapnil159';
  $dbname='Photo_Gallery';

  ini_set('display_errors',1);
  error_reporting(E_ALL);

  $conn=mysqli_connect($servername,$username,$password,$dbname);
?>

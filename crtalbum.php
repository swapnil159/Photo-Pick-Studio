<?php
  session_start();
  $servername='localhost';
  $username='root';
  $password='swapnil159';
  $dbname='Photo_Gallery';

  ini_set('display_errors',1);
  error_reporting(E_ALL);

  $conn=mysqli_connect($servername,$username,$password,$dbname);

  $user=$_SESSION['user'];
  $AlbumName=$_SESSION['AlbumName'];

  $countfiles = count($_FILES['file']['name']);

  $query="SELECT Size FROM Album WHERE Albun_Name='$AlbumName'";
  $result=mysqli_query($query);
  $res=mysqli_fetch_assoc($result);

  if($res+$countfiles>1000)
  {
    echo "Not Enough Space";
  }
  else {
    $location="/var/www/html/ALBUMS/".$user."/".$AlbumName;

    $filename_arr = array();
    for ( $i = 0;$i < $countfiles;$i++ ){
      $filename = $_FILES['file']['name'][$i];

      move_uploaded_file($_FILES['file']['tmp_name'][$i],$location.$filename);
      $filename_arr[] = $filename;
    }
  }

?>

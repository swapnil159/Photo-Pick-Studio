<?php
  session_start();
  $servername='localhost';
  $username='root';
  $password='swapnil159';
  $dbname='Photo_Gallery';



  $conn=mysqli_connect($servername,$username,$password,$dbname);


  ini_set('display_errors',1);
  error_reporting(E_ALL);

  $user=$_SESSION['user'];

  $postdata = file_get_contents("php://input");
  $request = json_decode($postdata);

  $AlbumName = $request->Album_Name;
  $AlbumDescription = $request->Album_Description;


  $my_date = date("Y-m-d H:i:s");

  if(strlen($AlbumDescription)>0)
  {
    $query="INSERT INTO Album (Album_Name,Album_Description,date_time) VALUES ('$AlbumName','$AlbumDescription','$my_date')";
  }
  else {
    $query="INSERT INTO Album (Album_Name,date_time) VALUES ('$AlbumName','$my_date')";
  }

  $result=mysqli_query($conn,$query);

  if(mkdir("/var/www/html/ALBUMS/".$user."/".$AlbumName))
  {
    echo "Success";
  }
  else {
    echo "Failure";
  }

  $_SESSION['AlbumName']=$AlbumName;

  $query="INSERT INTO Album_User (Album_Name,Username) VALUES ('$AlbumName','$user')";
  $result=mysqli_query($conn,$query);

  echo "Album successfully Created";
?>

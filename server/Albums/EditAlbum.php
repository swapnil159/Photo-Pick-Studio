<?php

    include '../conn.php';

    $id=$_GET['id'];
    $AlbumName=$_POST['AlbumName'];
    $AlbumDescription=$_POST['AlbumDescription'];

    $AlbumDescription=mysqli_real_escape_string($conn,$AlbumDescription);
    $AlbumName=mysqli_real_escape_string($conn,$AlbumName);

    $query="UPDATE Album SET Album_Name='$AlbumName' , Album_Description='$AlbumDescription' WHERE AlbumId='$id'";
    $result=mysqli_query($conn,$query);

    if($result)
    {
        echo json_encode(array("done"=>true));
    }
    else
    {
        echo json_encode(array("done"=>false));
    }

?>
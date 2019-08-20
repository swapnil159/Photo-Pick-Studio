<?php

    include '../conn.php';

    $id=$_GET['id'];

    $query="SELECT * FROM Album WHERE AlbumId='$id'";
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_assoc($result);

    $path="/home/swapnil/Desktop/client/public/ALBUMS/".$row['Username']."/".$row['Album_Name']."/".$row['Cover'];
    unlink($path);

    $query="UPDATE Album SET Cover=NULL WHERE AlbumId='$id'";
    $result=mysqli_query($conn,$query);
    
    $cover="../ALBUMS/cover.jpg";
    echo json_encode(array("cover"=>$cover));

?>
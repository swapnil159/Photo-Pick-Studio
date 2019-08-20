<?php

    include '../conn.php';

    $user=$_GET['username'];
    $album=$_GET['albumname'];

    $description=$_POST['PhotoDescription'];
    $my_date = date("Y-m-d H:i:s");
    $image=$_FILES['image'];
    $name=$image['name'];

    $query="INSERT INTO Photo (Username,Album_Name,Photo_Name,Date_Time,Photo_Description) VALUES ('$user','$album','$name','$my_date','$description')";
    $result=mysqli_query($conn,$query);

    $location="/home/swapnil/Desktop/client/public/ALBUMS/".$user."/".$album;
    if(move_uploaded_file($image['tmp_name'],$location."/".$image['name']))
    {
        echo json_encode(array("done"=>$query));
    }
    else
    {
        echo json_encode(array("done"=>$location."/".$file['name']));
    }
?>
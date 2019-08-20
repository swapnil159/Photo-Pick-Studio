<?php

    include '../conn.php';

    $username=$_GET['username'];
    $pic=$_GET['pic'];
    function get_file_name($file_name) {
        return substr($file_name,1);
    }
    $pic=get_file_name($pic);

    $path="/home/swapnil/Desktop/client/public".$pic;
    unlink($path);

    $query="UPDATE Register SET Profile_Pic_Name='def.jpg' WHERE Username='$username'";
    $result=mysqli_query($conn,$query);
    
    $profile_pic="../PROFILE/def.jpg";
    echo json_encode(array("profile_pic"=>$profile_pic));

?>
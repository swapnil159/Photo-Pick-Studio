<?php
    include '../conn.php';

    $username=$_GET['username'];

    $query="SELECT * FROM Register WHERE Username='$username'";
    $result=mysqli_query($conn,$query); 
    
    
    if(mysqli_num_rows($result)>0)
    {
        $row=mysqli_fetch_assoc($result);
        $img_path= "../PROFILE/".$row['Profile_Pic_Name'];

        echo json_encode(array("profile_pic" => $img_path, 
        "fname" => $row['First_Name'], "lname" => $row['Last_Name'],
        "gender" => $row['Gender'], "email" => $row['Email']));
    }
    else
    {
        echo json_encode(["loggedIn" => false, "message" => $result]);
    }
?>
<?php
    include '../conn.php';

    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);

    $username=$request->username;
    $password=$request->password;


    $query="SELECT * FROM Register WHERE Username='$username' AND Password='$password'";
    $result=mysqli_query($conn,$query); 
    
    
    if(mysqli_num_rows($result)>0)
    {
        $row=mysqli_fetch_assoc($result);
        $img_path= "../PROFILE/".$row['Profile_Pic_Name'];

        echo json_encode(array("loggedIn" => true ,"profile_pic" => $img_path, 
        "fname" => $row['First_Name'], "lname" => $row['Last_Name'],
        "gender" => $row['Gender'], "email" => $row['Email'], "id" => $row['UserId']));
    }
    else
    {
        echo json_encode(["loggedIn" => false, "message" => "Either username or password is wrong"]);
    }
?>
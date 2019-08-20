<?php
    include '../conn.php';

    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);

    $name=$_GET['username'];

    $fname = $request->firstName;
    $lname = $request->lastName;
    $gender = $request->gender;
    $email = $request->email;

    $query = "UPDATE Register SET First_Name='$fname', Last_Name='$lname', Gender='$gender', Email='$email' WHERE Username='$name'";
    $res=mysqli_query($conn,$query);
    if($res)
    {
        echo json_encode(array("updated"=>true));
    }
    else
    {
        echo json_encode(array("updated"=>false, "message"=>$res));
    }

?>
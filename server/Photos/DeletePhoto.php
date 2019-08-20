<?php

    include '../conn.php';

    $id = $_GET['id'];
    $username = $_GET['username'];

    $query="SELECT Photo_Name,Album_Name FROM Photo WHERE PhotoId='$id'";
    $result=mysqli_query($conn,$query);

    $row=mysqli_fetch_assoc($result);
    $photoname=$row['Photo_Name'];
    $albumname=$row['Album_Name'];

    $query="DELETE FROM Photo WHERE PhotoId='$id'";
    $result=mysqli_query($conn,$query);
    
    $path="/home/swapnil/Desktop/client/public/ALBUMS/".$username."/".$albumname."/".$photoname;
    unlink($path); 

    $query="SELECT * FROM Photo WHERE Username='$username' AND Album_Name='$albumname'";
    $result=mysqli_query($conn,$query);

    $path="../ALBUMS/".$username."/".$albumname."/";

    $rows=array();

    while($row=mysqli_fetch_assoc($result))
    {
        $temp=array("path"=>$path.$row['Photo_Name'],"description"=>$row['Photo_Description'],"id"=>$row['PhotoId'],"Date_Time"=>$row['Date_Time']);
        $rows[]=$temp;
    }

    echo json_encode($rows);

?>

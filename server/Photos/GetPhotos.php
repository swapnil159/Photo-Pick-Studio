<?php

    include '../conn.php';

    $username=$_GET['username'];
    $albumname=$_GET['album'];

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
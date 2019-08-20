<?php

    include '../conn.php';

    $username=$_GET['username'];

    $query="SELECT * FROM Album WHERE Username='$username'";
    $result=mysqli_query($conn,$query);

    $rows=array();
    while($row=mysqli_fetch_assoc($result))
    {
        $temp=array("id"=>$row['AlbumId'],"AlbumName"=>$row['Album_Name'],"AlbumDescription"=>$row['Album_Description'],"Date_Time"=>$row['Date_Time']);
        $rows[]=$temp;
    }

    echo json_encode($rows);

?>

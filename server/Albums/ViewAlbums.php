<?php

    include '../conn.php';

    $username = $_GET['username'];

    $query="SELECT * FROM Album WHERE Username='$username'";
    $result=mysqli_query($conn,$query);

    $rows=array();
    while($row=mysqli_fetch_assoc($result))
    {
        if($row['Cover'])
        {
            $cover='../ALBUMS/'.$username.'/'.$row['Album_Name'].'/'.$row['Cover'];
        }
        else
        {
            $cover="../ALBUMS/cover.jpg";
        }
        $temp=array("id"=>$row['AlbumId'],"AlbumName"=>$row['Album_Name'],"AlbumDescription"=>$row['Album_Description'],"Date_Time"=>$row['Date_Time'],"cover"=>$cover);
        $rows[]=$temp;
    }

    echo json_encode($rows);

?>
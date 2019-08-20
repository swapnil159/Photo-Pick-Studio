<?php

    include '../conn.php';

    $id = $_GET['id'];

    $query="SELECT * FROM Album WHERE AlbumId='$id'";
    $result=mysqli_query($conn,$query);

    $rows=array();
    while($row=mysqli_fetch_assoc($result))
    {
        if($row['Cover'])
        {
            $cover='../ALBUMS/'.$row['Username'].'/'.$row['Album_Name'].'/'.$row['Cover'];
        }
        else
        {
            $cover="../ALBUMS/cover.jpg";
        }
        $temp=array("AlbumName"=>$row['Album_Name'],"AlbumDescription"=>$row['Album_Description'],"cover"=>$cover);
        $rows[]=$temp;
    }

    echo json_encode($rows);

?>
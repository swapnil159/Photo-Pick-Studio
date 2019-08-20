<?php

    include '../conn.php';

    $id = $_GET['id'];
    $username = $_GET['username'];

    $query="SELECT Album_Name FROM Album WHERE AlbumId='$id'";
    $result=mysqli_query($conn,$query);

    $row=mysqli_fetch_assoc($result);
    $albumname=$row['Album_Name'];

    $query="DELETE FROM Photo WHERE Album_Name='$albumname' AND Username='$username'";
    $result=mysqli_query($conn,$query);

    $query="DELETE FROM Album WHERE AlbumId='$id'";
    $result=mysqli_query($conn,$query);

    function deleteDir($path) {
        return is_file($path) ?
                @unlink($path) :
                array_map(__FUNCTION__, glob($path.'/*')) == @rmdir($path);
              }
    
    
    $path="/home/swapnil/Desktop/client/public/ALBUMS/".$username."/".$albumname;
    deleteDir($path);

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

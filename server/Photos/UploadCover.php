<?php

    include '../conn.php';

    $id = $_GET['id'];
    

    $query="SELECT * FROM Album WHERE AlbumId='$id'";
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_assoc($result);

    $path='/home/swapnil/Desktop/client/public/ALBUMS/'.$row['Username'].'/'.$row['Album_Name'];

if($_FILES['image'])
{
    $img_path="$path/".$_FILES['image']['name'];
    if(move_uploaded_file($_FILES['image']['tmp_name'],$img_path))
    {
        $name=$_FILES['image']['name'];
        $query = "UPDATE Album SET  Cover = '$name' WHERE AlbumId='$id'";
        $result = mysqli_query($conn,$query);
        $path='../ALBUMS/'.$row['Username'].'/'.$row['Album_Name'].'/'.$name;
        echo json_encode(array("uploaded" => true, "path" => $path));
    }
    else
    {
        echo json_encode(array("uploaded" => false,"query"=>$path));
    }
}
else
{
    echo json_encode(array("uploaded" => false));
}

?>
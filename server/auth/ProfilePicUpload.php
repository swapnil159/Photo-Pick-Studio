<?php
    include '../conn.php';
    $name = $_GET['username'];
    $path='/home/swapnil/Desktop/client/public/PROFILE';
    function get_file_extension($file_name) {
        return substr(strrchr($file_name,'.'),1);
    }
    
    if($_FILES['image'])
    {
        $ext= get_file_extension($_FILES['image']['name']);
        $img_path="$path/".$name.".".$ext;
        if(move_uploaded_file($_FILES['image']['tmp_name'],$img_path))
        {
            $query = "UPDATE Register SET Profile_Pic_Name = '$name.$ext' WHERE Username='$name'";
            $result = mysqli_query($conn,$query);
            echo json_encode(array("uploaded" => true, "path" => "./PROFILE/"."$name.$ext"));
        }
        else
        {
            echo json_encode(array("uploaded" => false));
        }
    }
    else
    {
        echo json_encode(array("uploaded" => false));
    }
?>
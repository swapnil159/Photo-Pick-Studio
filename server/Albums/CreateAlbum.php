<?php
    include '../conn.php';

    $username = $_GET['username'];
    $my_date = date('Y-m-d H:i:s');

    $name = $_POST['AlbumName'];
    $description = $_POST['AlbumDescription'];
    mkdir("/home/swapnil/Desktop/client/public/ALBUMS/".$username."/".$name);

    $name1=$name;
    $description1=$description;
    $description=mysqli_real_escape_string($conn,$description);
    $name=mysqli_real_escape_string($conn,$name);

    
    $query="INSERT INTO Album (Album_Name,Album_Description,Date_Time,Username) VALUES ('$name','$description','$my_date','$username')";
    $result=mysqli_query($conn,$query);


    $name=$name1;
    $description=$description1;
    $path='/home/swapnil/Desktop/client/public/ALBUMS';
    if($_FILES['image'])
    {
        $img_path="$path/".$username."/".$name."/".$_FILES['image']['name'];
        if(move_uploaded_file($_FILES['image']['tmp_name'],$img_path))
        {
            echo json_encode(array("uploaded" => true, "path" => "./PROFILE/"."$name.$ext"));
        }
        else
        {
            echo json_encode(array("uploaded" => false));
        }
    }
    else
    {
        echo json_encode(array("uploaded" => true,"message"=>$query));
    }
?>
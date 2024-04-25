<?php
session_start();
include('connection.php');

if (isset($_POST["add_content"])) {
    
    $content = mysqli_real_escape_string($conn,$_POST['content']);
    $picture = mysqli_real_escape_string($conn,$_POST['fileImg[]']);
    
    $filesArray = [];

    foreach ($_FILES['fileImg']['tmp_name'] as $key => $tmpName) {
        $imageName = $_FILES["fileImg"]["name"][$key];
        $imageExtension = pathinfo($imageName, PATHINFO_EXTENSION);
        $newImageName = uniqid() . '.' . $imageExtension;


        move_uploaded_file($tmpName, './uploads/' . $newImageName);
        $filesArray[] = $newImageName;
    }

    $filesJson = json_encode($filesArray);


    $query = "INSERT INTO content (name, image) VALUES ('$name', '$filesJson')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Successfully Added');</script>";
    } else {
        echo "<script>alert('Error inserting data');</script>";
    }
}

?>
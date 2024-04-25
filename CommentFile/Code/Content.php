<?php
session_start();
include('connection.php');

if (isset($_POST["submit"])) {
    $name = mysqli_real_escape_string($conn, $_POST['content']);
    $user_id = $_SESSION['auth_user_id'];

    $filesArray = [];

    foreach ($_FILES['fileImg']['tmp_name'] as $key => $tmpName) {
        $imageName = $_FILES["fileImg"]["name"][$key];
        $imageExtension = pathinfo($imageName, PATHINFO_EXTENSION);
        $newImageName = uniqid() . '.' . $imageExtension;

        move_uploaded_file($tmpName, 'uploads/' . $newImageName);
        $filesArray[] = $newImageName;
    }

    $filesJson = json_encode($filesArray);

    $query = "INSERT INTO content_tb (user_id,content, image) VALUES ('$user_id','$name', '$filesJson')";

    if (mysqli_query($conn, $query)) {
        header('location:../index.php');
    } else {
        echo "<script>alert('Error inserting data');</script>";
    }
}

mysqli_close($conn);
?>

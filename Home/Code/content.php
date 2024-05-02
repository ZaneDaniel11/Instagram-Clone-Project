<?php
session_start();

include('connection.php');

if (isset($_POST['Load_Content'])) {
    $user_id = $_SESSION['auth_user_id'];
    $content_query = "SELECT c.content_id, c.user_id AS poster_id, u.name AS poster_name, c.content, c.created, c.image
    FROM content_tb c
    INNER JOIN users_tb u ON c.user_id = u.user_id
    WHERE c.user_id = '$user_id'
    UNION
    SELECT c.content_id, c.user_id AS poster_id, u_followers.name AS poster_name, c.content, c.created, c.image
    FROM content_tb c
    INNER JOIN follow_tb f ON c.user_id = f.followers_id
    INNER JOIN users_tb u_followers ON c.user_id = u_followers.user_id
    WHERE f.users_id = '$user_id'";
    $sql_connetion = mysqli_query($conn, $content_query);

    $array_result = [];

    if (mysqli_num_rows($sql_connetion) > 0) {
        foreach ($sql_connetion as $row) {

            array_push($array_result, ['content' => $row]);
        }
        header('Content-Type: application/json');
        echo json_encode($array_result);
    }
    else{
        echo $user_id;
    }
}

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
        header('location:../Home.php');
    } else {
        echo "<script>alert('Error inserting data');</script>";
    }
}

if (isset($_POST['submit_delete'])) {

    $delete_content = mysqli_real_escape_string($conn, $_POST['content']);

    $delete_sql = "DELETE FROM content_tb WHERE content_id = '$delete_content' ";

    $delete_connection = mysqli_query($conn, $delete_sql);

    if ($delete_connection) {
        echo 'yawa';
    }
    else
    {
        echo 'yawa';
    }
}



?>

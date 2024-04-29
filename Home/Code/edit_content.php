<?php
session_start();

include('connection.php');

// Assuming your database connection and session start are already included

var_dump($_POST); // Debugging output

if (isset($_POST["submit"])) {
    $contentId = mysqli_real_escape_string($conn, $_POST['content_id']);
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

    // Check if any files were uploaded
    if (!empty($filesArray)) {
        $query = "UPDATE content_tb SET content='$name', image='$filesJson' WHERE content_id='$contentId' AND user_id='$user_id'";
    } else {
        $query = "UPDATE content_tb SET content='$name' WHERE content_id='$contentId' AND user_id='$user_id'";
    }

    if (mysqli_query($conn, $query)) {
        echo "Content updated successfully!";
        // Additional logic if needed
    } else {
        echo "Error updating content: " . mysqli_error($conn);
    }
} else {
    echo "Submit button not detected.";
}
?>

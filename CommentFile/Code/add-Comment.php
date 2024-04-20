<?php
session_start();
include('connection.php');

if (isset($_POST['add_comment'])) {
    $msg = mysqli_real_escape_string($conn, $_POST['msg']);
    $user_id = $_SESSION['auth_user_id'];

    // Debugging: Output received data
    echo "Received msg: $msg, user_id: $user_id";

    // Use prepared statement to prevent SQL injection
    $query = "INSERT INTO comment_tb (user_id, msg) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'is', $user_id, $msg);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            echo "Comment Added Successfully";
        } else {
            echo "Comment not added. Something went wrong with the query execution: " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error in preparing the statement: " . mysqli_error($conn);
    }
} else {
    echo "No data received for adding comment.";
}
?>

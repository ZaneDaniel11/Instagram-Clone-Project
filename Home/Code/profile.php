<?php
include('connection.php');
session_start();

if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];

    // SQL query to fetch content along with user name
    $view_profile = "SELECT c.*, u.name AS user_name 
                     FROM content_tb c
                     JOIN users_tb u ON c.user_id = u.user_id
                     WHERE c.user_id = '$user_id'";
    $query_conn = mysqli_query($conn, $view_profile);

    $array_result = [];

    if (mysqli_num_rows($query_conn) > 0) {
        while ($row = mysqli_fetch_assoc($query_conn)) {
            array_push($array_result, ['content' => $row]);
        }
        header('Content-Type: application/json');
        echo json_encode($array_result);
    } else {
        echo json_encode(['error' => 'No content found for user ID: ' . htmlspecialchars($user_id)]);
    }
} else {
    echo json_encode(['error' => 'Invalid request']);
}
?>

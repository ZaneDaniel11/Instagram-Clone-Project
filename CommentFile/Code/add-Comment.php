<?php

session_start();
include('connection.php');

if (isset($_POST['comment_load_data'])) {
    $comments_query = "SELECT * FROM comment_tb";
    $comments_query_run = mysqli_query($conn, $comments_query);

    $array_result = [];

    if (mysqli_num_rows($comments_query_run) > 0) {
        foreach($comments_query_run as $row) {
            $user = $row['user_id'];

            $user_query = "SELECT * FROM users_db WHERE user_id ='$user' LIMIT 1";
            $user_query_run = mysqli_query($conn, $user_query);
    
            $user_result = mysqli_fetch_array($user_query_run);

            array_push($array_result, ['cmt'=>$row, 'user'=>$user_result]);
        }
        header('Content-type: application/json');
        echo json_encode($array_result);
    } else {
        echo json_encode(['error' => 'No comments found']);
    }
} elseif (isset($_POST['add_comment'])) {
    $msg = mysqli_real_escape_string($conn, $_POST['msg']);
    $user_id = $_SESSION['auth_user_id'];

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
    echo "Invalid request.";
}

// session_start();
// include('connection.php');

// if (isset($_POST['comment_load_data'])) {
//     $comments_query = "SELECT * FROM comment_tb";
//     $comments_query_run = mysqli_query($conn, $comments_query);

//     $array_result = [];

//     if (mysqli_num_rows($comments_query_run) > 0)
//      {
//             foreach($comments_query_run as $row)
//             {

//                 $user = $row['user_id'];

//                 $user_query = "SELECT * FROM users_db WHERE user_id ='$user' LIMIT 1";
//                 $user_query_run = mysqli_query($conn, $user_query);
        
//                 $user_result = mysqli_fetch_array($user_query_run);

//                 array_push($array_result, ['cmt'=>$row, 'user'=>$user_result]);
//             }
//             header('Content-type: application/json');

//             echo json_encode($array_result);
//     } 
    
//     else
//          {
//             echo "Give a comment";
//         }
    
// if (isset($_POST['add_comment'])) {

//     $msg = mysqli_real_escape_string($conn, $_POST['msg']);

//     $user_id = $_SESSION['auth_user_id'];

//     // Debugging: Output received data
//     echo "Received msg: $msg, user_id: $user_id";

//     // Use prepared statement to prevent SQL injection
//     $query = "INSERT INTO comment_tb (user_id, msg) VALUES (?, ?)";
//     $stmt = mysqli_prepare($conn, $query);

//     if ($stmt) {
//         mysqli_stmt_bind_param($stmt, 'is', $user_id, $msg);
//         $result = mysqli_stmt_execute($stmt);

//         if ($result) {
//             echo "Comment Added Successfully";
//         } else {
//             echo "Comment not added. Something went wrong with the query execution: " . mysqli_error($conn);
//         }
//         mysqli_stmt_close($stmt);
//     } else {
//         echo "Error in preparing the statement: " . mysqli_error($conn);
//     }
// } else {
//     echo "No data received for adding comment.";
// }
// }

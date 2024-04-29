<?php
session_start();
include('connection.php');

if(isset($_POST['comment_submit']))
{
    $content_id = mysqli_real_escape_string($conn,$_POST['content_id']);
    $comment = mysqli_real_escape_string($conn,$_POST['comment']);
    $user = $_SESSION['auth_user_id'];

    $insert_comment_sql = "INSERT INTO comment_tb (content_id,user_id,comment)VALUES('$content_id','$user','$comment')";

    $connection = mysqli_query($conn,$insert_comment_sql);
    
    if($connection)
    {
        echo 'inserted';
    }
    else
    {
        echo 'shit';
    }
    

}
?>
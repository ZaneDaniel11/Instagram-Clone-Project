<?php
 session_start();
  include('connection.php'); 

  if(isset($_POST['add_comment'])) {

    $msg = mysqli_real_escape_string($conn, $_POST['msg']);

    $user_id = $_SESSION['auth_user_id'];

    $query= "INSERT INTO comment_tb (user_id,msg) VALUES ('$user_id', '$msg')"; 
    $result = mysqli_query($conn, $query);

    if($result)

    {
        echo "Comment Added Successfully";
    }  else  
    {
        echo "Comment not added.! Something wert wrong";
    }
  }  
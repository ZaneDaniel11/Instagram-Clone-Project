<?php
    
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'data';

$conn = mysqli_connect($hostname,$username,$password,$database);

if($conn)
{
    echo'Connect succesfully';
}


?>
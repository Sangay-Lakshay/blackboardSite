<?php
    $server = "localhost";
    $user = "root";
    $password = "@2020Lab3";
    $db = "blackboard";

    $conn = mysqli_connect($server,$user,$password,$db);
    if(!$conn){
        die("Connection Failed ". mysqli_connect_error());
    }
?>


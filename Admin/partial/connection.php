<?php
    $host="localhost";
    $user="root";
    $password="";
    $db="books";

    $conn = mysqli_connect($host,$user,$password) or die("Couldn't connect");
    mysqli_select_db($conn,$db) or die(mysqli_error($conn));
?>

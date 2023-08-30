<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "books";

    $conn = mysqli_connect($host,$user,$password) or die('Error: Unable to connect with database, we will fix it shortly!');
    mysqli_select_db($conn,$db) or die(mysqli_error($conn));
?>
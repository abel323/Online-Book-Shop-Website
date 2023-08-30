<?php
    session_start();
    if(empty($_SESSION['user_name'])&&empty($_SESSION['password'])){
        header('Location: login.php');
    }
?>
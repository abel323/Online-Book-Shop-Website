<?php
    session_start();
    if(!empty($_SESSION['user_name']) && !empty($_SESSION['password'])){
        session_destroy();
        header('Location: ../login.php');
    }
?>
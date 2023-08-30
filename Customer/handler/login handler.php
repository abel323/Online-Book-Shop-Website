<?php
    session_start();
    if(isset($_POST['user_name']) and isset($_POST['password'])){
        include('../partial/connection.inc.php');
        $userName = mysqli_real_escape_string($conn,$_POST['user_name']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);

        $sql = "SELECT * FROM customers WHERE EMail='$userName' AND Password='$password'";
        
        $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));

        $final = mysqli_fetch_array($result);
        $_SESSION['EMail'] = $final['EMail'];
        $_SESSION['Password'] = $final['Password'];

        if($_SESSION['EMail']==$userName and $_SESSION['Password']==$password){
            echo "<script>window.location.href='../cart.php'; </script>";
        }
        else{
            echo "<script>window.location.href='../login.php'; </script>";
        }
    }
?>
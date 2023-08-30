<?php   
    include('../partial/connection.php');
    session_start();
    $user_name = mysqli_real_escape_string($conn,$_POST['user_name']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $_SESSION['user_name']=$user_name;
    $_SESSION['password']=$password;
    $sql="SELECT user_name,UPassword FROM tbluser WHERE user_name='$user_name' AND UPassword='$password'";
    $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
    $final = mysqli_fetch_array($result);

    if($_SESSION['user_name']!=$final['user_name']&&$_SESSION['password']!=$final['UPassword']){
        header('Location: ../login.php');
        session_destroy();
    }
    else{
        header('Location: ../index.php');
    }

?>

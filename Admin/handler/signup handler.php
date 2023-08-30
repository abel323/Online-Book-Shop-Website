<?php
    include('../partial/connection.php');
    if(isset($_POST['submit'])){
        if($_POST['Password']==$_POST['confPassword']){
            $user_name = $_POST['user_name'];
                $FName = $_POST['FName'];
                $LName = $_POST['LName'];
                $MName = $_POST['MName'];
                $dob = $_POST['dob'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $password = $_POST['Password'];
                $confPassword = $_POST['confPassword'];
            $sql = "INSERT INTO tbluser(user_name,FName,LName,MName,DOB,EMail,Phone,UPassword)
            VALUES('$user_name','$FName','$LName','$MName','$dob','$email','$phone','$password')";
            mysqli_query($conn,$sql) or die(mysqli_error($conn));
            echo "<p>Account Created Successfully!</p>";
            echo "<a href='../login.php'>Go back to login page!</a>"; 
        }
        else{
            echo "<script>alert('Password Did Not Match');</script>";
            header('Location: ../signup.php');
              
        }

    }
?>
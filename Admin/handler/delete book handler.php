<?php
    include('../partial/connection.php');
    if(isset($_POST['submit'])){
        $isbn = $_POST['isbn'];
        $sql = "DELETE FROM books WHERE isbn='$isbn'";
        $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
        if($result>0){
            echo "<script>alert('Success!');</script>";
            echo "<script>window.location.href='../index.php';</script>";
        }
        else{
            echo "<script>alert('Error!');</script>";
            echo "<script>window.location.href='../delete.php';</script>";
        }
    }
?>
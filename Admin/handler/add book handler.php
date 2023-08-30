<?php
    include('session.php');
    include('../partial/connection.php');
    $isbn = $_POST['isbn'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $price = $_POST['price'];
    $target = "../uploads/";
    $file_path = $target.basename($_FILES['file']['name']);
    $file_name = $_FILES['file']['name'];
    $file_temp = $_FILES['file']['tmp_name'];
    $file_store = "../../uploads/".$file_name;
    //move file
    move_uploaded_file($file_temp,$file_store);
    $sql = "INSERT INTO books(ISBN,Title,Author,Price,Book_Cover)VALUES('$isbn','$title','$author','$price','$file_path')";
    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    if($result>0){
        echo "<h1>Data Entry Detail</h1>";
        echo "<p>";
        echo "<br/>ISBN: ".$isbn;
        echo "<br/>Title: ".$title;
        echo "<br/>Author: ".$author;
        echo "<br/>Price: ".$price;
        echo "<br/>Image Path: ".$file_store."</p>";
        echo "<a href='../index.php'>Back to home page</a>";
    }
    else{
        echo "<script>alert('Can Not Add Book');</script>";
        header('Location: ../add new book.php');
    }
?>
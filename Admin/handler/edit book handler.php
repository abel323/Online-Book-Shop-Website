<?php
    include('../partial/connection.php');
    if(isset($_POST['submit'])){
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
        $sql = "UPDATE books SET Title='$title', Author='$author', Price='$price', Book_Cover='$file_path' WHERE ISBN='$isbn'";
        $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
        if($result>0){
            header('Location: ../index.php');
        }
        else{
            echo "<script>alert('Error!');</script>";
        }
    }
?>
<?php
    if(isset($_POST['submit'])){
        include('../partial/connection.inc.php');
        $isbn = $_POST['isbn'];
        $rating = $_POST['rating'];
        $comment = $_POST['comment'];
        $sql = "INSERT INTO book_reviews VALUES('$isbn','$comment','$rating')";
        $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
        if($result>0){
            header("Location: ../detail.php?id=".$isbn);
        }
    }
?>
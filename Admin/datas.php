<?php
    include('partial/connection.php');

    $total = 0;
    function totalCustomer() {
        $sql = "SELECT COUNT(*) AS Total FROM customer";
        $result = $conn->query($sql);
        $final = $result->fetch_assoc();
        $total = $final['Total'];
        return $total;
    }
?>
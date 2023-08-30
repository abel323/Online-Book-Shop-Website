<?php
    session_start();
    include('partial/connection.inc.php');
    if(isset($_SESSION['cart']) && isset($_SESSION['EMail']) && isset($_SESSION['Password'])){
        /*Fetch customer id using login session user name variable */
        $sql = "SELECT CustomerID FROM Customers WHERE EMail='".$_SESSION['EMail']."'";
        $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
        $final = mysqli_fetch_assoc($result);
        extract($final);
        $customer_id = $CustomerID;
        foreach($_SESSION['cart'] as $key=>$value){
            $isbn = $value['item_id'];
            $quantity = $value['quantity'];
            $total_price = $_SESSION['total'];
            $order_date = date("Y/m/d");

            $sql = "INSERT INTO orders(CustomerID,Amount,ODate)VALUES($customer_id,$total_price,'$order_date')";
            mysqli_query($conn,$sql) or die(mysqli_error($conn));

            $sql = "SELECT OrderID FROM orders ORDER BY OrderID DESC LIMIT 1;";
            $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
            $final = mysqli_fetch_assoc($result);
            $last_insert_id = $final['OrderID'];

            $sql = "INSERT INTO order_items(OrderID,ISBN,Quantity)VALUES($last_insert_id,'$isbn',$quantity)";
            mysqli_query($conn,$sql) or die(mysqli_error($conn));
            header("Location: paypal.php");
        }
    }
    else{
        header("Location: login.php");
    }
?>
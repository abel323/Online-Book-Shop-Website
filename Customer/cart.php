<?php
    session_start();
    include('partial/connection.inc.php'); 
?>
<!DOCTYPE html>
<html lang="en">
    <?php include('partial/head.php'); ?>
<body>
    <?php include('partial/header.php'); ?>
    <main>
        <table class="table table-striped">
            <thead>
                <tr class="bg-primary">
                <th scope="col" style="color:white">ISBN</th>
                <th scope="col" style="color:white">Title</th>
                <th scope="col" style="color:white">Quantity</th>
                <th scope="col" style="color:white">Price</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $total = 0;
                    if(isset($_SESSION['cart'])){
                        foreach($_SESSION['cart'] as $key=>$value){
                            $total = $total + $value['item_price'] * $value['quantity'];
                ?>
                <tr>
                <td scope="row"><?php echo $value['item_id']; ?></td>
                <td><?php echo $value['item_name']; ?></td>
                <td><?php echo $value['quantity']; ?></td>
                <td><?php echo $value['item_price']; ?></td>
                </tr>
                <?php }
                    }
                    $_SESSION['total'] = $total;
                ?>
            </tbody>
            <tfoot>
                <tr class="bg-success">
                    <td colspan="2" style="color:white">Total Price: </td>
                    <td colspan="2" style="color:white">$<?php echo $total; ?></td>
                </tr>
                <tr>
                    <td colspan="4">
                        <button class="btn btn-success" onclick="location.href='checkout.php'" type="submit">Proceed Check Out With Paypal</button>
                    </td>
                </tr>
            </tfoot>
        </table>
    </main>
    <?php include('partial/footer.php'); ?>
</body>
</html>
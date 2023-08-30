<?php
    include('handler/session.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include('partial/head.php'); ?>
    </head>
    <body>
        <?php include('partial/header.php');?>

        <?php include('partial/aside.php');?>
        <main>
            <div class="container">
                <div class="grid-container">
                    <div class="item">
                        <h2>Total books</h2>
                    </div>
                    <div class="item">
                        <?php
                                include('partial/connection.php');
                                $total = 0;
                
                                    $sql = "SELECT COUNT(*) AS Total FROM customers";
                                    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
                                    $final = $result->fetch_assoc();
                                    $total = $final['Total'];
                                    
                                
                         ?>
                        <h2>Total Customers <?php echo $total; ?></h2>
                    </div>
                    <div class="item">
                        <h2>Total Orders</h2>
                    </div>
                </div>
            </div>
        </main>
        <?php include('partial/footer.php'); ?>
    </body>
</html>
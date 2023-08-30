<?php include('handler/session.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <?php include('partial/head.php'); ?>
    </head>
    <body>
        <?php include('partial/header.php'); ?>
        <?php include('partial/aside.php'); ?>

        <main>
            <nav class="navbar navbar-light bg-light">
                <form class="form-inline" method="post" action="order list.php">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search">Search</button>
                </form>
            </nav>
            <div class="data-table">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">City</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone</th>
                    <th scope="col">E-Mail</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Total</th>
                    <th scope="col">Edit/Delete/Approve/Process</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include('partial/connection.php');
                        if(!isset($_POST['search'])){
                            $sql = "SELECT * FROM orderview";
                            $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
                            while($row=mysqli_fetch_assoc($result)){
                                extract($row);
                    ?>
                    <tr>
                        <th scope="row"><?php echo $OrderID; ?></th>
                        <td><?php echo $Name; ?></td>
                        <td><?php echo $City; ?></td>
                        <td><?php echo $Address; ?></td>
                        <td><?php echo $Phone; ?></td>
                        <td><?php echo $EMail; ?></td>
                        <td><?php echo $ODate; ?></td>
                        <td><?php echo $Amount; ?></td>
                        <td></td>
                        <td> <a href="#"><button type="submit" name="edit" class="btn btn-outline-success">Edit</button></a>
                            <a href="#"><button type="submit" name="delete" class="btn btn-outline-danger">Delete</button></a>
                            <a href="#"><button type="submit" name="edit" class="btn btn-outline-info">Approve</button></a>
                            <a href="#"><button type="submit" name="delete" class="btn btn-outline-warning">Process</button></a>
                            <a href="#"><button type="submit" name="delete" class="btn btn-outline-dark">Detail</button></a>
                        </td>
                    </tr>
                    <?php }
                        }
                    ?>
                </tbody>
            </table>
        </main>
        <?php include('partial/footer.php'); ?>
    </body>
</html>
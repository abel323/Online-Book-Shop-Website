<!DOCTYPE html>
<html lang="en">
    <?php include('partial/head.php'); ?>
<body>
    <?php include('partial/header.php'); ?>
    <main>
        <div class="container">
            <div class="grid">
                <?php include('partial/connection.inc.php');
                    if(isset($_POST['search'])){
                        $search_term = $_POST['search_term'];
                        $sql = "SELECT * FROM books WHERE Title LIKE'%$search_term%'";
                        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        while($row = mysqli_fetch_assoc($result)){
                            extract($row)
                 ?>
                 <div class="items">
                    <div class="img">
                        <img src="<?php echo $Book_Cover; ?>" alt="<?php echo $Title; ?>" height="100" width="100">
                    </div>
                    <div class="description">
                        <h4><?php echo $Title; ?></h4>
                        <p>Price: $<?php echo $Price; ?></p>
                    </div>
                    <hr/>
                    <div class="link">
                        <a href="detail.php?id=<?php echo $ISBN; ?>">Details</a>
                    </div>
                </div>
                <?php }
                    }
                    else{
                        $sql = "SELECT * FROM books";
                        $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
                        while($row=mysqli_fetch_assoc($result)){
                            extract($row);
                ?>
                <div class="items">
                    <div class="img">
                        <img src="<?php echo $Book_Cover; ?>" alt="<?php echo $Title; ?>" height="100" width="100">
                    </div>
                    <div class="description">
                        <h4><?php echo $Title; ?></h4>
                        <p>Price: $<?php echo $Price; ?></p>
                    </div>
                    <hr/>
                    <div class="link">
                        <a href="detail.php?id=<?php echo $ISBN; ?>">Details</a>
                    </div>
                </div>
                <?php }
                    } 
                ?>
            </div>
        </div>
    </main>
    <?php include('partial/footer.php'); ?>
</body>
</html>
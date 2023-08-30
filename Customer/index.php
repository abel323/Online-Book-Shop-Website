<?php ?>
<!DOCTYPE html>
<html lang="en">
    <?php include('partial/head.php'); ?>
<body>
    <?php include('partial/header.php'); ?>
    <main>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img class="d-block w-100" src="Images/images.jpg" alt="First slide" height="500" width="300">
                </div>
                <div class="carousel-item">
                <img class="d-block w-100" src="Images/images2.jpg" alt="Second slide" height="500" width="300">
                </div>
                <div class="carousel-item">
                <img class="d-block w-100" src="Images/images3.jpg" alt="Third slide" height="500" width="300">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <hr/>
        <div class="container">
            <div class="grid">
                <?php
                    include('partial/connection.inc.php');
                    $sql = "SELECT * FROM books LIMIT 12";
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
                <?php } ?>
                
            </div>
        </div>
    </main>
    <?php include('partial/footer.php'); ?>
</body>
</html>
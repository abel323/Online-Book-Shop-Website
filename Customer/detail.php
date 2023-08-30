<!DOCTYPE html>
<html lang="en">
    <?php include('partial/head.php'); ?>
<body>
    <?php include('partial/header.php'); ?>
    <main>
        <div class="details_view">
            <?php 
                include('partial/connection.inc.php');
                if(isset($_GET['id'])){
                    $isbn = $_GET['id'];
                    $sql = "SELECT * FROM books WHERE ISBN='$isbn';";
                    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
                    $final = mysqli_fetch_assoc($result);
                    extract($final);
                }
            ?>
            <div class="img_view_detail">
                <image src="<?php echo $Book_Cover; ?>" alt="<?php echo $Title; ?>" height="400" width="300"/>
            </div>
            <div class="details">
                <h3><b>Title: </b><?php echo $Title; ?></h3>
                <p><b>ISBN: </b><?php echo $isbn; ?></p>
                <p><b>Autor: </b><?php echo $Author; ?></p>
                <p><b>Price: </b>$<?php echo $Price; ?></p>
                <div class="action">
                    <button class="btn btn-primary" onclick="location.href='handler/cart handler.php?cart_id=<?php echo $ISBN?>&cart_name=<?php echo $Title;?>&cart_price=<?php echo $Price; ?>'">Add To Cart</button>
                </div>
            </div>
        </div>
        <div class="review">
            <form action="handler/rating.php" method="post">
                <input type="hidden" name="isbn" value="<?php echo $_GET['id'];?>">
                <div class="row">
                <p>Rating: </p>
                <select name="rating">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                </div>
                <div class="row">
                    <p>Comment: </p>
                    <textarea name="comment" height="300" width="500">Comment</textarea>
                </div>
                <div class="row">
                    <button type="submit" name="submit" class="btn btn-success">Submit Review</button>
                </div>
            </form>
        </div>
    </main>
    <?php include('partial/footer.php'); ?>
</body>
</html>
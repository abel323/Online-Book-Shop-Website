<?php include('handler/session.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <?php include('partial/head.php');?>
    </head>
    <body>
        <?php include('partial/header.php'); ?>
        <?php include('partial/aside.php'); ?>
        <main>
            <form action="search book.php" method="post">
            <div class="input-group">
                <div class="form-outline">
                <input type="search" name="search_term" id="form1" class="form-control" placeholder="Search"/>
            </div>
            <button type="submit" name="search_book" class="btn btn-primary">
                Search
            </button>
            </form>
            </div>
            <div class="data-table">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">ISBN</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Price</th>
                    <th scope="col">Cover Image</th>
                    <th scope="col">Edit/Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $counter = 0;
                        if(!isset($_POST['search_book'])){
                            include('partial/connection.php');
                            
                            $sql = "SELECT * FROM books";
                            $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
                            while($row=mysqli_fetch_assoc($result)){
                                extract($row);
                                $counter++;
                    ?>
                    <tr>
                        <th scope="row"><?php echo $ISBN; ?></th>
                        <td><?php echo htmlspecialchars($Title); ?></td>
                        <td><?php echo $Author; ?></td>
                        <td><?php echo $Price; ?></td>
                        <td><img src="<?php echo $Book_Cover; ?>" height="100" width="100" alt="<?php echo $Title?>"/></td>
                        <td>
                            <a href="edit.php?id=<?php echo $ISBN; ?>"><button type="submit" name="edit" class="btn btn-success">Edit</button></a>
                            <a href="delete.php?id=<?php echo $ISBN; ?>"><button type="submit" name="delete" class="btn btn-danger">Delete</button></a>
                        </td>
                    </tr>
                    <?php }
                        }
                        else{
                            include('partial/connection.php');
                            $search_term = $_POST['search_term'];
                            $sql = "SELECT * FROM books WHERE Title LIKE '%$search_term%'";
                            $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
                            while($row = mysqli_fetch_array($result)){
                                extract($row);
                                $counter++;
                            ?>
                            <tr>
                        <th scope="row"><?php echo $ISBN; ?></th>
                        <td><?php echo htmlspecialchars($Title); ?></td>
                        <td><?php echo $Author; ?></td>
                        <td><?php echo $Price; ?></td>
                        <td><img src="<?php echo $Book_Cover; ?>" height="100" width="100"/></td>
                        <td>
                            <a href="edit.php?id=<?php echo $ISBN; ?>"><button name="edit" class="btn btn-success">Edit</button></a>
                            <a href="delete.php?id=<?php echo $ISBN; ?>"><button name="delete" class="btn btn-danger">Delete</button></a>
                        </td>
                    </tr>
                    <?php }
                        }?>
                </tbody>
            </table>
            <p>Total Books Found: <?php echo $counter; ?></p>
            </div>
        </main>
        <?php include('partial/footer.php'); ?>
    </body>
</html>
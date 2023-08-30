<?php 
include('handler/session.php'); 
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include('partial/head.php'); ?>
        <script type="text/javascript">
            function validate(form){
                var returnFlag = true;
                var ISBN = document.form.isbn.value;
                var title = document.form.title.value;
                var author = document.form.title.value;
                var price = parseInt(document.form.title.value); 
                
                
                if(ISBN.length<9 || title.length<3 || price<=0){
                    returnFlag=false;
                    alert('Please Enter Valid ISBN and Title and Price');
                }
                else{
                    returnflag = true;
                }

                return returnFlag;
            }
        </script>
    </head>
    <body>
        <?php include('partial/header.php'); ?>
        <?php include('partial/aside.php'); ?>
        <!--Main -->
        <main>
            <?php
                include('partial/connection.php');
                $isbn = $_GET['id'];
                $sql = "SELECT * FROM books WHERE ISBN='$isbn'";
                $result = mysqli_query($conn,$sql) or die(mysqli_error($conn)); 
                $row = mysqli_fetch_assoc($result);
                extract($row);
            ?>
            <div class="container">
                <div class="row">
                <div class="col-sm"></div>
                    <div class="col-sm-14">
                    <form action="handler/edit book handler.php" method="post" enctype="multipart/form-data" onsubmit="validate(this)">
                        <div class="form-group row">
                            <label for="isbn" class="col-sm-2 col-form-label">ISBN: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="ISBN" id="isbn" value="<?php echo $ISBN; ?>" name="isbn">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 control-form-label">Title: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Title" id="title" value="<?php echo $Title; ?>" name="title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="author" class="col-sm-2 control-form-label">Author: </label>
                            <div class="col-sm-10">
                                <input type="text" name="author" id="author" placeholder="Author" value="<?php echo $Author;?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-sm-2 control-label">Price: </label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="price" name="price" value="<?php echo $Price;?>" placeholder="Price">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cover-image" class="col-sm-2 control-label">Cover Image: </label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="cover-image" value="<?php echo $Book_Cover;?>" name="file" placeholder="Image">
                            </div>
                        </div>
                        <div class="col-sm-10">
                            <button type="submit" name="submit" class="btn btn-success">Edit</button>
                        </div>
                    </form>
                    </div>
                    <div class="col-sm"></div>
            </div>
            </div>
        </main>
        <?php include('partial/footer.php'); ?>
    </body>
</html>
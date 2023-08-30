<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Login Form</title>
</head>
<body>
<form action="handler/login handler.php" method="post">
<div class="container text-center">
  <div class="row">
    <div class="col"></div>
    <div class="col-md-9">
    <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">User Name: </label>
    <div class="col-sm-10">
      <input type="text" required name="user_name" class="form-control" id="inputEmail3">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Password: </label>
    <div class="col-sm-10">
      <input type="password" name="password" required class="form-control" id="inputPassword3">
    </div>
  </div>
  <button type="submit" class="btn btn-success">Sign in</button>
  <br/>
  <label class=@col-sm-2 col-form-label>You dont have account?<a href="signup.php">Sign Up Here.</a></label>
    </div>
    <div class="col">
    </div>
  </div>
</div>
  
</form> 

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
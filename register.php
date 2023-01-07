<?php
require_once "config.php";

$username= $password = $confirm_password = "";
$username_err= $password_err =$confirm_password_err ="";
if($_SERVER['REQUEST_METHOD']=="POST"){
    //Check if username is empty
    if(empty(trim($_POST["username"]))){
    $username_err= "Username cannot be blank";   
    }
    else{
        $sql= "SELECT id FROM users WHERE username = ?";
        $stmt= mysqli_prepare($conn,$sql);
        if($stmt){
            mysqli_stmt_bind_param($stmt, "s" ,$param_username);
            //Set the value of para, username
            $param_username=trim($_POST['username']);
            //Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt)==1)
                {
                    $username_err ="This username is already taken";
                }
                else{
                    $username= trim($_POST['username']);
                }
            }
            else{
                echo "something went wrong";
            }
        }
    }
    mysqli_stmt_close($stmt);

//check for password
if(empty(trim($_POST['password']))){
    $password_err = "Password cannot be blank";
}
elseif(strlen(trim($_POST['password']))<5){
    $password_err="Password cannot be less than 5 characters";
}
else{
    $password = trim($_POST['password']);
}
//check for confirm password
if(trim($_POST['password'])!= trim($_POST['confirm_password']))
{
    $password_err="Passwords should match";
}
   

//If there were no errors, go ahead and insert into the database
if(empty($username_err)&& empty($password_err)&& empty($confirm_password_err))
{
    $sql = "INSERT INTO users (username ,password) VALUES(?,?)";
   $stmt = mysqli_prepare($conn, $sql);
    if($stmt)
    {
        mysqli_stmt_bind_param($stmt,"ss", $param_username,$param_password);

        //Set these parameters
        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT);

        //Try to execute the query
        if(mysqli_stmt_execute($stmt))
        {
            header("location: login.php");
            exit;
        }
        else{
            echo "Something went wrong";
        }
    }
    mysqli_stmt_close($stmt);
}  
mysqli_close($conn);



}
?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>login system</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-darks bg-dark">
        <a class="navbar-brand" href="#">login system</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
               
            </ul>
<div class="navbar-collapse colapse">
<ul class="navbar-nav ml-auto">
<li class="nav-item active">
                    <a class="nav-link" href="#"><img src="https://img.icons8.com/windows/30/user.png" alt=""></a>
                </li>
</ul>
</div>
        </div>
    </nav>
<div class="container mt-4">
    <h3>Register Here!</h3>
    <hr>
<form action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Confirm Password</label>
    <input type="password" class="form-control" name="confirm_password" id="exampleInputPassword1" placeholder="Confirm Password">
  </div>
  <div class="form-group">
    <label for="exampleInputAddress1">Address</label>
    <input type="address" class="form-control" id="exampleInputAddress1" placeholder="Enter Address">
  </div>
  <div class="form-group">
    <label for="exampleInputContact1">Contact Number</label>
    <input type="contact" class="form-control" id="exampleInputContact1" placeholder="Enter Contact Number">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
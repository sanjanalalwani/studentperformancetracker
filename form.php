<?php
define('DB_NAME', 'form');
$insert=false;
if(isset($_POST['name'])){
    //Set connection variables
     $server = "localhost";
     $username = "root";
     $password = "";
     

     //Create a db connection
     $con = mysqli_connect($server, $username, $password);

     //Check for connection success
     if(!$con){
        die("connection to this db failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $sql="INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    // echo $sql;

    //Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        //Flag for successful insertion
        $insert=true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }
    
    //Close the db connection
    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <img class="form" src="form.jpg" alt="Form">
    <div class="container">
        <h1>Welcome to Student Performance Tracker form</h3>
        <p>Enter your details and submit this form </p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="marks" id="marks" placeholder="Enter your JAVA marks">
            <input type="text" name="marks" id="marks" placeholder="Enter your DLCA marks">
            <input type="text" name="marks" id="marks" placeholder="Enter your DSGT marks">
            <input type="text" name="marks" id="marks" placeholder="Enter your DS marks">
            <input type="text" name="marks" id="marks" placeholder="Enter your MATH marks">
            <input type="text" name="marks" id="marks" placeholder="Enter your CG marks">
            <textarea name="desc" id="desc" cols="30" rows="6" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button> 
        </form>
    </div>
    <!-- <script src="index.js"></script> -->
</body>
</html>
<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!==true)
{
    header("location: login.php");
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
    <link rel="stylesheet" href="welcome.css">
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
                    <a class="nav-link" href="#"><img src="https://img.icons8.com/windows/30/user.png" alt=""><?php echo "Welcome ". $_SESSION['username']?></a>
                </li>
</ul>
</div>
        </div>
    </nav>
    <div class="container mt-4">
        <h3> <?php echo "Welcome ". $_SESSION['username']?>! You can now use this website</h3>
        <hr>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <div class="eventsbutton">
      <button class="events" id="myBtn1"> My Schedule </button>
      <script>
          document.getElementById("myBtn1").addEventListener("click", myFunction);
          function myFunction() {
              window.location.href = "calendar.html";
          }
      </script>
  </div>
  <div class="eventsbutton">
    <button class="events" id="myBtn2"> My Performance </button>
    <script>
        document.getElementById("myBtn2").addEventListener("click", myFunction);
        function myFunction() {
            window.location.href = "perf.html";
        }
    </script>
</div>
<div class="eventsbutton">
  <button class="events" id="myBtn3">Study Material</button>
  <script>
      document.getElementById("myBtn3").addEventListener("click", myFunction);
      function myFunction() {
          window.location.href = "assignment.html";
      }
  </script>
</div>
<hr>
    <footer>
        <p class="text-center"><a href="#"><img src="https://img.icons8.com/material-sharp/20/contact-card.png" alt=""></a>: 7977318761</p>
        <p class="text-center"><a href="#"><img src="https://img.icons8.com/ios/20/new-post.png" alt=""></a>: xyz@gmail.com</p>
        <p class="text-center"><a href="#"><img src="https://img.icons8.com/arcade/20/experimental-marker-arcade.png" alt=""></a>: Mumbai, India</p>
    </footer>
</body>
</html>
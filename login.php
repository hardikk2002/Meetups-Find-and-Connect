<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
if(isset($_SESSION['login']) && $_SESSION['login'] == true){
  header('location:http://localhost/meetups/showList.php');
  exit;
}
$showAlert = false;
$login = false;
if($_SERVER['REQUEST_METHOD'] == 'POST')
{ 
    include 'partials/_bdconnect.php';

    $email= $_POST['email'];
    $password = $_POST['password'];
    
    $sql;

  
    $sql = "SELECT * FROM usephp WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    
    if($result->num_rows > 0){
      $login = true;
      session_start();
      $_SESSION['login'] = true;
      $_SESSION['email'] = $email;
      $showAlert = false;
      header("Location:http://localhost/meetups/showList.php");
    }else{
      $showAlert = true;
    }
    
  // echo $sql;

  }
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <title>Register!</title>
</head>

<body>
  <?php require 'partials/_nav.php' ?>

  <?php 
    if($showAlert){
    echo '<div class="alert alert-info" role="alert">
            Invalid Credentials!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
    }
   ?>

  <div class="container">
    <h2 class="text-center  my-5"><strong>Let's meet Awesome minds 🙋😎</strong></h2>
    <form action="/meetups/login.php" method="post">
      <!-- enctype="multipart/form-data" -->
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="text" name="email" required class="form-control" id="exampleInputEmail1"
          aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" name="password" required class="form-control" id="exampleInputPassword1">
      </div>
      <button type="submit" class="btn btn-primary my-3 mb-5">Login</button>
    </form>
  </div>
  </div>


  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>
</body>

</html>
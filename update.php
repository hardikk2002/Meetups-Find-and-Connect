<?php
$showAlert = false;
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if(!isset($_SESSION['login']) || $_SESSION['login'] != true){
  // echo "hdu";
  $login = false;
  header('location: http://localhost/meetups/login.php');
  // exit;
}
include 'partials/_bdconnect.php';

$usermail = $_SESSION['email'];
$userInfo = "SELECT * FROM `usephp` WHERE email = '$usermail'";
$userInfoSub = mysqli_query($conn, $userInfo);


if($_SERVER['REQUEST_METHOD'] == 'POST')
{ 
    include 'partials/_bdconnect.php';

    $name = $_POST['name'];
    $email= $_POST['email'];
    $password = $_POST['password'];
    $userbio = $_POST['userbio'];
    $linkedin = $_POST['linkedin'];
    $github = $_POST['github'];
    $twitter = $_POST['twitter'];
    // $pic = $_FILES['pic'];

    // $filename = $pic['name'];
    // echo $filename;
    // $destination = 'uploads/'.$filename;
    // move_uploaded_file($pic['tmp_name'], $destination);
    // print_r $pic;
    $sql;
    $sql = "UPDATE `usephp` SET email = '$email', name = '$name', password = '$password', userbio = '$userbio', linkedin = '$linkedin', github = '$github', twitter = '$twitter'
     WHERE email = '$usermail'";
    
    if (mysqli_query($conn, $sql)) {
       $showAlert = false;
       header("Location:http://localhost/meetups/showList.php");
    } else {
      $showAlert=true;
      echo "Error updating record: " . $conn->error;
    }
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
              Error! Please try again
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
      }
   ?>

  <div class="container">
    <h2 class="text-center  my-5"><strong>Update your Awesome Card 🙋😎</strong></h2>
    <form action="/meetups/update.php" method="post" enctype="multipart/form-data">
      <!-- enctype="multipart/form-data" -->

      <?php if ($userInfoSub->num_rows > 0): ?>
      <?php while($array=mysqli_fetch_row($userInfoSub)): ?>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="text" value="<?php echo $array[2];?>" name="email" required class="form-control"
          id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="text" value="<?php echo $array[3];?>" name="password" required class="form-control"
          id="exampleInputPassword1">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Name</label>
        <input type="text" value="<?php echo $array[1];?>" name="name" required class="form-control"
          id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Small Intro</label>
        <input type="text" value="<?php echo $array[4];?>" name="userbio" required class="form-control"
          id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">LinkedIn Username</label>
        <input type="text" value="<?php echo $array[5];?>" name="linkedin" required class="form-control"
          id="exampleInputPassword1">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Github Username</label>
        <input type="text" value="<?php echo $array[6];?>" name="github" required class="form-control"
          id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Twitter Username</label>
        <input type="text" value="<?php echo $array[7];?>" name="twitter" required class="form-control"
          id="exampleInputPassword1">
      </div>
      <?php endwhile; ?>
      <?php else: ?>
      <h2 class="text-center my-5"><strong> No Record Found</strong></h2>
      <?php endif; ?>
      <!-- <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Profile Pic</label>
        <input type="file" name="pic" required class="form-control" id="exampleInputPassword1">
      </div> -->
      <button type="submit" class="btn btn-primary my-3 mb-5">Submit</button>
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
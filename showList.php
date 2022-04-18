<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$login = true;
session_start();
if(!isset($_SESSION['login']) || $_SESSION['login'] != true){
  // echo "hdu";
  $login = false;
  header('location: http://localhost/meetups/login.php');
  // exit;
}

include 'partials/_bdconnect.php';

$sql;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $query= $_POST['query'];
  $sql = "SELECT * FROM usephp WHERE userbio LIKE '%$query%' OR name LIKE '%$query%'";
}else{
  $sql = "SELECT * FROM usephp";
}
$result = mysqli_query($conn, $sql);


mysqli_close($conn);
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

  <title>Meetups!</title>
</head>

<body>
  <?php require 'partials/_nav.php' ?>

  <?php
    if($login == false)
      header('http://localhost/meetups/login.php');
   ?>
  <div class="container">
    <h2 class="text-center my-5"><strong> Let's meet and connect 🌈</strong></h2>
    <div>
      <div class="row row-cols-1 row-cols-md-3">
        <?php if ($result->num_rows > 0): ?>
        <?php while($array=mysqli_fetch_row($result)): ?>

        <!-- @foreach ($user as $u) -->

        <div class="col-md-4">
          <div class="card col-md-10 text-center mx-auto p-3 mb-5 bg-body rounded shadow border-0">
            <!-- <img src="{{asset('uploads/'.$u->pic)}}" class="mx-auto shadow rounded-circle" alt="..." width="130"
              height="120" style="border: 0px solid #a78bfa"> -->
            <div class="card-body" style="color:#a78bfa; ">
              <p style="font-size: 2rem;">👤</p>
              <h5 class="card-title fw-bolder"><?php echo $array[1];?></h5>
              <p class="card-text"><?php echo $array[4];?></p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item "><a href="http://github.com/<?php echo $array[5];?>"
                  class="text-decoration-none link-secondary" target="_blank">Github</a>
              </li>
              <li class="list-group-item"><a href="http://linkedin.com/in/<?php echo $array[6];?>"
                  class="text-decoration-none link-secondary" target="_blank">LinkedIn</a>
              </li>
              <li class="list-group-item"><a href="http://twitter.com/<?php echo $array[7];?>"
                  class="text-decoration-none link-secondary" target="_blank">Twitter</a>
              </li>
            </ul>
            <div class="card-body">
              <a class="btn shadow" href="mailto:<?php echo $array[2];?>"
                style="background-color:#a78bfa; color:white;">Send
                Mail</a>
            </div>
          </div>
        </div>
        <?php endwhile; ?>
        <?php else: ?>
        <h2 class="text-center my-5"><strong> No Record Found</strong></h2>
        <?php endif; ?>

      </div>
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
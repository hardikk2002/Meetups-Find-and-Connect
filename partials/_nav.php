<?php 
// session_start();
$loggedIn = false;
if(isset($_SESSION['login']) && $_SESSION['login'] == true){
  $loggedIn = true;
}


echo '<nav class="navbar navbar-expand-lg" style="background-color: #a78bfa; color: white;">
  <a class="navbar-brand fw-bolder" href="/meetups/showList.php" style="color: white;">Meetups!</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link active fw-bold" href="/meetups/showList.php" style="color: white;">Let`s Find</a>
      </li>';
    if(!$loggedIn){
      echo'<li class="nav-item">
          <a class="nav-link fw-bold" href="/meetups/register.php" style="color: white;">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bold" href="/meetups/login.php" style="color: white;">Login</a>
        </li>';
    }
    
    if($loggedIn){
      echo'
        <li class="nav-item">
          <a class="nav-link fw-bold" href="/meetups/update.php" style="color: white;">Update Card</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bold" href="/meetups/logout.php" style="color: white;">Logout</a>
        </li>
      </ul>';
    }
      echo '<span class="navbar-text fw-bolder mx-3">
        Find people, make connections!
      </span>';
    if($loggedIn){
      echo'
      <form class="form-inline my-2 my-lg-0" action="/meetups/showList.php" method="post">
        <input class="form-control me-2" name="query" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-dark" type="submit">Search</button>
      </form>';
    }
  echo '</div>
</nav>';


?>
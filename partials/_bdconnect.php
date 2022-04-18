<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "meetups";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// $sql;
// if($_SERVER['REQUEST_METHOD'] == 'POST'){
//   $query= $_POST['query'];
//   $sql = "SELECT * FROM usephp WHERE userbio LIKE '%$query%' OR name LIKE '%$query%'";
// }else{
//   $sql = "SELECT * FROM usephp";
// }
// $result = mysqli_query($conn, $sql);


// mysqli_close($conn);
?>
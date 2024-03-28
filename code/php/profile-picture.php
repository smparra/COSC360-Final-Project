<?php
 //fetches profile photo
include("configure.php");
$conn =  mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

if (mysqli_connect_errno()) {
  die("Connection failed: " . mysqli_connect_error());  
}
$email = $_GET['email'];
$sql = "SELECT photo FROM users WHERE email='$email'"; 
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  header("Content-Type: image/jpeg"); 
  echo $row['photo'];
} else {
  echo "No image found.";
}
$conn->close();
?>
<?php
 //fetches images to display products on home page
include("configure.php");
$conn =  mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

if (mysqli_connect_errno()) {
  die("Connection failed: " . mysqli_connect_error());  
}
$id = $_GET['id'];
$sql = "SELECT `Image` FROM `Products` WHERE `ProductID`='$id'"; 
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  header("Content-Type: image/jpeg"); 
  echo $row['Image'];
} else {
  echo "No image found.";
}
$conn->close();
?>
<?php
include("configure.php");

// Create connection
$conn =  mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

// Check connection
if (mysqli_connect_errno()) {
  die("Connection failed: " . mysqli_connect_error());  
}
$id = $_GET['id'];
$sql = "SELECT `Image` FROM `Products` WHERE `ProductID`='$id'"; // Replace <your_condition> with your actual condition
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the image data
    $row = $result->fetch_assoc();
    
    // Output the image
    header("Content-Type: image/jpeg"); // Adjust content type according to your image type
    echo $row['Image'];
} else {
    echo "No image found.";
}

// Close connection
$conn->close();
?>
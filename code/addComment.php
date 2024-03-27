<?php
  session_start();
  // connect to server
  include("configure.php");
  $conn =  mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
  if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());  
  }

  $fname = $_POST["inputFirstName"];
  $lname = $_POST["inputLastName"];
  $email = $_SESSION['email'];

?>
<?php
  session_start();
  // connect to server
  include("configure.php");
  $conn =  mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
  if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());  
  }

  $firstName = $_SESSION["fname"];
  $productID = $_SESSION['productID'];
  $comment = $_POST['comment'];

  // add comments
  if (!empty($_POST["comment"])){
    $sql = "INSERT INTO Feedback (firstName, ProductID, Comment) VALUES (?,?,?);";
    if($statement = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($statement, "sis", $firstName, $productID, $comment);
        mysqli_stmt_execute($statement);
        mysqli_close($conn);
    }
  }
  else{
    $errorMessage = "No comment added";
  }
?>
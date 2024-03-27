<?php
session_start();
// connect to server
include("configure.php");
$conn =  mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}

$inputName = $_POST["inputName"];
$inputEmail = $_POST["inputEmail"];

if (!empty($_POST["inputName"])){
  $sql = "SELECT firstName, lastName, email, permissions FROM users WHERE firstName = ? OR lastName = ?";
  if ($statement = mysqli_prepare($conn, $sql)) {
    mysqli_stmt_bind_param($statement, "ss", $inputName, $inputName);
    mysqli_stmt_execute($statement);
    mysqli_stmt_bind_result($statement, $fname, $lname, $email, $permissions); 
    mysqli_stmt_fetch($statement);
    mysqli_close($conn);
    // update session variable
    header("Location: ../account-page.php?successMessage=" . urlencode($successMessage));
    exit();
  }
}


?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
// connect to server
include("configure.php");
$conn =  mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}

// get values from signup form
$fname = $_POST["inputFirstName"];
$lname = $_POST["inputLastName"];
$email = $_SESSION['user'];

if (!empty($_POST["inputFirstName"]) && !empty($_POST["inputLastName"])){
  $sql = "UPDATE users SET firstName = ?, lastName = ? WHERE email = ?";
  if ($statement = mysqli_prepare($conn, $sql)) {
    mysqli_stmt_bind_param($statement, "sss", $fname, $lname, $email);
    mysqli_stmt_execute($statement);
    // update session variable
    $_SESSION['fname'] = $fname;
    $_SESSION['lname'] = $lname;
    $successMessage = "Name updated";
    header("Location: ../account-page.php?successMessage=" . urlencode($successMessage));
    exit();
}

}else{
  if (!empty($_POST["inputFirstName"])){
    $sql = "UPDATE users SET firstName = ? WHERE email = ?";
    if ($statement = mysqli_prepare($conn, $sql)) {
      mysqli_stmt_bind_param($statement, "ss", $fname, $email);
      mysqli_stmt_execute($statement);
      // update session variable
      $_SESSION['fname'] = $fname;
      $successMessage = "Name updated";
      header("Location: ../account-page.php?successMessage=" . urlencode($successMessage));
      exit();
    }
  }else{
    $sql = "UPDATE users SET lastName = ? WHERE email = ?";
    if ($statement = mysqli_prepare($conn, $sql)) {
      mysqli_stmt_bind_param($statement, "ss", $lname, $email);
      mysqli_stmt_execute($statement);
      // update session variable
      $_SESSION['lname'] = $lname;
      $successMessage = "Name updated";
      header("Location: ../account-page.php?successMessage=" . urlencode($successMessage));
      exit();
    }
  }
}
?>
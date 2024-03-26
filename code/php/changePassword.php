<?php
  session_start();
  // connect to server
  include("configure.php");
  $conn =  mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
  if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());  
  }

  // get values from signup form
  $pass = $_POST["inputPassword"];
  $hashpass = md5($pass);
  $email = $_SESSION['user'];

  $sql = "UPDATE users SET password = ? WHERE email = ?";
  if($statement = mysqli_prepare($conn, $sql)) {
    mysqli_stmt_bind_param($statement, "ss", $hashpass, $email);
    mysqli_stmt_execute($statement);

    $sucessMessage = "Password updated";
    header("Location: ../account-page.php?successMessage=".$sucessMessage);
    exit();
  }

?>
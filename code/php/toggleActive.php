<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  include("configure.php");
  $conn =  mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
  if (mysqli_connect_errno()) {
      die("Connection failed: " . mysqli_connect_error());
  }
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the SQL command from the form data
    if (isset($_POST['disable-email'])) {
        $email = $_POST['disable-email'];
        $sql = "UPDATE users SET active = 'False' WHERE email = '$email'";
        if ($statement = mysqli_prepare($conn, $sql)) {
          mysqli_stmt_execute($statement);
          mysqli_stmt_close($statement);
          header("Location:". $_SERVER['HTTP_REFERER']);
      }
    }
    if (isset($_POST['enable-email'])) {
      $email = $_POST['enable-email'];
      $sql = "UPDATE users SET active = 'True' WHERE email = '$email'";
      if ($statement = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_execute($statement);
        mysqli_stmt_close($statement);
        header("Location:". $_SERVER['HTTP_REFERER']);
      }
    }
  } else{
    header("Location:". $_SERVER['HTTP_REFERER']);
  }


?>
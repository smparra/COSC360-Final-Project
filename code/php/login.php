<!--- Handles form from login-page.php to verify if correct email and password were entered --->

<?php
  session_start();
  // connect to server
  include("configure.php");
  $conn =  mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
  if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());  
  }
  if ($_SERVER["REQUEST_METHOD"] != "POST") {
    $output = "<p>Server request method error</p>";
    exit($output);
  }
  $email = $_POST["inputEmail"];
  $enteredPass = $_POST["inputPassword"];
  $sql = "SELECT password, firstName, lastName, permissions, active FROM users WHERE email = ?";

  // preparing statement and fetching results
  if($statement = mysqli_prepare($conn, $sql)) {
    mysqli_stmt_bind_param($statement, "s", $email);
    mysqli_stmt_execute($statement);
    mysqli_stmt_bind_result($statement, $storedPass, $fname, $lname, $permissions, $isActive); 
    mysqli_stmt_fetch($statement);
    mysqli_close($conn);
    // check for password match and active account
    if(md5($enteredPass)===$storedPass){
      if ($isActive==="True"){
        $_SESSION["email"] = $email;
        $_SESSION["fname"] = $fname;
        $_SESSION["lname"] = $lname;
        $_SESSION["permissions"] = $permissions;

        header("Location: ../home-page.php");
        exit();
      }else{
        $errorMessage = "This user has been disabled";
        header("Location: ../login-page.php?errorMessage=" . urlencode($errorMessage));
        exit();
      }
    }
    else{
      $errorMessage = "Invalid email or password";
      header("Location: ../login-page.php?errorMessage=" . urlencode($errorMessage));
      exit();
    }
    mysqli_close($conn);
  }
?>
<!-- Used in signup.php page to check if user already exists in database, then submits user information to database -->
<!-- TO DO: add image upload feature -->

<?php
  session_start();

  // connect to server
  include("configure.php");
  $conn =  mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
  if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());  
  }

  // get values from signup form
  $firstName = $_POST["inputFirstName"];
  $lastName = $_POST["inputLastName"];
  $email = $_POST["inputEmail"];
  $pass = $_POST["inputPassword"];

  //image upload
  $maxBlobSize = 65000; 
  if(isset($_FILES["fileupload"])) {
    if ($_FILES['fileupload']['size'] > $maxBlobSize) {
      $errorMessage = "Image File Too Large";
      header("Location: ../signup-page.php?errorMessage=" . urlencode($errorMessage));
      exit();
    }else{
      $image = file_get_contents($_FILES["fileupload"]["tmp_name"]);
    }
  }else{
    $image = file_get_contents("../images/profile-photo.jpeg");
  }
  $hashPass = md5($pass);
  $permissions = "User"; // new users have "user" permissions by default
  $isActive = "True"; // user activated when account is created

  // check if user exists in database
  $sql = "SELECT * FROM users WHERE email = ?";
  if($statement = mysqli_prepare($conn, $sql)) {
      mysqli_stmt_bind_param($statement, "s", $email);
      mysqli_stmt_execute($statement);
      mysqli_stmt_store_result($statement);
      $nrows = mysqli_stmt_num_rows($statement);
      mysqli_stmt_close($statement); 
  }
  if($nrows>0){
    $errorMessage = "User already exists with provided email";
    header("Location: ../signup-page.php?errorMessage=" . urlencode($errorMessage));
    exit();
  }else{
    $sql = "INSERT INTO users VALUES (?,?,?,?,?,?,?);";
    if($statement = mysqli_prepare($conn, $sql)){
      mysqli_stmt_bind_param($statement, "sssssss", $firstName, $lastName, $email, $hashPass, $permissions, $isActive, $image);
      mysqli_stmt_execute($statement);
      mysqli_close($conn);
      $_SESSION["email"] = $email;
      $_SESSION["fname"] = $firstName;
      $_SESSION["lname"] = $lastName;
      $_SESSION["permissions"] = $permissions;
      header("Location: ../home-page.php"); 
      exit();
    }
  }
?>
  
<?php
  session_start();

  // connect to server
  include("configure.php");
  $conn =  mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
  if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());  
  }
  //image upload
  $maxBlobSize = 65000; 
  if($_FILES['fileupload']["error"] != UPLOAD_ERR_OK) {
    $fileErrorMessage = "No Image Uploaded";
    header("Location: ../account-page.php?fileErrorMessage=" . urlencode($fileErrorMessage));
    exit();
  }else{
    if ($_FILES['fileupload']['size'] > $maxBlobSize) {
      $fileErrorMessage = "Image File Too Large";
      header("Location: ../account-page.php?fileErrorMessage=" . urlencode($fileErrorMessage));
      exit();
    }else{
        // change image
        $photo = file_get_contents($_FILES["fileupload"]["tmp_name"]);
        $email = $_SESSION['email'];

        $sql = "UPDATE users SET photo = ? WHERE email = ?";
        if ($statement = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($statement, "ss", $photo, $email);
            mysqli_stmt_execute($statement);
            header("Location: ../account-page.php");
            exit();
        }
    }
  }



?>
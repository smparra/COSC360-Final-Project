<?php
session_start();
// connect to server
include("configure.php");
$conn =  mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}

// get values from signup form
$newEmail = $_POST["inputEmail"];
$currentEmail = $_SESSION['email'];

// Check if the new email is already in use
$sql = "SELECT * FROM users WHERE email = ?";
if ($statement = mysqli_prepare($conn, $sql)) {
    mysqli_stmt_bind_param($statement, "s", $newEmail);
    mysqli_stmt_execute($statement);
    mysqli_stmt_store_result($statement);
    $nrows = mysqli_stmt_num_rows($statement);
    mysqli_stmt_close($statement);
}

if ($nrows > 0 || $newEmail == $currentEmail) {
    $errorMessage = "User already exists with the provided email";
    header("Location: ../account-page.php?errorMessage=" . urlencode($errorMessage));
    exit();
} else {
    // Update the email address if it's not already in use
    $sql = "UPDATE users SET email = ? WHERE email = ?";
    if ($statement = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($statement, "ss", $newEmail, $currentEmail);
        mysqli_stmt_execute($statement);
        // update session variable
        $_SESSION['email'] = $newEmail;
        $successMessage = "Email updated";
        header("Location: ../account-page.php?successMessage=" . urlencode($successMessage));
        exit();
    }
}
?>
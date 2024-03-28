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
    function getProductDetails($conn, $productID){
            $sql = "SELECT * FROM Products WHERE ProductID = '$productID'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result)>0){
                $productDetails = $result->fetch_assoc();
                return $productDetails;
            }
            else{
                return null;
            }
    }
?>
<?php

include("configure.php");
$conn =  mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());  
}

$productID = $_GET['ProductID'];

$sql = "SELECT * FROM Feedback WHERE ProductID = '$productID'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
    while($row = $result->fetch_assoc()){ 
        $name = $row["firstName"];
        $comment = $row["Comment"];
        echo '<p> <strong>' .$name. '</strong> <small style="color:grey";> 2023-07-23</small><br>' .$comment. '</p>';
    }
}
else{
    echo '<p style="color:grey";> No comments found </p>';
}

mysqli_free_result($result);

?>
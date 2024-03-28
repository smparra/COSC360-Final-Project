<?php
include("php/getProductDetails.php");
include("php/viewComments.php");

$conn =  mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());  
}

if(isset($_GET['ProductID'])){
    $productID = $_GET['ProductID'];
    $productDetails = getProductDetails($conn,$productID);
} else {
    echo "Product ID not found in URL";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['comment']) && !empty($_POST['comment'])) {
        $firstName = $_SESSION["fname"];
        $comment = $_POST['comment'];
        
        $sql = "INSERT INTO Feedback (firstName, ProductID, Comment) VALUES (?,?,?);";
        $statement = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($statement, "sis", $firstName, $productID, $comment);
        mysqli_stmt_execute($statement);
        header("Location: {$_SERVER['PHP_SELF']}?ProductID=$productID");
        exit();
    } else {
        $errorMessage = "No comment added";
    }
}
?>


<!doctype html>

<html lang="en">
    <head>
        <title>Item | Parrot Pricing</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <!--Custom CSS-->
        <link rel="stylesheet" href="page-design.css">
    </head>

    <body>
        <header>
            <!--Navbar Start-->
            <nav class="navbar navbar-expand-lg" style="background-color:#D4E0B1">
                <div class="container-fluid">
                    <a class="navbar-brand" href="home-page.php">
                        <img src="images/parrot.png" alt="Logo" height="30" width="30" class="d-inline-block align-text-top">
                        Parrot Pricing
                    </a>
                    <!--When window shrinks, navbar has toggler-->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!--Search Form-->
                        <form class="d-flex ms-auto" role="search" method="get" action="search.php">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                        <!--Navbar Items (Login, Signup, Regions)-->
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <?php 
                                //if logged in, show dropdown, else login / sign up
                                if (isset($_SESSION['email'])){
                                    echo "
                                    <li class='nav-item'>
                                        <span class='nav-link'> Hello, ".$_SESSION['fname']."! </span>
                                    </li>
                                    <li class='nav-item dropdown'>
                                        <a class='nav-link dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                            Your Account
                                        </a>
                                    <ul class='dropdown-menu dropdown-menu-end'>
                                        <li><a class='dropdown-item' href='account-page.php'>Account Details</a></li>";
                                        if ($_SESSION['permissions'] === "Admin" ){
                                            echo "
                                            <li><hr class='dropdown-divider'></li>
                                            <li><a class='dropdown-item' href='admin-page.php'>Admin Settings</a></li>";
                                        }
                                        echo "
                                        <li><hr class='dropdown-divider'></li>
                                        <li><a class='dropdown-item' href='php/logout.php'>Logout</a></li>
                                    </ul>";
                                } else{
                                    echo 
                                    "<li class='nav-item'>
                                        <a class='nav-link' href='login-page.php'>Login</a>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link' href='signup-page.php'>Sign Up</a>
                                    </li>";
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <main style="min-height:85vh">
            <section>
                <h2 class="text-center my-4"><?php echo $productDetails['Name']?></h2>
                <div id="item-details" class="d-flex justify-content-center">
                    <img src="<?php echo 'php/image.php?id=' . $productDetails['ProductID']; ?>" style="width: 20%;" alt="">
                </div>
                <div id="item-details" class="d-flex justify-content-center">
                    <div class="w-50 text-success">
                        <br><h3 style = "text-align:center">Best Price: <?php echo $productDetails['Price']?></h3>
                    </div>
                </div>
                <?php
                if ($_SESSION["permissions"] === "User" || $_SESSION["permissions"] === "Admin"){
                    echo'
                    <div class="my-4 d-flex justify-content-center">
                    <div class="w-50">
                        <h5>Product Details</h5>
                        <table class="table table-striped">
                            <tbody>
                              <tr>
                                <th>Product group</th>
                                <td>'.$productDetails["Class"].'</td>
                              </tr>
                              <tr>
                                <th>Category</th>
                                <td>'.$productDetails["Category"].'</td>
                              </tr>
                              <tr>
                                <th>List price</th>
                                <td>'.$productDetails["Price"].'</td>
                              </tr>
                              <tr>
                                <th>Product ID</th>
                                <td>.'.$productDetails["ProductID"].'</td>
                              </tr>
                            </tbody>
                          </table>
                    </div>
                    </div>
                    <div class="my-4 d-flex justify-content-center">
                    <div class="w-50">
                        <h5>Comments</h5>
                        <h6><hr>Leave Feedback</h6>
                        <form method="post" action="'.$_SERVER['PHP_SELF'].'?ProductID='.$productID.'">
                            <div class="mb-3">
                                <input type="text" class="w-25 form-control" id="addComment" name="comment">
                            </div>
                            <button type="submit" id="commentButton" class="btn btn-primary">Comment</button>
                        </form>
                    </div>
                </div>
                <div class="my-4 d-flex justify-content-center">
                    <div class="w-50">';
                    viewComments($conn,$productID);
                }
                ?>
                    </div>
                </div>
            </section>
        </main>
        <footer>
            <p id="footer-home" class="d-flex justify-content-center pt-2" style="margin-bottom: 0; background-color:#D4E0B1">COSC 360 Project: Claire Costello & Segundo Parra</p>
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>

        <!--Chart.js Script-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
        <script src="scripts/priceTracker.js"></script>
    </body>
</html>

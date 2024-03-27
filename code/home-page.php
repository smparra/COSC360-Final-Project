<?php
session_start();
include("php/configure.php");
include("php/scrollableCards.php");
$conn =  mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
if (mysqli_connect_errno()) {
  die("Connection failed: " . mysqli_connect_error());  
}
?>
<!doctype html>
<html lang="en">
    <head>
        <title>Parrot Pricing</title>
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
        <!--Homepage Custom CSS-->
        <link rel="stylesheet" href="css/page-design.css">
    </head>

    <body>
        <header>
            <!--Navbar Start-->
            <nav class="navbar navbar-expand-lg">
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
                        <form class="d-flex ms-auto" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
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
        <main>
            <h1 class="text-center mt-4">Parrot Pricing</h1>
            <!--Scrollable Cards (Popular Items)-->
            <div class="popular-items mx-5 mt-5">
                <h4>Popular Items</h4>
                <p>Browse our Popular Items to see what items that have become staples in the Parrot Pricing community</p>
            </div>
            <?php scrollableCards($conn,'popular', NULL);?>
            <!--Scrollable Cards (Top Price Drop Items)-->
            <div class="price-drop-items mx-5 mt-5">
                <h4>Top Price Drop Items</h4>
                <p>Check out the Steepest Price Dropped items to uncover unbeatable deals on must-have items!</p>
            </div>
            <?php scrollableCards($conn, 'sale', NULL);?>
            <!--Scrollable Cards (Health & Beauty Items)-->
            <div class="price-drop-items mx-5 mt-5">
                <h4>Health & Beauty</h4>
                <p>Explore our Health and Beauty Collection to discover essential products that will elevate your self-care routine!</p>
            </div>
            <?php scrollableCards($conn, NULL, 'beauty');?>
        </main>
        <footer>
            <p id="footer-home" class="d-flex justify-content-center pt-2" style="margin-bottom: 0;">COSC 360 Project: Claire Costello & Segundo Parra</p>
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

        <!--JQuery-->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

        <!--Carousel Multiple Items-->
        <script src="scripts/scroll.js"></script>
    </body>
</html>

<!-- Close connection -->
<?php mysqli_close($conn);?>

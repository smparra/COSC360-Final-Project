<?php
session_start();
?>

<!doctype html>
<html lang="en">
    <head>
        <title>Account | Parrot Pricing</title>
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
                            <button id="search-button" class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                        <!--Navbar Items (Login, Signup, Regions)-->
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <?php 
                            //if logged in, show dropdown, else login / sign up
                            if (isset($_SESSION['user'])){
                                echo "
                                <li class='nav-item'>
                                    <span class='nav-link'> Hello, ".$_SESSION['fname']."! </span>
                                </li>
                                <li class='nav-item dropdown'>
                                    <a class='nav-link dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                        Your Account
                                    </a>
                                <ul class='dropdown-menu dropdown-menu-end'>
                                    <li><a class='dropdown-item' href='account-page.php'>Account Details</a></li>
                                    <li><hr class='dropdown-divider'></li>
                                    <li><a class='dropdown-item' href='php/logout.php'>Logout</a></li>
                                </ul>";
                            }
                        ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <main>
            <h2 class="mb-3" style="margin-left: 45%; margin-top:2em; padding-bottom:0.5em;">Change Account Details</h2>
            <div id="settings" class="d-flex justify-content-center">
                <div>
                    <img src="images/profile-photo.jpeg" alt="profile photo" height="100" width="100" style="margin-bottom:1em"><br>
                    <span>Claire Costello</span><br>
                    <span style="padding-right:1em">claire.cost.31@gmail.com</span>
                </div>
                <!--Vertical Divider-->
                <div class="vr mx-3"></div>
                <form class="w-25">
                <div class="mb-3 row">
                    <div class="col">
                      <label for="inputFirstName" class="form-label">New First Name</label>
                      <input type="text" class="form-control" id="inputFirstname">
                    </div>
                    <div class="col">
                        <label for="inputLastName" class="form-label">New Last Name</label>
                        <input type="text" class="form-control" id="inputLastname">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputEmail" class="form-label">New Email address</label>
                    <input type="email" class="form-control" id="inputEmail">
                </div>
                <div class="mb-3">
                    <label for="inputPassword" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="inputPassword">
                </div>
                <div class="mb-3">
                    <label for="inputConfirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="inputPassword">
                </div>
                <button type="submit" id="updateButton" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </main>
        <footer>
            <p id="footer-login" class="py-2" style="margin-bottom: 0;">COSC 360 Project: Claire Costello & Segundo Parra</p>
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
    </body>
</html>
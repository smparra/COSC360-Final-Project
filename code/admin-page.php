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
                    <a class="navbar-brand" href="#">
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
                                        <li><a class='dropdown-item' href='account-page.php'>Account Details</a></li>
                                        <li><hr class='dropdown-divider'></li>
                                        <li><a class='dropdown-item' href='php/logout.php'>Logout</a></li>";
                                        if ($_SESSION['permissions'] === "Admin" ){
                                            echo "
                                            <li><hr class='dropdown-divider'></li>
                                            <li><a class='dropdown-item' href='admin-page.php'>Admin Settings</a></li>";
                                        }
                                    echo "</ul>";
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
            <h2 class="d-flex justify-content-center" style= "margin-top:1em;">User Search</h2>
            <div id="settings" class="d-flex" style= 'margin-left: 25%; margin-top: 6% '>
              <div class="w-25">
                  <form method="post" action="" id="nameSearch" >
                      <div class="mb-3">
                          <label for="inputEmail" class="form-label">Search By Name (First or Last)</label>
                          <input type="email" class="form-control" name="inputEmail">
                      </div>
                      <button type="submit" id="updateButton" class="btn btn-primary">Search</button>
                  </form>
                  <form method="post" action="" id="emailSearch" >
                      <div class="mb-3">
                          <label for="inputEmail" class="form-label">Search By Email</label>
                          <input type="email" class="form-control" name="inputEmail">
                      </div>
                      <button type="submit" id="updateButton" class="btn btn-primary">Search</button>
                  </form>
              </div>
              <!--Vertical Divider-->
              <div class="vr mx-3 d-flex justify-content-center"></div>
              <div>
                <div class="mb-3 row align-items-center" style="border-style: solid; border-radius: 10px; border-color:lightgray; margin-left:1em">
                    <div class="col">
                      <img src="images/profile-photo.jpeg" alt="profile photo" height="100" width="100">
                    </div>
                    <div class="col" style="margin-top: 0%">
                        <?php
                        $email = $_SESSION['email'];
                        $fname = $_SESSION['fname'];
                        $lname = $_SESSION['lname'];
                        echo
                        '<br><span>'.$fname.' '.$lname.'</span><br>
                        <span>'.$email.'</span>
                        <button type="submit" id="updateButton" class="btn btn-primary">Disable User</button>
                        ';
                        ?>
                    </div>
                </div>
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

        <!--Validate User Entry-->
        <script type="text/javascript" src="scripts/changeAccount.js"></script>

    </body>
</html>
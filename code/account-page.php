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
        <main>
            <h2 class="mb-3 d-flex justify-content-center" style="margin-top:0.7em;">Change Account Details</h2>
            <?php 
            // displays success message if details are changed successfully
            if(isset($_GET['successMessage'])) { 
            $successMessage = $_GET['successMessage'];
            echo "<div style='color: green;' class='d-flex justify-content-center'>$successMessage</div><br/>"; 
            } 
            else{
                echo "<br><br>";
            }
          ?>
            <div id="settings" class="d-flex justify-content-center">
                <div>
                    <?php
                        $email = $_SESSION['email'];
                        $fname = $_SESSION['fname'];
                        $lname = $_SESSION['lname'];
                        
                        echo '<img src="php/profile-picture.php?email='.$email.'" alt="profile photo" height="100" width="100" style="margin-right:4em "><br>';
                        if ($_SESSION['permissions'] === "Admin" ){
                            echo "<br><div style='color: green;'>Admin</div>";
                        }
                        echo
                        '<span>'.$fname.' '.$lname.'</span><br>
                         <span style="padding-right:1em">'.$email.'</span><br><br>';
                    ?>
                <form method="post" action="php/changeProfilePic.php" enctype="multipart/form-data" id="mainForm">
                    <div class="mb-3">
                        <label for="fileToUpload" style="margin-bottom:0.5em;">Update Profile Photo:</label><br>
                        <input type="file" name="fileupload"/>
                    </div>
                    <button type="submit" id="signUpButton" class="btn btn-primary">Submit</button>   
                </form> 
                <?php
                if(isset($_GET['fileErrorMessage'])) { 
                $message = $_GET['fileErrorMessage'];
                echo "<div style='color: red;'>$message</div><br/>"; 
                }
                ?>
                </div>
                <!--Vertical Divider-->
                <div class="vr mx-3"></div>
                <div class="w-25">
                    <form method="post" action="php/changeName.php" id="changeName" >
                        <div class="mb-3 row">
                            <div class="col">
                                <label for="inputFirstName" class="form-label">New First Name</label>
                                <input type="text" class="form-control" name="inputFirstName">
                            </div>
                            <div class="col">
                                <label for="inputLastName" class="form-label">New Last Name</label>
                                <input type="text" class="form-control" name="inputLastName">
                            </div>
                            <div id="name-error" style="color: red; font-size: small"></div>
                        </div>
                        <button type="submit" id="updateButton" class="btn btn-primary">Update Name</button>
                    </form>
                    <form method="post" action="php/changeEmail.php" id="changeEmail" >
                        <div class="mb-3">
                            <label for="inputEmail" class="form-label">New Email address</label>
                            <input type="email" class="form-control" name="inputEmail">
                            <span id='email-error' style='color: red; font-size: small;'>
                            <?php 
                                // displays error message if account has already been registered with inputted email 
                                if(isset($_GET['errorMessage'])) { 
                                    $errorMessage = $_GET['errorMessage'];
                                    echo $errorMessage; }
                            ?>       
                            </span>
                                
                            
                        </div>
                        <button type="submit" id="updateButton" class="btn btn-primary">Update Email</button>
                    </form>
                    <form method="post" action="php/changePassword.php" id="changePassword" >
                        <div class="mb-3">
                            <label for="inputPassword" class="form-label">New Password</label>
                            <input type="password" class="form-control" name="inputPassword">
                            <div id="pass-error" style="color: red; font-size: small;"></div>
                        </div>
                        <div class="mb-3">
                            <label for="inputConfirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="confirmPassword">
                            <div id="confirmpass-error" style="color: red; font-size: small;"></div>
                        </div>
                        <button type="submit" id="updateButton" class="btn btn-primary">Update Password</button>
                    </form>
                </div>
            </div>
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

        <!--Validate User Entry-->
        <script type="text/javascript" src="scripts/changeAccount.js"></script>

    </body>
</html>
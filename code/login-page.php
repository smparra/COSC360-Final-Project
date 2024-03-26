<!doctype html>
<html lang="en">
  <head>
    <title>Login | Parrot Pricing</title>
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
                      <li class="nav-item">
                          <a class="nav-link" href="login-page.php">Login</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="signup-page.php">Sign Up</a>
                      </li>
                  </ul>
              </div>
          </div>
      </nav>
    </header>
    <main>
      <h2 class="text-center mb-4">Login</h2>
      <div id="login" class="d-flex justify-content-center">
        <form method="post" action="php/login.php" id="mainForm" class="w-25">
        <?php 
          // displays error message from registerUser.php if account has already been registered with inputted email 
            if(isset($_GET['errorMessage'])) { 
            $errorMessage = $_GET['errorMessage'];
            echo "<div style='color: red;'>$errorMessage</div><br/>"; 
            } 
          ?>
          <div class="mb-3">
            <label for="inputEmail" class="form-label">Email address</label>
            <input type="email" class="form-control" id="inputEmail" name="inputEmail">
            <div id="email-error" style="color: red;"></div>
          </div>
          <div class="mb-3">
            <label for="inputPassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="inputPassword" name="inputPassword">
            <div id="pass-error" style="color: red;"></div>
            <input type="checkbox" class="mx-1 my-3" onclick="showPassword()">Show Password
          </div>
          <button type="submit" class="btn btn-primary">Login</button>
          <hr><small id="loginHelp" class="d-flex mt-2 form-text text-muted justify-content-center">Create an account?<a href="signup-page.php" class="ms-1">Sign up</a></small>
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

    <!--JQuery-->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!--Carousel Multiple Items-->
    <script src="scripts/togglePassword.js"></script>

    <!--Validate User Entry-->
    <script type="text/javascript" src="scripts/login.js"></script>

  </body>
</html>

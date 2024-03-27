<!doctype html>

<!-- Connect to server -->
<?php
include("configure.php");
$conn =  mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

if (mysqli_connect_errno()) {
  die("Connection failed: " . mysqli_connect_error());
}
?>

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
                            <button id="search-button" class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                        <!--Navbar Items (Login, Signup, Regions)-->
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Region
                                </a>
                                <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Canada</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">United States</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Bermuda</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="signup.html">Sign Up</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="login.html">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="account.html">Account</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <main>
            <section>
                <h2 class="text-center my-4">Item Title</h2>
                <div id="item-details" class="d-flex justify-content-center">
                    <img src="images/apple-watch.jpg" style="width: 35rem;" alt="">
                </div>
                <div id="item-details" class="d-flex justify-content-center">
                    <div class="w-50 text-success">
                        <h3>Best Price:</h3>
                    </div>
                </div>
                <div id="price-tracker" class="my-4 d-flex justify-content-center">
                    <div class="w-50">
                        <form>
                            <h5>Create a price tracker</h5>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="text" class="form-control">
                                <button class="btn btn-outline-secondary" type="button" id="button-track">Track</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="my-4 d-flex justify-content-center">
                    <div class="w-50">
                        <h5>Price History</h5>
                        <canvas id="priceChart" style="height:25em;width:100%;max-width:100em"></canvas>
                    </div>
                </div>
                <div class="my-4 d-flex justify-content-center">
                    <div class="w-50">
                        <h5>Product Details</h5>
                        <table class="table table-striped">
                            <tbody>
                              <tr>
                                <th>Product group</th>
                                <td>1</td>
                              </tr>
                              <tr>
                                <th>Category</th>
                                <td>2</td>
                              </tr>
                              <tr>
                                <th>Manufacturer</th>
                                <td>3</td>
                              </tr>
                              <tr>
                                <th>Model</th>
                                <td>4</td>
                              </tr>
                              <tr>
                                <th>Locale</th>
                                <td>5</td>
                              </tr>
                              <tr>
                                <th>List price</th>
                                <td>6</td>
                              </tr>
                              <tr>
                                <th>EAN</th>
                                <td>7</td>
                              </tr>
                              <tr>
                                <th>UPC</th>
                                <td>8</td>
                              </tr>
                              <tr>
                                <th>SKU</th>
                                <td>9</td>
                              </tr>
                              <tr>
                                <th>Last update scan</th>
                                <td>10</td>
                              </tr>
                              <tr>
                                <th>Last tracked</th>
                                <td>11</td>
                              </tr>
                            </tbody>
                          </table>
                    </div>
                </div>
                <div class="my-4 d-flex justify-content-center">
                    <div class="w-50">
                        <h5><hr>Leave Feedback</h5>
                        <form method="post" action="addComment.php" id="addComment">
                            <div class="mb-3">
                                <input type="text" class="w-25 form-control" id="addComment" name="comment">
                            </div>
                            <button type="submit" id="commentButton" class="btn btn-primary">Comment</button>
                        </form>
                    </div>
                </div>
            </section>
        </main>
        <footer>
            <p id="footer-home" class="py-2" style="margin-bottom: 0;">COSC 360 Project: Claire Costello & Segundo Parra</p>
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

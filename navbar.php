<?php
include('Dbcon.php');
session_start();
if (!isset($_COOKIE['user_details'])) {
    // check if admin then redirect to admin page

    $user = unserialize($_COOKIE['user_details']);
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  
    <meta charset="utf-8">
    <title>USHA - CART</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <link rel="stylesheet" href="css/admin.css">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.0/dist/js.cookie.min.js"></script>

    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark" href="">FAQs</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Help</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Support</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-dark pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold">
                    <a href="index.php" class="logo"><img src="img/usha.png" alt="" class="img-fluid1"></a>
                </h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="shop.php">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search for products" value="<?php
                        if(isset($_GET['search'])){
                            echo $_GET['search'];
                        }
                        ?>">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <a href="cart.php" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge"><?php 
                    if(isset($_SESSION['cart'])){
    echo count($_SESSION['cart']);
} else { echo 0; }
                    ?></span>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid" style="z-index: 100">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown">FANS<i class="fa fa-angle-down float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                <a href="shop.php?category=Ceiling Fans" class="dropdown-item">Ceiling Fans</a>
                                <a href="shop.php?category=Pedestal Fans" class="dropdown-item">Pedestal Fans</a>
                                <a href="shop.php?category=Exhaust fans" class="dropdown-item">Exhaust fans</a>
                                <a href="shop.php?category=Box Fans" class="dropdown-item">Box Fans</a>
                                <a href="shop.php?category=Wall Fans" class="dropdown-item">Wall Fans</a>
                                <a href="shop.php?category=Table Fans" class="dropdown-item">Table Fans</a>
                            </div>
                        </div>

                            <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown">SEWING MACHINES<i class="fa fa-angle-down float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                <a href="shop.php?category=Industrial Sewing" class="dropdown-item">Industrial Sewing Machines</a>
                                <a href="shop.php?category=Domestic Sewing" class="dropdown-item">Domestic Sewing Machine</a>
        
                            </div>
                        </div>

                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown">KITCHEN ITEMS<i class="fa fa-angle-down float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                <a href="shop.php?category=Rice Cookers" class="dropdown-item">Rice Cookers</a>
                                <a href="shop.php?category=Mixer Grinders" class="dropdown-item">Mixer Grinders</a>
                                <a href="shop.php?category=Cooktops" class="dropdown-item">Cooktops</a>
                                <a href="shop.php?category=Electric Kettles" class="dropdown-item">Electric Kettles</a>
                                <a href="shop.php?category=Sandwich Toaster" class="dropdown-item">Sandwich Toaster</a>
        
                            </div>
                        </div>
                        <!-- <a href="" class="nav-item nav-link">Shirts</a>
                        <a href="" class="nav-item nav-link">Jeans</a>
                        <a href="" class="nav-item nav-link">Swimwear</a>
                        <a href="" class="nav-item nav-link">Sleepwear</a>
                        <a href="" class="nav-item nav-link">Sportswear</a>
                        <a href="" class="nav-item nav-link">Jumpsuits</a>
                        <a href="" class="nav-item nav-link">Blazers</a>
                        <a href="" class="nav-item nav-link">Jackets</a>
                        <a href="" class="nav-item nav-link">Shoes</a> -->
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><img src="img/usha.png" alt="" class="img-fluid1"></span></h1> 
                            </h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link">Home</a>
                            <a href="shop.php" class="nav-item nav-link">Shop</a>
                            <!-- <a href="detail.html" class="nav-item nav-link active">Shop Detail</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="cart.html" class="dropdown-item">Shopping Cart</a>
                                    <a href="checkout.html" class="dropdown-item">Checkout</a>
                                </div>
                            </div> -->
                            <a href="contact.php" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                            <?php 
                            if (!isset($_COOKIE['user_details'])) {
                            ?>
                            <a href="login.php" class="nav-item nav-link">Login</a>
                            <?php } else {
                                if(isset($_COOKIE["admin"])){
                                ?> 
                                <a href="admin/manage-admin.php" class="nav-item nav-link">Admin</a>
                            <?php
                                }
                            ?>
                            <a href="orders.php" class="nav-item nav-link">Orders</a>
                            <a href="logout.php" class="nav-item nav-link">Logout</a>
                            <?php }
                             ?>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->
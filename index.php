    <?php include('navbar.php'); ?>
    <div id="header-carousel" class="carousel slide" data-ride="carousel" style="z-index: 0">
        <div class="carousel-inner">
             <?php
            include('Dbcon.php');
            $sql_products='select * from product WHERE stock > 0 LIMIT 5';
            $products_r = mysqli_query($conn,$sql_products);
            $first = true;
            while($product_list = mysqli_fetch_array($products_r))
            {
                if($first){
            ?>
            <div class="carousel-item active" style="height: 410px;">
            <?php } else { ?>
            <div class="carousel-item" style="height: 410px;">
            <?php } ?>
                <img class="img-fluid" src="img/products/<?php echo $product_list['image']; ?>" alt="<?php echo $product_list['product_name']; ?>">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 700px;">
                        <h3 class="display-4 text-white font-weight-semi-bold mb-4"><?php echo $product_list['product_name']; ?></h3>
                         <a href="detail.php?item=<?php echo $product_list['id']; ?>" class="btn btn-light py-2 px-3">Shop Now</a>
                    </div>
                </div>
            </div>
            <?php $first = false; } ?>
        </div>
        <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
            <div class="btn btn-dark" style="width: 45px; height: 45px;">
                <span class="carousel-control-prev-icon mb-n2"></span>
            </div>
        </a>
        <a class="carousel-control-next" href="#header-carousel" data-slide="next">
            <div class="btn btn-dark" style="width: 45px; height: 45px;">
                <span class="carousel-control-next-icon mb-n2"></span>
            </div>
        </a>
    </div>


    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Top Products</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            <?php
            include('Dbcon.php');
            $sql_products='select * from product WHERE stock > 0 LIMIT 4';
            $products_r = mysqli_query($conn,$sql_products);
            while($product_list = mysqli_fetch_array($products_r))
            {
            ?>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="img/products/<?php echo $product_list['image']; ?>" alt="<?php echo $product_list['product_name']; ?>">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3"><?php echo $product_list['product_name']; ?></h6>
                        <div class="d-flex justify-content-center">
                            <h6>Rs. <?php echo $product_list['price']; ?></h6><h6 class="text-muted ml-2"><del></del></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="detail.php?item=<?php echo $product_list['id']; ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                        <a href="cart/addToCart.php?product_id=<?php echo $product_list['id']; ?>&quantity=1" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <!-- Products End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="" class="text-decoration-none">
                    <a href="index.php" class="logo"><img src="img/usha.png" alt="" class="img-fluid1"></a>
                    <!--<h1 class="mb-4 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border border-white px-3 mr-1">E</span>Shopper</h1> -->
                </a>
                <p> </p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Unit number 1210, 12th Floor, Maga One Building, No 200 Narahenpita Road, Nawala, Colombo 5</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>corporate@usha.lk</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i> 011-5533-111</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="index.php"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-dark mb-2" href="shop.php"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-dark" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-dark mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-dark mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                            <a class="text-dark mb-2" href="cart.html"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-dark mb-2" href="checkout.html"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-dark" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Newsletter</h5>
                        <form action="">
                            <div class="form-group">
                                <input type="text" class="form-control border-0 py-4" placeholder="Your Name" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control border-0 py-4" placeholder="Your Email"
                                    required="required" />
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block border-0 py-3" type="submit">Subscribe Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top border-light mx-xl-5 py-4">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-dark">
                    &copy; <a class="text-dark font-weight-semi-bold" href="#">USHA</a>. All Rights Reserved.
                    
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="img/payments.png" alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    
    <script src="js/main.js"></script>
</body>

</html>
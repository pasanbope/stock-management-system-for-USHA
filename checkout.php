<?php
 include('navbar.php'); 
    $subtotal = 0.00;
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {   
    // Retrieve the product details for the items in the cart
    $cartProducts = array();
    foreach ($_SESSION['cart'] as $item) {
        $productId = $item['product_id'];
        $quantity = $item['quantity'];

        $sql = "SELECT * FROM product WHERE id = $productId";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $product = mysqli_fetch_assoc($result);
            $product['quantity'] = $quantity;
            $cartProducts[] = $product;
        }
        // add to the subtotal
        $subtotal += $product['price'] * $quantity;
    }
    // Close the database connection
    mysqli_close($conn);
} else {
    // redirect to cart page
    header('Location: cart.php');
    exit();
}
?>
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Checkout</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Checkout Start -->
    <form action="processCheckout.php" method="post">
        <div class="container-fluid pt-5">
            <div class="row px-xl-5">
                <div class="col-lg-8">
                    <div class="mb-4">
                        <h6 class="font-weight-semi-bold mb-4">Billing Address</h6>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>First Name</label>
                                <input required class="form-control" name="name" type="text" placeholder="John"/>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>E-mail</label>
                                <input required class="form-control" name="email" type="email" placeholder="example@email.com"/>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Mobile No</label>
                                <input required class="form-control" name="phone" type="text" placeholder="+123 456 789"/>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Address</label>
                                <textarea required class="form-control" name="address" type="text" multiple rows="3" placeholder="123 Street">
                                </textarea>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>City</label>
                                <input required class="form-control" name="city" type="text" placeholder="New York"/>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>ZIP Code</label>
                                <input required class="form-control" name="zip" type="text" placeholder="123"/>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card border-secondary mb-5">
                        <div class="card-header bg-secondary border-0">
                            <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                        </div>
                        <div class="card-body">
                            <h6 class="font-weight-medium mb-3">Products</h6>
                            <?php 
                            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                            foreach ($cartProducts as $product) {
                                ?>
                            <div class="d-flex justify-content-between">
                                <p><?php echo $product['product_name']; ?> X <?php echo $product['quantity']; ?></p>
                                <p>Rs. <?php echo ($product['price'] * $product['quantity']); ?>.00</p>
                            </div>

                            <?php }} ?>
                        </div>
                        <div class="card-footer border-secondary bg-transparent">
                            <div class="d-flex justify-content-between mt-2">
                                <h6 class="font-weight-bold">Total </h6>
                                <h6 class="font-weight-bold">Rs. <?php echo $subtotal ; ?>.00</h6>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <p>Shipping </p>
                                <p>Rs. <?php echo  500; ?>.00 </p>
                            </div>
                        </div>
                        <!-- hidden input field for store subtotal -->
                        <input type="number" hidden name="subtotal" value="<?php echo ($subtotal + 500); ?>">
                        <div class="card-footer border-secondary bg-transparent">
                            <div class="d-flex justify-content-between mt-2">
                                <h6 class="font-weight-bold">Subtotal </h6>
                                <h6 class="font-weight-bold">Rs. <?php echo ($subtotal + 500) ; ?>.00</h6>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Payment</h4>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <div class="custom-control custom-radio">
                                
                                    <h6>Bank Transfer:</h6>
                                    <div class="font-weight-bold">
                                        Bank Name: [Enter Bank Name]
                                    </div>
                                    <div class="font-weight-bold">
                                        
                                        Account Holder: [Enter Account Holder Name]
                                    </div>
                                    <div class="font-weight-bold">
                                        
                                        Account Number: [Enter Account Number]
                                    </div>
                                    <p class="my-2" style="text-align:justify">  
                                    Once the transfer is complete, kindly send the receipt or proof of payment to [Enter Email Address]. We will process your order as soon as we receive the payment confirmation.
                                    <p>
                                </p>
                                </div>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <button type="submit" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Checkout End -->

    <?php include 'footer.php';?>
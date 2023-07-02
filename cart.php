<?php
 include('navbar.php'); 

$subtotal = 0.00;
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {   
    // Retrieve the product details for the items in the cart
    $cartProducts = array();
    foreach ($_SESSION['cart'] as $key => $item) {
        $productId = $item['product_id'];
        $quantity = $item['quantity'];

        // select all the products that have enough quantity
        $sql = "SELECT * FROM product WHERE id = $productId AND stock >= $quantity";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $product = mysqli_fetch_assoc($result);
            $product['quantity'] = $quantity;
            $cartProducts[] = $product;
        } else {
            // delete current item from session array
            unset($_SESSION['cart'][$key]);
        }
        // add to the subtotal
        if(isset($product['price'])){

            $subtotal += $product['price'] * $quantity;
        } 
    }
    // Close the database connection
    mysqli_close($conn);
}
?>


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shopping Cart</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <?php 
                        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                        foreach ($cartProducts as $product) {
                            ?>

                        <tr>
                            <td class="align-middle"><img src="img/products/<?php echo $product['image']; ?>" alt="" style="width: 50px;"> <?php echo $product['product_name']; ?></td>
                            <td class="align-middle">Rs. <?php echo $product['price']; ?></td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <a class="btn btn-sm btn-primary btn-minus" href="cart/minusCart.php?product_id=<?php echo $product['id']; ?>">
                                            <i class="fa fa-minus"></i>
                                        </a>
                                    </div>
                                    <input type="text" class="form-control form-control-sm bg-secondary text-center quantity-input" value="<?php echo $product['quantity']; ?>" readonly>
                                    <div class="input-group-btn">
                                        <a class="btn btn-sm btn-primary btn-minus" href="cart/plusCart.php?product_id=<?php echo $product['id']; ?>">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle total-amount">Rs. <?php echo ($product['quantity'] * $product['price'] ); ?></td>
                            <td class="align-middle"><a href="cart/removeCartItem.php?remove_product_id=<?php echo $product['id']; ?>" class="btn btn-sm btn-primary"><i class="fa fa-times"></i></button></td>
                        </tr>
                        <?php 
                        }} else {
                        ?> <tr><td colspan="5">Cart is empty</td></tr> <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">Rs. <?php echo $subtotal; ?></h6>
                        </div>
                        <div class="d-flex justify-content-between" >
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">Rs. 500</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h6 class="font-weight-bold">Total</h6>
                            <h6 class="font-weight-bold">Rs. <?php echo ($subtotal + 500); ?></h6>
                        </div>
                        <a class="btn btn-block btn-primary my-3 py-3" href="checkout.php">Proceed To Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->
    <?php include('footer.php'); ?>
<?php include 'navbar.php'; ?>

    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shop</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shop</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">


            <!-- Shop Product Start -->
            <div class="col-lg-12 col-md-12">
                <div class="row pb-43">
           
                    <?php
                    if(isset($_GET['search']) && isset($_GET['category'])){
                        $sqlproducts="select * from product where product_name like '%".$_GET['search']."%' and category='".$_GET['category']."' AND stock > 0";
                    }
                    else if(isset($_GET['search'])){
                        $sqlproducts = "select * from product where product_name like '%".$_GET['search']."%' AND stock > 0";
                    } else if (isset($_GET['category'])){
                        $sqlproducts="select * from product where category='".$_GET['category']."' AND stock > 0";
                    } 
                    else{
                        $sqlproducts="select * from product WHERE stock > 0";
                    }
                    $products = mysqli_query($conn,$sqlproducts);
                    // if product count is 0 then display no items found
                    if(mysqli_num_rows($products) == 0){
                        echo "<h3 class='text-center'>No Items Found</h3>";
                    }
                    while($item = mysqli_fetch_array($products)){   ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="img/products/<?php echo $item["image"]; ?>" alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3"><?php echo $item['product_name']; ?></h6>
                                <div class="d-flex justify-content-center">
                                    <h6>Rs.<?php echo $item['price']; ?></h6><h6 class="text-muted ml-2"><del><?php echo $item['price']+500; ?></del></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="detail.php?item=<?php echo $item['id']; ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                <a href="cart/addToCart.php?product_id=<?php echo $item['id']; ?>&quantity=1" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="col-12 pb-1">
                        <nav aria-label="Page navigation">
                          <ul class="pagination justify-content-center mb-3">
                            <li class="page-item disabled">
                              <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                              </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                              <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                              </a>
                            </li>
                          </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->


    <?php include 'footer.php'; ?>
<?php
 include('navbar.php'); 
if(isset($_GET['item'])){
    $item_id = $_GET['item'];
}
else{
    $item_id = 1;
}
$sql_subcat1="select * from product where id = '$item_id'";
$subcat_rc = mysqli_query($conn,$sql_subcat1);

$item = mysqli_fetch_array($subcat_rc);
?>


<input type="text" name="product_id" value="<?php  echo $item['id'];  ?>" readonly hidden>
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3"><?php echo $item['product_name']; ?></h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">subcat here</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        <div class="carousel-item active">
                            <img class="w-100 h-100"  src="img/products/<?php echo $item['image'] ?>" alt="Image">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold"><?php echo $item['product_name']; ?></h3>
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star-half-alt"></small>
                        <small class="far fa-star"></small>
                    </div>
                    <small class="pt-1">(50 Reviews)</small>
                </div>
                    <h3 class="font-weight-semi-bold mb-4">Rs. <?php echo $item['price']; ?></h3>
                    <p class="mb-4"><?php echo $item['short_description']; ?></p>
                <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="input-group quantity mr-3" style="width: 130px;">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-minus" >
                            <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="number" class="form-control bg-secondary text-center" name="quantity" value="1" max="<?php echo $item['stock']; ?>">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <button class="btn btn-primary px-3 my-3" type="submit" onclick="addToCart()">
                        <i class="fa fa-shopping-cart mr-1"></i> Add To Cart
                    </button>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Description</a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h3 class="mb-3">Description</h3>
                        <p><?php echo $item["description"] ?></p>

                        
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->
<script>
    function addToCart() {

        const productId = document.getElementsByName('product_id')[0].value;
        const quantity = document.getElementsByName('quantity')[0].value;

        window.location.href = `cart/addtoCart.php?product_id=${productId}&quantity=${quantity}`
    }
</script>
<?php
include 'footer.php';
?>
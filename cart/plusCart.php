<?php
session_start();

if (isset($_GET['product_id'])) {
    $productId = $_GET['product_id'];
    // Check if the product already exists in the cart
    $itemIndex = -1;
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $index => $item) {
            if ($item['product_id'] == $productId) {
                $itemIndex = $index;
                break;
            }
        }
    }

    if ($itemIndex !== -1) {
        // Product already exists in the cart, increase the quantity
        $_SESSION['cart'][$itemIndex]['quantity'] += 1;
    } 
}

// Redirect to the cart page
header("Location: ../cart.php");
exit;
?>

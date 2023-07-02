<?php
session_start();

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    // Check if the product ID to be removed is provided
    if (isset($_GET['remove_product_id'])) {
        $removeProductId = $_GET['remove_product_id'];

        // Remove the item from the cart in the session
        foreach ($_SESSION['cart'] as $index => $item) {
            if ($item['product_id'] == $removeProductId) {
                unset($_SESSION['cart'][$index]);
                break;
            }
        }
    }
}

// Redirect to the cart page
header("Location: ../cart.php");
exit;
?>

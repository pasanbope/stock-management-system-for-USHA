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
        // Product already exists in the cart, decrese the quantity
        $_SESSION['cart'][$itemIndex]['quantity'] -= 1;
    } 
     // If the quantity hits zero, remove the item from the cart
        if ($_SESSION['cart'][$itemIndex]['quantity'] <= 0) {
            unset($_SESSION['cart'][$itemIndex]);
            $_SESSION['cart'] = array_values($_SESSION['cart']); // Reset array keys
        }
}

// Redirect to the cart page
header("Location: ../cart.php");
exit;
?>

<?php
session_start();

if (isset($_GET['product_id']) && isset($_GET['quantity'])) {
    $productId = $_GET['product_id'];
    $quantity = $_GET['quantity'];

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
        $_SESSION['cart'][$itemIndex]['quantity'] += $quantity;
    } else {
        // Product does not exist in the cart, add a new entry
        $item = array(
            'product_id' => $productId,
            'quantity' => $quantity
        );
        $_SESSION['cart'][] = $item;
    }
}

// Redirect to the cart page
header("Location: ../cart.php");
exit;
?>

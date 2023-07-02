<?php 
    session_start();

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];

    $subtotal = $_POST['subtotal'];

    // get user details from cookie user_details
    $user_details = unserialize($_COOKIE['user_details']);

    include('Dbcon.php');
// insert order with subtotal and user id
    $stmt = $conn->prepare("INSERT INTO `order`(subtotal, userid) VALUES (?, ?)");
    $stmt->bind_param("si", $subtotal, $user_details['id']);

    // Execute the query
    $stmt->execute();

    // Get the ID of the inserted order
    $orderID = $conn->insert_id;
    
    // Loop through the cart products and insert into orderitem table with order id and product id and quantity then decrese the stock from product table
    foreach ($_SESSION['cart'] as $product) {
        $stmt = $conn->prepare("INSERT INTO `orderitem` VALUES (?, ?, ?)");
        $stmt->bind_param("iii", $orderID, $product['product_id'], $product['quantity']);
        $stmt->execute();

        $stmt = $conn->prepare("UPDATE `product` SET stock = stock - ? WHERE id = ?");
        $stmt->bind_param("ii", $product['quantity'], $product['id']);
        $stmt->execute();
    }
    // insert data into order details table with order id and other details
    $stmt = $conn->prepare("INSERT INTO `orderdetail` VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issssss", $orderID, $name, $email, $phone, $address, $zip, $city);
    $stmt->execute();


    // // Close the database connection
    mysqli_close($conn);

    // // Clear the cart
    unset($_SESSION['cart']);

    // redirect to home page 
    header('Location: orders.php');
    exit();
?>
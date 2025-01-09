<?php
session_start();

// Initialize the cart if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add the product to the cart
if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    // Add to cart only if not already in it
    if (!in_array($product_id, $_SESSION['cart'])) {
        $_SESSION['cart'][] = $product_id;
    }
}

// Redirect back to the referring page
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();
?>

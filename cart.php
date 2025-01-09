<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sneakerheads";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle Remove from Cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_id'])) {
    $remove_id = $_POST['remove_id'];
    if (($key = array_search($remove_id, $_SESSION['cart'])) !== false) {
        unset($_SESSION['cart'][$key]);
    }
    header("Location: cart.php");
    exit();
}

// Fetch Cart Items
$cart_products = [];
$total = 0;
if (!empty($_SESSION['cart'])) {
    $cart_ids = implode(",", $_SESSION['cart']);
    $sql = "SELECT * FROM products WHERE id IN ($cart_ids)";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $cart_products[] = $row;
            $total += $row['price'];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f8f9fa, #ffffff);
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .navbar {
            width: 100%;
            background: #2980b9;
            color: #fff;
            display: flex;
            justify-content: space-between;
            padding: 10px 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .navbar h1 {
            font-size: 24px;
        }
        .navbar a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            margin-left: 15px;
        }
        .cart-container {
            width: 100%;
            max-width: 800px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }
        .cart-container h2 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #2c3e50;
        }
        .cart-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 15px;
        }
        .cart-item img {
            width: 100px;
            height: 100px;
            border-radius: 10px;
        }
        .cart-item-details {
            flex: 1;
            margin-left: 20px;
        }
        .cart-item-details h3 {
            font-size: 20px;
            margin-bottom: 5px;
            color: #2c3e50;
        }
        .cart-item-details p {
            font-size: 14px;
            color: #7f8c8d;
        }
        .cart-item .price {
            font-size: 18px;
            font-weight: bold;
            color: #e74c3c;
        }
        .cart-item button {
            background: #e74c3c;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }
        .cart-item button:hover {
            background: #c0392b;
        }
        .total {
            font-size: 20px;
            margin-top: 20px;
            font-weight: bold;
            text-align: right;
            color: #2c3e50;
        }
        .checkout-btn {
            display: block;
            width: 100%;
            background: #2980b9;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            border-radius: 5px;
            margin-top: 20px;
            text-decoration: none;
            font-size: 18px;
        }
        .checkout-btn:hover {
            background: #3498db;
        }
    </style>
</head>
<body>
    <header class="navbar">
        <h1>SneakerHeads</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="cart.php">Cart</a>
            <a href="#">Shop</a>
            <a href="#">Contact</a>
            <a href="#">Profile</a>
        </nav>
    </header>

    <div class="cart-container">
        <h2>Your Cart</h2>
        <?php if (!empty($cart_products)): ?>
            <?php foreach ($cart_products as $product): ?>
                <div class="cart-item">
                    <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                    <div class="cart-item-details">
                        <h3><?php echo $product['name']; ?></h3>
                        <p><?php echo $product['description']; ?></p>
                    </div>
                    <p class="price">$<?php echo number_format($product['price'], 2); ?></p>
                    <form method="POST" style="margin-left: 15px;">
                        <input type="hidden" name="remove_id" value="<?php echo $product['id']; ?>">
                        <button type="submit">Remove</button>
                    </form>
                </div>
            <?php endforeach; ?>
            <p class="total">Total: $<?php echo number_format($total, 2); ?></p>
            <a href="checkout.php" class="checkout-btn">Proceed to Checkout</a>
        <?php else: ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>
    </div>
</body>
</html>

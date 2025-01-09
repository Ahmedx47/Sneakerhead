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

// Initialize the cart
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle Add to Cart logic
$success_message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    if (!in_array($product_id, $_SESSION['cart'])) {
        $_SESSION['cart'][] = $product_id;
        $success_message = "Product added to cart!";
    } else {
        $success_message = "Product is already in the cart.";
    }
}

// Fetch the product details
$product = null;
if (isset($_GET['product']) && !empty($_GET['product'])) {
    $product_name = urldecode($_GET['product']);
    $sql = "SELECT * FROM products WHERE name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $product_name);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        echo "<p style='color: red;'>Product not found.</p>";
        exit();
    }
} else {
    echo "<p style='color: red;'>No product specified.</p>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product ? $product['name'] : 'Product Details'; ?></title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f8f9fa, #ffffff);
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
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

        .cart-icon {
            display: flex;
            align-items: center;
            font-size: 20px;
            color: #fff;
            position: relative;
        }

        .cart-icon span {
            position: absolute;
            top: -5px;
            right: -10px;
            background: #e74c3c;
            color: #fff;
            font-size: 14px;
            padding: 2px 6px;
            border-radius: 50%;
        }

        .product-container {
            max-width: 800px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            gap: 20px;
            align-items: center;
            padding: 20px;
        }

        .product-image img {
            max-width: 250px;
            border-radius: 10px;
        }

        .product-details {
            flex: 1;
        }

        .product-details h2 {
            font-size: 28px;
            margin-bottom: 15px;
            color: #2c3e50;
        }

        .product-details p {
            font-size: 16px;
            color: #7f8c8d;
            line-height: 1.6;
            margin-bottom: 10px;
        }

        .product-details .price {
            font-size: 24px;
            font-weight: bold;
            color: #e74c3c;
            margin-bottom: 20px;
        }

        .product-details button {
            padding: 10px 20px;
            background: #2980b9;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .product-details button:hover {
            background: #3498db;
        }

        .back-link {
            text-decoration: none;
            color: #2980b9;
            font-weight: bold;
            margin-top: 20px;
            display: inline-block;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .popup {
            display: <?php echo $success_message ? 'block' : 'none'; ?>;
            background: #27ae60;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .footer {
            margin-top: 40px;
            padding: 10px;
            background: #2980b9;
            color: #fff;
            text-align: center;
            border-radius: 5px;
            width: 100%;
        }
    </style>
</head>
<body>
    <header class="navbar">
        <h1>SneakerHeads</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="#">Shop</a>
            <a href="#">Contact</a>
            <a href="#">Profile</a>
        </nav>
        <div class="cart-icon">
            🛒 <span><?php echo count($_SESSION['cart']); ?></span>
        </div>
    </header>

    <div class="popup">
        <?php echo $success_message; ?>
    </div>

    <?php if ($product): ?>
        <div class="product-container">
            <div class="product-image">
                <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
            </div>
            <div class="product-details">
                <h2><?php echo $product['name']; ?></h2>
                <p><?php echo $product['description']; ?></p>
                <p class="price">Price: $<?php echo number_format($product['price'], 2); ?></p>
                <form method="POST">
                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                    <button type="submit">Add to Cart</button>
                </form>
                <a href="homepage.php" class="back-link">Back to Homepage</a>
            </div>
        </div>
    <?php else: ?>
        <p>Product not found.</p>
    <?php endif; ?>

    <footer class="footer">
        <p>&copy; 2025 SneakerHeads. All rights reserved.</p>
    </footer>
</body>
</html>

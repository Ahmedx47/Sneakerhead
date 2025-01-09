<?php
session_start();

// Initialize the cart if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle Add to Cart logic
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    if (!in_array($product_id, $_SESSION['cart'])) {
        $_SESSION['cart'][] = $product_id;
    }
    // Redirect to avoid form resubmission
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sneakerheads";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all products
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SneakerHeads</title>
    <style>
        /* General Styling */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f8f9fa, #ffffff);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
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

        .navbar .cart-icon {
            display: flex;
            align-items: center;
            font-size: 20px;
            color: #fff;
            position: relative;
        }

        .navbar .cart-icon span {
            position: absolute;
            top: -5px;
            right: -10px;
            background: #e74c3c;
            color: #fff;
            font-size: 14px;
            padding: 2px 6px;
            border-radius: 50%;
        }

        .banner {
            width: 100%;
            height: 300px;
            background: linear-gradient(135deg, #3498db, #85c1e9);
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            margin-bottom: 40px;
        }

        .banner h2 {
            font-size: 36px;
            margin-bottom: 10px;
        }

        .banner p {
            font-size: 18px;
        }

        .content {
            width: 100%;
            max-width: 1200px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            gap: 20px;
        }

        .card {
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card h3 {
            font-size: 20px;
            margin: 15px;
            color: #2c3e50;
        }

        .card p {
            font-size: 14px;
            color: #7f8c8d;
            margin: 0 15px 15px;
        }

        .card a {
            display: block;
            text-align: center;
            margin: 10px auto;
            padding: 10px;
            background: #2980b9;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background 0.3s ease;
        }

        .card a:hover {
            background: #3498db;
        }

        .card button {
            display: block;
            margin: 10px auto 15px;
            padding: 10px;
            background: #2980b9;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            border: none;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .card button:hover {
            background: #3498db;
        }

        .footer {
            width: 100%;
            background: #2980b9;
            color: #fff;
            text-align: center;
            padding: 15px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <header class="navbar">
        <h1>SneakerHeads</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="cart.php" class="cart-icon">
                🛒 <span><?php echo count($_SESSION['cart']); ?></span>
            </a>
            <a href="#">Shop</a>
            <a href="#">Contact</a>
            <a href="#">Profile</a>
        </nav>
    </header>

    <section class="banner">
        <h2>Welcome to SneakerHeads</h2>
        <p>Your ultimate destination for premium sneakers and footwear trends.</p>
    </section>

    <main class="content">
        <?php if ($result->num_rows > 0): ?>
            <?php while ($product = $result->fetch_assoc()): ?>
                <div class="card">
                    <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                    <h3><?php echo $product['name']; ?></h3>
                    <p><?php echo $product['description']; ?></p>
                    <p>Price: $<?php echo number_format($product['price'], 2); ?></p>
                    
                    <!-- View Product Details Button -->
                    <a href="productdetails.php?product=<?php echo urlencode($product['name']); ?>">View Product</a>
                    
                    <!-- Add to Cart Button -->
                    <form method="POST">
                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                        <button type="submit">Add to Cart</button>
                    </form>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No products available.</p>
        <?php endif; ?>
    </main>

    <footer class="footer">
        <p>&copy; 2025 SneakerHeads. All rights reserved.</p>
    </footer>
</body>
</html>

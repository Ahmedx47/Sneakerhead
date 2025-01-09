<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Air Max 2023</title>
    <style>
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

        .product-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: flex-start;
            margin: 40px 0;
            width: 100%;
            max-width: 1200px;
        }

        .product-image {
            flex: 1 1 40%;
            max-width: 500px;
            padding: 20px;
        }

        .product-image img {
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .product-details {
            flex: 1 1 50%;
            padding: 20px;
        }

        .product-details h2 {
            font-size: 36px;
            margin-bottom: 15px;
            color: #2c3e50;
        }

        .product-details p {
            font-size: 16px;
            color: #7f8c8d;
            line-height: 1.8;
            margin-bottom: 15px;
        }

        .product-details span {
            font-size: 24px;
            font-weight: bold;
            color: #e74c3c;
        }

        .product-details button {
            padding: 12px 20px;
            background: #2980b9;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .product-details button:hover {
            background: #3498db;
        }

        .footer {
            width: 100%;
            background: #2980b9;
            color: #fff;
            text-align: center;
            padding: 15px;
            border-radius: 10px;
            margin-top: 40px;
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
    </header>

    <div class="product-container">
        <div class="product-image">
            <img src="images/sneaker1.jpg" alt="Air Max 2023">
        </div>
        <div class="product-details">
            <h2>Air Max 2023</h2>
            <p>Experience ultimate comfort and style with the latest Air Max 2023 edition. Designed for performance and fashion-forward enthusiasts, this sneaker is perfect for any occasion.</p>
            <p><strong>Features:</strong></p>
            <ul>
                <li>Breathable material for enhanced comfort</li>
                <li>Durable sole for long-lasting wear</li>
                <li>Modern design with a classic touch</li>
            </ul>
            <p>Price: <span>$150.00</span></p>
            <button>Add to Cart</button>
        </div>
    </div>

    <footer class="footer">
        <p>&copy; 2025 SneakerHeads. All rights reserved.</p>
    </footer>
</body>
</html>

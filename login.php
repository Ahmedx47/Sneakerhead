<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f8f9fa, #eaf2f8);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }
        .background-decor {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #3498db, #85c1e9);
            clip-path: polygon(0 0, 70% 0, 30% 100%, 0% 100%);
            z-index: -1;
        }
        .info-container {
            width: 40%;
            margin-right: 8%;
            text-align: justify;
            background-color: #ffffff;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            animation: fadeIn 1.5s;
        }
        .info-container h1 {
            color: #2980b9;
            margin-bottom: 20px;
            font-size: 36px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }
        .info-container p {
            font-size: 16px;
            color: #7f8c8d;
            line-height: 1.8;
            animation: slideIn 1.5s;
        }
        .login-container {
            background-color: #ffffff;
            padding: 50px;
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
            width: 45%;
            max-width: 550px;
            animation: zoomIn 1.5s;
        }
        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #2c3e50;
            font-size: 28px;
        }
        .login-container label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #34495e;
        }
        .login-container input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #bdc3c7;
            border-radius: 10px;
            font-size: 14px;
            color: #2c3e50;
            transition: box-shadow 0.3s, border-color 0.3s;
        }
        .login-container input:focus {
            border-color: #2980b9;
            box-shadow: 0 0 8px rgba(41, 128, 185, 0.5);
            outline: none;
        }
        .login-container button {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: #ffffff;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease;
        }
        .login-container button:hover {
            background: linear-gradient(135deg, #2980b9, #3498db);
            transform: scale(1.05);
        }
        .login-container p {
            text-align: center;
            margin-top: 15px;
        }
        .login-container p a {
            color: #2980b9;
            text-decoration: none;
            font-weight: bold;
        }
        .login-container p a:hover {
            text-decoration: underline;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes slideIn {
            from {
                transform: translateX(-50px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes zoomIn {
            from {
                transform: scale(0.8);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <div class="background-decor"></div>
    <div class="info-container">
        <h1>Welcome Back!</h1>
        <p>Log in to your SneakerHeads account to explore exclusive collections, manage your wishlist, and keep track of your orders. Stay ahead with the latest trends in footwear.</p>
    </div>
    <div class="login-container">
        <h2>Log In</h2>
        <form action="login_handler.php" method="POST">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required>
            
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
            
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="signup.php">Sign Up here</a></p>
    </div>
</body>
</html>

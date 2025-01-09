<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #fef4e3, #f8ede3);
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
            background: linear-gradient(135deg, #f39c12, #f8c471);
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
            color: #d35400;
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
        .signup-container {
            background-color: #ffffff;
            padding: 50px;
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
            width: 45%;
            max-width: 550px;
            animation: zoomIn 1.5s;
        }
        .signup-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #2c3e50;
            font-size: 28px;
        }
        .signup-container label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #34495e;
        }
        .signup-container input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #bdc3c7;
            border-radius: 10px;
            font-size: 14px;
            color: #2c3e50;
            transition: box-shadow 0.3s, border-color 0.3s;
        }
        .signup-container input:focus {
            border-color: #e67e22;
            box-shadow: 0 0 8px rgba(230, 126, 34, 0.5);
            outline: none;
        }
        .signup-container button {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #e67e22, #d35400);
            color: #ffffff;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease;
        }
        .signup-container button:hover {
            background: linear-gradient(135deg, #d35400, #e67e22);
            transform: scale(1.05);
        }
        .signup-container .password-info {
            font-size: 12px;
            color: #7f8c8d;
            margin-top: -10px;
            margin-bottom: 20px;
        }
        .signup-container p {
            text-align: center;
            margin-top: 15px;
        }
        .signup-container p a {
            color: #e67e22;
            text-decoration: none;
            font-weight: bold;
        }
        .signup-container p a:hover {
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
        <h1>Welcome to SneakerHeads</h1>
        <p>Discover premium sneakers at SneakerHeads, your go-to destination for trendy and exclusive footwear. Explore our carefully curated collections from leading brands, and elevate your style with every step. Sign up today and enjoy exclusive deals and the latest releases in the sneaker world.</p>
    </div>
    <div class="signup-container">
        <h2>Create Your Account</h2>
        <form action="signup_handler.php" method="POST" onsubmit="return validateSignup()">
            <label for="fullname">Full Name</label>
            <input type="text" id="fullname" name="fullname" placeholder="Enter your full name" required>
            
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Choose a username" required>
            
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email address" required>
            
            <label for="dob">Date of Birth</label>
            <input type="date" id="dob" name="dob" required>
            
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Create a password" required minlength="6">
            <div class="password-info">Password must be at least 6 characters long.</div>
            
            <button type="submit">Sign Up</button>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>

    <script>
        function validateSignup() {
            const password = document.getElementById("password").value;
            if (password.length < 6) {
                alert("Password must be at least 6 characters long.");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>

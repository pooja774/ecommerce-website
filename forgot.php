<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
        body {
    
    background-image: url("forget.jpg");
    background-position: center;
    height: 300px;
}
        body {
            font-family: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        
        .container {
            max-width: 400px;
            padding: 50px;
            border-radius: 30px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 2px solid #ccc;
            border-radius: 6px;
        }
        .form-group button {
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            background-color: #007BFF;
            color: #fff;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>
    <div class="container">
        <h2>Forgot Password</h2>
        <form action="send-pass-reset.php" method="POST">
            <div class="form-group">
                <label for="email">Enter your email address:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <button type="submit">Send Reset Link</button>
            </div>
        </form>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        /* CSS styles for checkout page */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            width: 50px;
            height: auto;
            margin-right: 1rem;
        }

        .logo h1 {
            font-size: 2rem;
            margin: 0;
            font-weight: 600;
            color: #fff;
        }

        nav {
            display: flex;
            align-items: center;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            margin-left: 1rem;
            font-size: 1.2rem;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .container {
            width: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
            flex: 1;
            margin: 20px auto;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        p {
            margin-bottom: 10px;
            color: #555;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: block;
            margin: 0 auto;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom:0;
            width: 100%;
        }
    </style>
    
</head>
<body>
    <header>
        <div class="logo">
            <img src="logo.png" alt="Logo">
            <h1>SNEAKERS</h1>
        </div>
        <nav>
            <a href="index.html">Home</a>
            <a href="cart.php">Cart</a>
        </nav>
    </header>
    <div class="container">
    <?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Check if checkout button is clicked and form fields are submitted
if (isset($_POST['checkout']) && isset($_POST['address']) && isset($_POST['payment'])) {
    // Perform checkout process
    // For demonstration purposes, let's just display a message
    echo "<h2>Thank you for your purchase!</h2>";
    echo "<p>Your order has been successfully processed.</p>";
    echo "<p>Total amount charged: ₹" . calculateTotal() . "</p>";
    echo "<p>Shipping Address: " . $_POST['address'] . "</p>";
    echo "<p>Payment Method: " . $_POST['payment'] . "</p>";

    // Clear the cart after checkout
    unset($_SESSION['cart']);
}

// Function to calculate total price of items in cart
function calculateTotal() {
    $total = 0;
    foreach ($_SESSION['cart'] as $item) {
        $total += $item['price'] * $item['quantity'];
    }
    return $total;
}
?>
        <?php
        // Check if the cart is empty
        if (empty($_SESSION['cart'])) {
            echo "<h2>Cart is empty</h2>";
            echo "<p>Please add items to your cart before proceeding to checkout.</p>";
        } 
        else {
            ?>
            <form action="thankyou.php" method="POST">
                <label for="address">Shipping Address:</label>
                <input type="text" id="address" name="address" required>
 
                <label for="payment">Payment Method:</label>
                <select id="payment" name="payment" required>
                    <option value="credit_card">Credit Card</option>
                    <option value="debit_card">Debit Card</option>
                    <option value="UPI">UPI</option>
                    <option value="cash_on_delivery">Cash on Delivery</option>
                </select>
                <form action="/upi.html" method="post">
                    <button type="submit" class="payment-button" name="payment">Continue</button>
                </form>
            </form>
    <?php  }
        ?>
    </div>

    <footer>
        <p>&copy;  All rights reserved.</p>
    </footer>
</body>
</html>
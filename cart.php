<?php
session_start();

// Initialize cart if not already set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Function to add item to cart
function addToCart($itemId, $itemName, $itemPrice) {
    // Check if item already exists in cart
    if (isset($_SESSION['cart'][$itemId])) {
        // Increment quantity if item already exists
        $_SESSION['cart'][$itemId]['quantity']++;
    } else {
        // Add new item to cart
        $_SESSION['cart'][$itemId] = array(
            'name' => $itemName,
            'price' => $itemPrice,
            'quantity' => 1
        );
    }
}

// Function to remove item from cart
function removeFromCart($itemId) {
    if (isset($_SESSION['cart'][$itemId])) {
        // Remove item from cart
        unset($_SESSION['cart'][$itemId]);
    }
}

// Function to calculate total price of items in cart
function calculateTotal() {
    $total = 0;
    foreach ($_SESSION['cart'] as $item) {
        $total += $item['price'] * $item['quantity'];
    }
    return $total;
}

// Check if add to cart button is clicked
if (isset($_POST['add_to_cart'])) {
    // Add item to cart
    $itemId = $_POST['item_id'];
    $itemName = $_POST['item_name'];
    $itemPrice = $_POST['item_price'];
    addToCart($itemId, $itemName, $itemPrice);
}

// Check if remove from cart button is clicked
if (isset($_POST['remove_from_cart'])) {
    // Remove item from cart
    $itemId = $_POST['item_id'];
    removeFromCart($itemId);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <style>
        /* CSS styles for shopping cart */
        body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}


header {
  background-color: #000;
  color: #fff;
  padding: 10px;
  text-align: center;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
body {
    height: 100vh;
    width: 100%;
    background-image: url("sea.jpg");
    background-position: center;
    background-size: cover;
}
 
.logo {
  display: flex;
  align-items: center;
  margin-left: 2rem;
}

.logo img {
  width: 50px;
  height: auto;
}

.logo h1 {
  font-size: 2rem;
  margin-left: 0.5rem;
  font-weight: 600;
}

/* Navigation */
nav {
  display: flex;
  align-items: center;
}

nav ul {
  list-style: none;
  display: flex;
}

nav ul li {
  margin: 0 1rem;
}

nav ul li a {
  padding: 0.5rem 1rem;
  border: 1px solid #fff;
  color: #fff;
  border-radius: 5px;
  text-decoration: none;
}

.container {
  width: 80%;
  margin: 20px auto;
  display: flex;
  justify-content: center;
}

.cart-items {
  width: 50%;
  border-right: 1px solid #ddd;
  padding-right: 20px;
}

.cart-item {
  border-bottom: 1px solid #ddd;
  padding: 10px 0;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.cart-item:last-child {
  border-bottom: none;
}

.cart-item span {
  flex: 1;
}

.total {
  width: 50%;
  padding-left: 20px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.checkout-button {
  display: block;
  margin-top: 20px;
  padding: 10px;
  background-color: #333;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.checkout-button:hover {
  background-color: #555;
}

footer {
  background-color: black;
  color: #000;
  text-align: center;
  padding: 10px;
  position: fixed;
  bottom: 0;
  width: 100%;
}
    </style>
</head>
<body>
    <header>
        <h1>Shopping Cart</h1>
        <nav>
            <ul>
                <li><a href="inde.php">Home</a></li>
                <li><a href="aboutus.html">About-us</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="buy.php">buy</a></li> <!-- Cart button added -->
            </ul>
        </nav>
    </header>

    <div class="container">
        <div class="cart-items">
            <?php
            // Display cart items
            if (!empty($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $key => $item) {
                    echo "<div class='cart-item'>";
                    echo "<span>" . $item['name'] . "</span>";
                    echo "<span>₹" . $item['price'] . "</span>";
                    echo "<form action='' method='post'>";
                    echo "<input type='hidden' name='item_id' value='$key'>";
                    echo "<button type='submit' name='remove_from_cart'>Remove</button>";
                    echo "</form>";
                    echo "</div>";
                }
            } else {
                echo "<p>No items in the cart</p>";
            }
            ?>
            <div class="total">
                <p>Total: ₹<?php echo calculateTotal(); ?></p>
            </div>
            </div>
            <form action="out.php" method="post">
                <button type="submit" class="checkout-button" name="checkout">Checkout</button>
            </form>
        </div>
    </div>

    <footer>
        <p>&copy; All rights reserved.</p>
    </footer>
</body>
</html>

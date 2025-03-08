<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Page</title>
    <style>
       /* Reset CSS */
       */* Reset CSS */
* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}

/* Container */
.container {
  max-width: 1440px;
  width: 100%;
  margin: 0 auto;
  padding: 0 2rem;
  box-sizing: border-box;
}

/* Header */
header {
  background-color: black;
  color: #fff;
  padding: 1rem 0;
  box-shadow: 1px 2px 10px #000;
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

/* Navigation */
nav {
  display: flex;
  align-items: center;
}

nav ul {
  list-style: none;
  display: flex;
  margin: 0;
  padding: 0;
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
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.3s ease-in-out;
}

nav ul li a:hover {
  background-color: #fff;
  color: #A52A2A;
}

/* Products Section */
.products {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 2rem;
  margin-top: 2rem;
}

.product {
  background-color: #fff;
  background-image: url("powder.jpg");
  border-radius: 5px;
  padding: 1rem;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  transition: all 0.3s ease-in-out;
}

.product:hover {
  transform: translateY(-5px);
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
}

.product img {
  max-width: 100%;
  height: auto;
  border-radius: 5px;
  margin-bottom: 1rem;
}

        

.product h3 {
  font-size: 1.2rem;
  margin-top: 1rem;
  font-weight: 600;
  color: #333;
}

.product p {
  margin-top: 0.5rem;
  color: #555;
}

.product button {
  margin-top: 1rem;
  padding: 0.5rem 1rem;
  background-color: #2c3e50;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: all 0.3s ease-in-out;
}

.product button:hover {
  background-color: #34495e;
}

/* Footer */
footer {
  background-color: #333;
  color: #fff;
  text-align: center;
  padding: 2rem 0;
  margin-top: 2rem;
}

footer p{
  font-size: 14px;
  margin-top: 1rem;
}
    </style>
</head>
<body>
<header>
    <div class="container">
        <h1>Items Available for Purchase</h1>
        <nav>
            <ul>
                <li><a href="inde.php">Home</a></li>
              
                <li><a href="contact.html">Contact</a></li>
                <li><a href="cart.php">Cart</a></li> 
                <li><a href="aboutus.html">About-us</a></li><!-- Cart button added -->
            </ul>
        </nav>
    </div>
</header>

    <div class="container">
        <div class="products">
            <?php
            // Database connection
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "online";

            $conn = mysqli_connect($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch products from the database
            $sql = "SELECT * FROM item";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='product'>";
                    echo "<img src='uploads/" . $row['photo'] . "' alt='" . $row['item_name'] . "'>";
                    echo "<h3>" . $row['item_name'] . "</h3>";
                    echo "<p>" . $row['description'] . "</p>";
                    
                    echo "<p>Price: ₹" . $row['price'] . "</p>";
                    // Add form with hidden input fields for item ID, name, and price
                    echo "<form action='cart.php' method='post'>";
                    echo "<input type='hidden' name='item_id' value='" . $row['id'] . "'>";
                    echo "<input type='hidden' name='item_name' value='" . $row['item_name'] . "'>";

                    
                    // echo "<input type='hidden' name='item_type' value='" . $row['item_type'] . "'>";
                    echo "<input type='hidden' name='item_price' value='" . $row['price'] . "'>";
                    echo "<button type='submit' name='add_to_cart'>Add to Cart</button>";
                    echo "</form>";
                    echo "</div>";
                }
            } else {
                echo "No items available";
            }

            $conn->close();
            ?>
        </div>
    </div>

    
    
</body>
</html>

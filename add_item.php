<?php
// Initialize variables for form fields
$itemName = $category = $description = $price = $photo = "";
$itemNameErr = $categoryErr = $descriptionErr = $priceErr = $photoErr = "";

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate item name
    if (empty($_POST["item-name"])) {
        $itemNameErr = "Item name is required";
    } else {
        $itemName = test_input($_POST["item-name"]);
    }

    // Validate category
    if (empty($_POST["category"])) {
        $categoryErr = "Category is required";
    } else {
        $category = test_input($_POST["category"]);
    }

    // Validate description
    if (empty($_POST["description"])) {
        $descriptionErr = "Description is required";
    } else {
        $description = test_input($_POST["description"]);
    }

    // Validate price
    if (empty($_POST["price"])) {
        $priceErr = "Price is required";
    } else {
        $price = test_input($_POST["price"]);
    }

    // Validate photo upload
    if (empty($_FILES["photo"]["name"])) {
        $photoErr = "Photo is required";
    } else {
        // Handle photo upload
        // Specify the directory for storing photos
        $targetDir = "uploads/";
        // Generate a unique name for the photo
        $photoName = uniqid() . "_" . basename($_FILES["photo"]["name"]);
        // Full path to save the photo on the server
        $targetFilePath = $targetDir . $photoName;
        // Check if the directory exists, if not, create it
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        // Check if the photo is successfully uploaded
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFilePath)) {
            // Photo uploaded successfully
            // You can store $targetFilePath in the database or perform further processing
        } else {
            $photoErr = "Error uploading photo";
        }
    }
}

// Function to sanitize input data
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert form data into database table
if (!empty($itemName) && !empty($category) && !empty($description) && !empty($price) && !empty($photoName)) {
    $sql = "INSERT INTO item (item_name, category, description, price, photo) VALUES ('$itemName', '$category', '$description', '$price', '$photoName')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Items - fashion and xxl</title>
    <style>
        
body {
    font-family: Arial, sans-serif;
    style="color:black"
    margin: 0;
    padding: 0;
}

/* Navbar Styles */
.navbar {
    background-color: #333;
    display: flex;
    justify-content: space-between;
    padding: 20px;
}

.navbar .logo img {
    width: 50px;
    height: 50px;
}

.navbar .logo h2 {
    color: #fff;
    margin: 0;
    padding: 0;
}

.navbar .links {
    list-style-type: none;
    margin: 0;
    padding: 0;
}

.navbar .links li {
    display: inline;
    margin-right: 20px;
}

.navbar .links li a {
    color: #fff;
    text-decoration: none;
}

.navbar .links li a:hover {
    color: #ccc;
}

/* Add Items Form Styles */
.add-items {
    padding: 20px;
}

.add-items h1 {
    margin-bottom: 20px;
}

.add-items .form-group {
    margin-bottom: 20px;
}

.add-items .form-group label {
    display: block;
    margin-bottom: 5px;
}

.add-items .form-group input,
.add-items .form-group select,
.add-items .form-group textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.add-items .form-group textarea {
    resize: none;
}

.add-items .form-group .error {
    color: red;
    margin-top: 5px;
}

.add-items button {
    background-color: #333;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-transform: uppercase;
}

.add-items button:hover {
    background-color: #45a049;
}

/* Footer Styles */
.footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 20px 0;
    margin-top: 50px;
}

.footer p {
    font-size: 14px;
}
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">
            <img src="logo.png" alt="logo">
            <h2>fashion and xxl</h2>
        </div>
        <ul class="links"> 
            <li><a href="inde.html">HOME</a></li>
            <li><a href="buy.php">BUY</a></li>
         
            <li><a href="cart.php">CART</a></li>
            <li><a href="#">WISHLIST</a></li>
        </ul>
    </nav>

    <!-- Add Items Form -->
    <?php
session_start();

// Initialize variables to avoid undefined variable errors
$itemName = $category = $description = $price = "";
$itemNameErr = $categoryErr = $descriptionErr = $priceErr = $photoErr = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate Item Name
    if (empty($_POST["item-name"])) {
        $itemNameErr = "Item Name is required";
    } else {
        $itemName = htmlspecialchars($_POST["item-name"]);
    }

    // Validate Category
    if (empty($_POST["category"])) {
        $categoryErr = "Category is required";
    } else {
        $category = htmlspecialchars($_POST["category"]);
    }

    // Validate Description
    if (empty($_POST["description"])) {
        $descriptionErr = "Description is required";
    } else {
        $description = htmlspecialchars($_POST["description"]);
    }

    // Validate Price
    if (empty($_POST["price"]) || !is_numeric($_POST["price"])) {
        $priceErr = "Valid price is required";
    } else {
        $price = htmlspecialchars($_POST["price"]);
    }

    // Handle File Upload
    if (!empty($_FILES["photo"]["name"])) {
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES["photo"]["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check file type
        $allowedTypes = ["jpg", "jpeg", "png", "gif"];
        if (!in_array($imageFileType, $allowedTypes)) {
            $photoErr = "Only JPG, JPEG, PNG & GIF files are allowed.";
        } else {
            move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile);
        }
    } else {
        $photoErr = "Photo is required.";
    }

    // If no errors, save to the database (Database connection required)
    if (empty($itemNameErr) && empty($categoryErr) && empty($descriptionErr) && empty($priceErr) && empty($photoErr)) {
        // Database insertion code (if needed)
        echo "<p style='color:green;'>Item added successfully!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Items</title>
</head>
<body>

<section class="add-items">
    <h1>Add Items</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="item-name">Item Name:</label>
            <input type="text" id="item-name" name="item-name" value="<?php echo $itemName; ?>" required>
            <span class="error"><?php echo $itemNameErr; ?></span>
        </div>

        <div class="form-group">
            <label for="category">Category:</label>
            <select id="category" name="category" required>
                <option value="" <?php if(empty($category)) echo 'selected'; ?>>Select category</option>
                <option value="bumpy" <?php if($category == 'bumpy') echo 'selected'; ?>>Bumpy</option>
                <option value="flat" <?php if($category == 'flat') echo 'selected'; ?>>Flat</option>
            </select>
            <span class="error"><?php echo $categoryErr; ?></span>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" required><?php echo $description; ?></textarea>
            <span class="error"><?php echo $descriptionErr; ?></span>
        </div>

        <div class="form-group">
            <label for="size">Choose Size:</label>
            <select name="size" required>
                <option value="6">Size 6</option>
                <option value="7">Size 7</option>
                <option value="8">Size 8</option>
                <option value="9">Size 9</option>
                <option value="10">Size 10</option>
            </select>
        </div>

        <div class="form-group">
            <label for="price">Price:</label>
            <input type="" id="price" name="price" value="<?php echo $price; ?>" required>
            <span class="error"><?php echo $priceErr; ?></span>
        </div>

        <div class="form-group">
            <label for="photo">Photo:</label>
            <input type="file" id="photo" name="photo" accept="image/*" required>
            <span class="error"><?php echo $photoErr; ?></span>
        </div>

        <button type="submit">Add Item</button>
    </form>
</section>

<footer class="footer">
    <p>&copy; SNEAKERS. All rights reserved.</p>
</footer>

</body>
</html>

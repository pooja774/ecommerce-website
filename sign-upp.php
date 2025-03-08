<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online";
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Establish database connection (replace with your database credentials)
//$conn = mysqli_connect("localhost", "username", "password", "bm");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Process registration form data
$username = $_POST['username'];
$email = $_POST['email'];

$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Insert data into database
$sql = "INSERT INTO userrr (username, email, password_hash) VALUES ('$username', '$email', '$password')";
if (mysqli_query($conn, $sql)) {
    header("Location: signin.php"); 
                exit();
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>
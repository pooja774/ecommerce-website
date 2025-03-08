<?php
// Start session (if not already started)
session_start();
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

// Process login form data
$email = $_POST['email'];

$password_hash= $_POST['password'];


// Fetch user data from database
// Fetch user data from database
$sql = "SELECT * FROM userrr WHERE email='$email'";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password_hash, $row['password_hash'])) {
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['email'] = $row['email'];

        header("Location: inde.php"); 
        exit();
    } else {
        header("Location: signin.php?error=Invalid password"); // Redirect back to login page with error message
        exit();
    }
} else {
    header("Location: signin.php?error=User not found"); // Redirect back to login page with error message
    exit();
}
<?php
// Start the session
session_start();

// Assuming you have a user ID or session ID to retrieve the cart
$user_id = $_SESSION['user_id']; 

// SQL query to retrieve items in the cart
$sql = "SELECT cart_items.cart_items.name, cart_items.price, cart_items.quantity 
        FROM cart 
        JOIN products ON cart.cart_items_id = items.id 
        WHERE cart.user_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);  // Bind the user ID to the query
$stmt->execute();
$result = $stmt->get_result();
?>



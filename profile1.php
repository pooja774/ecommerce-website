<?php
include 'config.php';

// Assuming a user is logged in, get user ID dynamically (example: from session)
$user_id = 1; // Example static ID, replace with $_SESSION['user_id'] in real apps

$sql = "SELECT * FROM userrr WHERE id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "User not found!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; background: #f4f4f4; }
        .profile-container { width: 300px; background: white; padding: 20px; margin: auto; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        .profile-image { width: 100px; height: 100px; border-radius: 50%; }
    </style>
</head>
<body>
    <div class="profile-container">
        <img src="<?php echo $user['image']; ?>" alt="User Image" class="profile-image">
        <h2><?php echo $user['username']; ?></h2>
        <p>Email: <?php echo $user['email']; ?></p>
        <p><?php echo $user['bio']; ?></p>
    </div>
</body>
</html>

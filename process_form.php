<?php
// Database connection details
$host = 'localhost';  // Your database host (e.g., localhost)
$dbname = 'online';  // The name of the database
$username = 'root';  // Your MySQL username
$password = '';  // Your MySQL password

try {
    // Create a new PDO instance to connect to the MySQL database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        // Prepare an SQL statement to insert form data into the database
        $sql = "INSERT INTO message (name, email, subject, message) VALUES (:name, :email, :subject, :message)";
        $stmt = $pdo->prepare($sql);

        // Bind the form data to the SQL statement
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':subject', $subject);
        $stmt->bindParam(':message', $message);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Thank you! Your message has been received.";
        } else {
            echo "Error: Unable to submit your message. Please try again.";
        }
    }
} catch (PDOException $e) {
    // If there's an error with the database connection or query, display the error
    echo "Database error: " . $e->getMessage();
}
?>
/
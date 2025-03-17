<?php
// Database credentials
$servername = "localhost";
$username = "your_username";
$password = "";
$dbname = "Donation";

// Create connection
$conn = new mysqli($servername, $username, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form inputs
    $donation_amount = floatval($_POST['donation-amount']);
    $donor_name = htmlspecialchars(trim($_POST['donor-name']));
    $phone = htmlspecialchars(trim($_POST['phone']));

    // Prepare an SQL statement with placeholders to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO donation (donation_amount, donor_name, phone) VALUES (?, ?, ?)");
    
    // Bind parameters
    $stmt->bind_param("dss", $donation_amount, $donor_name, $phone);

    // Execute the statement
    if ($stmt->execute()) {
        // Success message
        echo "<h3>Thank you for your donation, $donor_name!</h3>";
    } else {
        // Error message
        echo "<h3>Sorry, there was an error processing your donation. Please try again later.</h3>";
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>

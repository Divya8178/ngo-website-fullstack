<?php
// Database credentials
$servername = "localhost";
$username = "username";
$password = "";
$dbname = "Volunteer";

// Create connection
$conn = new mysqli($servername, $username, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate the volunteer name
    $volunteer_name = htmlspecialchars(trim($_POST['volunteer-name']));
    
    // Ensure name is not empty
    if (empty($volunteer_name)) {
        echo "Please enter your full name.";
        exit;
    }

    // Sanitize and validate the phone number
    $phone = htmlspecialchars(trim($_POST['phone']));
    
    // Simple regex for phone validation (can be adjusted)
    if (!preg_match("/^\+?[0-9]{10,15}$/", $phone)) {
        echo "Please enter a valid phone number.";
        exit;
    }

    // Sanitize the skills/experience input
    $volunteer_skills = htmlspecialchars(trim($_POST['volunteer-skills']));
    
    // Ensure skills/experience is not empty
    if (empty($volunteer_skills)) {
        echo "Please provide details about your skills and experience.";
        exit;
    }

    // Prepare an SQL statement with placeholders to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO volunteers (volunteer_name, phone, skills_experience) VALUES (?, ?, ?)");
    
    // Bind parameters to the prepared statement
    $stmt->bind_param("sss", $volunteer_name, $phone, $volunteer_skills);

    // Execute the statement
    if ($stmt->execute()) {
        // Success message
        echo "<h3>Thank you for registering as a volunteer, $volunteer_name!</h3>";
    } else {
        // Error message
        echo "<h3>Sorry, there was an error processing your registration. Please try again later.</h3>";
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>

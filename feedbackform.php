<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the database connection code
    $servername = "localhost";
    $username = "root";
    $password = ""; // No password by default
    $dbname = "feedbackform"; // Your database name

    // Create connection
    $conn = new mysqli("localhost", "root", "", "feedbackform");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $feedback = mysqli_real_escape_string($conn, $_POST['feedback']);

    // SQL query to insert data
    $sql = "INSERT INTO feedback_db (name, email, feedback) VALUES ('$name', '$email', '$feedback')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Feedback submitted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If someone tries to access this script directly without submitting the form
    echo "Invalid request";
}
?>

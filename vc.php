<?php
// Database connection parameters
$servername = "localhost"; // Replace with your MySQL server name
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$database = "vaccineform"; // Replace with your database name

// Create a connection
$conn = new mysqli("localhost", "root", "", "vaccineform");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST["full_name"];
    $phone_number = $_POST["phone_number"];
    $email_address = $_POST["email_address"];
    $appointment_date = $_POST["appointment_date"];
    $vaccine_db = $_POST["vaccine_db"];
    $area = $_POST["area"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $post_code = $_POST["post_code"];

    // SQL query to insert data into the "patients" table
    $sql = "INSERT INTO vaccination_db (full_name, phone_number, email_address, appointment_date, vaccine_db, area, city, state, post_code) VALUES ('$full_name', '$phone_number', '$email_address', '$appointment_date', '$vaccine_db', '$area', '$city', '$state', '$post_code')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
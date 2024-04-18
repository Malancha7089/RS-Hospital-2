<?php
// Include your database connection file or define your connection details here
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'appointmentform';

// Create a connection to the database
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST["full_name"];
    $phone_number = $_POST["phone_number"];
    $email_address = $_POST["email_address"];
    $appointment_date = $_POST["appointment_date"];
    $doctor_db = $_POST["doctor_db"];
    $area = $_POST["area"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $pincode = $_POST["pincode"];

    // Insert data into the database
    $sql = "INSERT INTO appointment_db (full_name, phone_number, email_address, appointment_date, doctor_db, area, city, state, pincode) VALUES ('$full_name', '$phone_number', '$email_address', '$appointment_date', '$doctor_db', '$area', '$city', '$state', '$pincode')";

    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>

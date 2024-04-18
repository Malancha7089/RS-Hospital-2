<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "newuser_db";

$conn = new mysqli("localhost", "root", "", "newuser_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $contactno = $_POST["contactno"];


    $sql = "INSERT INTO newuserform_db (username, password ,email,contactno) VALUES ('$username', '$password','$email','$contactno')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "New user registered successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
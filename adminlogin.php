<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Debugging: Print the entered username and password
    echo "Entered Username: " . $username . "<br>";
    echo "Entered Password: " . $password . "<br>";

    // Query the database to check if the entered username and password exist
    $sql = "SELECT * FROM adminform_db WHERE username='$username' AND password='$password'";
    
    // Debugging: Print the SQL query
   
    $result = $conn->query($sql);

    // Debugging: Print the number of rows returned by the query
    

    if ($result->num_rows > 0) {
        echo "Login successful";
        // Redirect to admin page or perform other actions
    } else {
        echo "Invalid username or password";
    }
}

// Close the connection
$conn->close();
?>



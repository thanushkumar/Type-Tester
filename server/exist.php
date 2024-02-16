<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if both username and password are provided
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        // Retrieve username and password from the form
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Perform your authentication logic here
        // For demonstration purposes, let's assume a simple check
        
        // Database connection details
        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "Thanush@9347";
        $dbname = "test";

        // Create connection
        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to check if the provided username and password exist in the database
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // User authenticated successfully
            session_start();
        
        // Store username in session variable
        $_SESSION['username'] = $username;
        
            header("Location:/web/index.html");
        } else {
            // Username or password is incorrect
            echo "Invalid username or password!";
        }

        // Close database connection
        $conn->close();
    } else {
        // If username or password is not provided
        echo "Please enter both username and password!";
    }
}
?>
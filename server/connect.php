<?php
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    echo $username;
    
    // Database connection
    $host='localhost';
    $u='root';
    $p='Thanush@9347';
    $db='test';
    $conn = new mysqli($host,$u,$p,$db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("INSERT INTO users(name, username, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $username, $email, $password);
    
    if ($stmt->execute() === TRUE) {
        echo "Registration successful";
    } else {
        echo "Error: " . $conn->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
    //INSERT INTO users(name, username, email, password) VALUES (?, ?, ?, ?)
?>
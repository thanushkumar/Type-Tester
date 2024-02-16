   <?php 
    // Database connection parameters
    $servername = "localhost";
    $u = "root";
    $p = "Thanush@9347";
    $dbname = "test";
    

    // Create connection
    $conn = new mysqli($servername, $u, $p, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get data from POST request
    $cpm = $_POST['cpm'];
    $wpm = $_POST['wpm'];
    $errors = $_POST['errors'];
    //added
    session_start();
    $username = $_SESSION['username'];


    // Prepare SQL statement to insert data into the user_statistics table
    $stmt = $conn->prepare("INSERT INTO user_statistics (username, cpm, wpm, errors) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siii", $username, $cpm, $wpm, $errors);

    // Execute the statement
    if ($stmt->execute()) {
        header("Location: index.html");
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close prepared statement
    $stmt->close();

    // Close database connection
    $conn->close();
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Statistics</title>
    <style>
        table {
            width: 50%;
            margin: 50px auto;
            border-collapse: collapse;
            

        }
        th, td,tr {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
        }
        th{
          background-color:deepskyblue;
        }
        td{
          background-color:#FFFDD0;
        }
        @import url("https://fonts.googleapis.com/css2?family=Merriweather:wght@400;500;600;700&display=swap");
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Merriweather", sans-serif;
  
}
.nav {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  z-index: 1000;
  padding-top: 20px;
  text-align: right;

}

.nav a {
  text-decoration: none;
  color: #f1f5f9;
  font-size: 18px;
  padding: 10px 10px;
  border-radius: 5px;
  transition: all 0.3s ease;

}

.nav a:hover {
  background: deepskyblue;
  color: #fff;
}
.nav h2{
  position: fixed;
  text-align: left;
  color: #f1f5f9;
  margin-left: 20px;
}

body{
  display: fixed;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  margin: 0;
  background-color: #0f172a;
  overflow:none;
}
h3{
  color:white;
  text-align: center;
  top:100;
  margin-top:200px;
}

</style>
</head>
<body>
<div class="nav">
        <h2>Type Tester</h2>
        <a href="index.html">Home</a>
        <a href="about.html">About Us</a>
    </div>
    
<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "Thanush@9347";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



// Fetch user statistics based on the username
session_start();
$username = $_SESSION['username'];
echo "<h3 style='color: white;'>Username :$username</h3>";
$sql = "SELECT * FROM user_statistics WHERE username = '$username'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Output user statistics in a table
    echo "<table>";
    echo "<tr><th>Date and Time</th><th>CPM(Characters Per Minute)</th><th>WPM (Words Per Minute)</th><th>Errors</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" .$row["Date&Time"]. "</td><td>". $row["cpm"] . "</td><td>" . $row["wpm"] . "</td><td>" . $row["errors"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "<h3 style='color: white;'>Empty</h3>";;
}

// Close database connection
$conn->close();
?>
</body>
</html>

<?php
// Ensure the session starts only if not already active
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include("dbconnection.php");

// Check if the connection is successful
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// SQL query to count purchases
$sql = "SELECT COUNT(*) as user_buy_car FROM customer_purchase";
$result = $conn->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_buy_car = $row['user_buy_car']; // Fetch the count
        echo "<h3> " . $user_buy_car . "</h3>";
    } else {
        echo "<h3>0 cars purchased.</h3>";
    }
} else {
    // Log SQL query errors
    die("Query failed: " . $conn->error);
}

// Close the database connection
$conn->close();
?>
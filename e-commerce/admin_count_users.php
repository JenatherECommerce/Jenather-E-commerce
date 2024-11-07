<?php
session_start();
include("dbconnection.php");

// SQL query to get the count of users from the customer_credentials table
$sql = "SELECT COUNT(*) as user_count FROM customer_credentials";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $user_count = $row['user_count']; // Fetch the user count
    echo "<h3>" . $user_count . "</h3>";
} else {
    echo "0 Users found.";
}

$conn->close();
?>

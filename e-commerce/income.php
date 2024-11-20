<?php
// Start session only if none is active
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include("dbconnection.php");

// SQL query to calculate total income by joining customer_purchase and products
$sql = "
    SELECT SUM(p.product_price) AS total_income
    FROM customer_purchase cp
    INNER JOIN products p ON cp.product_id = p.product_id
";
$result = $conn->query($sql);

if ($result) { // Check if the query executed successfully
    $row = $result->fetch_assoc();
    $total_income = $row['total_income']; // Fetch the total income

    if ($total_income !== null) { // Check if there is any income
        echo "<h3> ₱" . number_format($total_income, 2) . "</h3>";
    } else {
        echo "<h3>No cars have been purchased yet.</h3>";
    }
} else {
    // Output the SQL error for debugging purposes
    echo "<h3>Error executing query: " . $conn->error . "</h3>";
}

$conn->close();
?>

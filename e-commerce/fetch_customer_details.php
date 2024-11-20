<?php
// Database connection settings
$servername = "localhost";
$username = "root"; // Replace with your DB username
$password = ""; // Replace with your DB password
$dbname = "jenather_db"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the customer ID from the query string
$customer_id = isset($_GET['customer_id']) ? intval($_GET['customer_id']) : 0;

if ($customer_id > 0) {
    // SQL query to fetch customer and purchase details
    $sql = "
        SELECT 
            cc.firstname, cc.lastname, cc.email, cc.gender, cc.birthdate,
            p.product_name, p.product_brand, p.product_price, p.product_img,
            cp.purchase_date
        FROM customer_credential cc
        INNER JOIN customer_purchase cp ON cc.customer_id = cp.customer_id
        INNER JOIN products p ON cp.product_id = p.product_id
        WHERE cc.customer_id = ?
    ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $customer_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $purchases = [];
    while ($row = $result->fetch_assoc()) {
        $purchases[] = $row;
    }

    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($purchases);

    $stmt->close();
} else {
    echo json_encode(["error" => "Invalid customer ID"]);
}

$conn->close();
?>

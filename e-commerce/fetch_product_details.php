<?php
include("connect.php");

if (isset($_GET['product_id']) && isset($_GET['detail_type'])) {
    $product_id = intval($_GET['product_id']);
    $detail_type = $_GET['detail_type'];

    // SQL to fetch product details based on product_id
    $sql = "SELECT pd.engine_performances 
            FROM products p 
            JOIN product_description pd ON p.products_description_id = pd.products_description_id 
            WHERE p.product_id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($row = $result->fetch_assoc()) {
        // Assuming engine_performances is stored as JSON
        $engine_data = json_decode($row['engine_performances'], true);
        
        // Send response back to the AJAX call
        echo json_encode([
            'success' => true,
            'details' => $engine_data
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Product details not found.']);
    }

    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
}
?>
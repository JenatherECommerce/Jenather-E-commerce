<?php

include("dbconnection.php"); 


$sql = "
    SELECT 
        cp.customer_id, 
        cc.firstname, 
        cc.lastname, 
        cc.email,
        p.product_img  -- Fetching the product image from the products table
    FROM customer_purchase cp
    INNER JOIN customer_credentials cc 
        ON cp.customer_id = cc.customer_id
    INNER JOIN products p
        ON cp.product_id = p.product_id  -- Assuming customer_purchase has product_id that links to products table
";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    echo "<table border='1' style='border-collapse: collapse; width: 100%;'>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Purchased Car</th>  <!-- Added a column for the product image -->
            </tr>";
    
    while ($row = $result->fetch_assoc()) {
        $imagePath = "Products/" . htmlspecialchars($row["product_img"]);
        echo "<tr>
                <td>" . htmlspecialchars($row["customer_id"]) . "</td>
                <td>" . htmlspecialchars($row["firstname"]) . " " . htmlspecialchars($row["lastname"]) . "</td> 
                <td>" . htmlspecialchars($row["email"]) . "</td>
                <td>";
        
     
        if (!empty($row["product_img"]) && file_exists($imagePath)) {
            echo "<a href='#' onclick='viewPurchasedCar(\"$imagePath\")'>View Purchased Car</a>";
        } else {
            echo "No image available";
        }

        echo "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No results found.";
}

$conn->close();
?>

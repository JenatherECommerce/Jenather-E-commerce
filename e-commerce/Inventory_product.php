<?php
include('dbconnection.php'); // Include your database connection file

if (isset($_POST['add_product'])) {
    // Handle image upload
    $product_img = $_FILES['product_img']['name'];
    $tempname = $_FILES['product_img']['tmp_name'];
    $folder = 'Products/' . $product_img;

    if (move_uploaded_file($tempname, $folder)) {
        echo "Image uploaded successfully!";
    } else {
        echo "Failed to upload image.";
    }
  
    $product_quantity = trim($_POST['product_quantity']);
    $product_brand = trim($_POST['product_brand']);
    $body_config = trim($_POST['body_config']);
    $product_name = trim($_POST['product_name']);
    
    $product_price = trim($_POST['product_price']); 
    $product_price = str_replace(',', '', $product_price);

    $engine_performances = trim($_POST['engine_performances']);
    $dimensions = trim($_POST['dimensions']);
    $interior_comfort = trim($_POST['interior_comfort']);
    $safety = trim($_POST['safety']);
    $wheel = trim($_POST['wheel']);
    $features = trim($_POST['features']);

    $checkQuery = 'SELECT product_id, product_quantity, products_description_id FROM products WHERE product_name = ? AND product_brand = ? AND body_config = ?';
    
    $stmtCheck = $conn->prepare($checkQuery);
    if (!$stmtCheck) {
        die('Prepare failed (stmtCheck): ' . htmlspecialchars($conn->error));
    }

    $stmtCheck->bind_param('sss', $product_name, $product_brand, $body_config);
    $stmtCheck->execute();
    $stmtCheck->store_result();

    if ($stmtCheck->num_rows > 0) {
    
        $stmtCheck->bind_result($product_id, $existing_quantity, $products_description_id);
        $stmtCheck->fetch();

        $new_quantity = $existing_quantity + $product_quantity; 
        $updateProductQuery = 'UPDATE products SET product_quantity = ?, product_price = ?, product_img = ? WHERE product_id = ?';

        $stmtUpdateProduct = $conn->prepare($updateProductQuery); 
        if (!$stmtUpdateProduct) {
            die('Prepare failed (stmtUpdateProduct): ' . htmlspecialchars($conn->error));
        }
        $stmtUpdateProduct->bind_param('idss', $new_quantity, $product_price, $product_img, $product_id);

        if (!$stmtUpdateProduct->execute()) {
            echo 'Error updating product: ' . htmlspecialchars($stmtUpdateProduct->error);
            $stmtUpdateProduct->close();
            $conn->close();
            exit();
        }
        
        $checkDescriptionQuery = 'SELECT products_description_id FROM products_description WHERE products_description_id = ?';
        $stmtCheckDescription = $conn->prepare($checkDescriptionQuery);
        if (!$stmtCheckDescription) {
            die('Prepare failed (stmtCheckDescription): ' . htmlspecialchars($conn->error));
        }

        $stmtCheckDescription->bind_param('i', $products_description_id);
        $stmtCheckDescription->execute();
        $stmtCheckDescription->store_result();

        if ($stmtCheckDescription->num_rows > 0) {
            // If description exists, update it
            $updateDescriptionQuery = 'UPDATE products_description SET engine_performances = ?, dimensions = ?, interior_comfort = ?, safety = ?, wheel = ?, features = ? WHERE products_description_id = ?';

            $stmtUpdateDescription = $conn->prepare($updateDescriptionQuery);
            if (!$stmtUpdateDescription) {
                die('Prepare failed (stmtUpdateDescription): ' . htmlspecialchars($conn->error));
            }
            $stmtUpdateDescription->bind_param('ssssssi', $engine_performances, $dimensions, $interior_comfort, $safety, $wheel, $features, $products_description_id);

            if (!$stmtUpdateDescription->execute()) {
                echo 'Error updating product descriptions: ' . htmlspecialchars($stmtUpdateDescription->error);
            }

            $stmtUpdateDescription->close();
        }

        $stmtUpdateProduct->close();
        $stmtCheckDescription->close();

    } else {
        // If product does not exist, insert into products_description first
        $insertDescriptionQuery = 'INSERT INTO products_description (engine_performances, dimensions, interior_comfort, safety, wheel, features)
                                   VALUES (?, ?, ?, ?, ?, ?)';

        $stmtInsertDescription = $conn->prepare($insertDescriptionQuery);
        if (!$stmtInsertDescription) {
            die('Prepare failed (stmtInsertDescription): ' . htmlspecialchars($conn->error));
        }

        $stmtInsertDescription->bind_param('ssssss', $engine_performances, $dimensions, $interior_comfort, $safety, $wheel, $features);

        if (!$stmtInsertDescription->execute()) {
            echo 'Error inserting into products_descriptions: ' . htmlspecialchars($stmtInsertDescription->error);
            $stmtInsertDescription->close();
            $conn->close();
            exit();
        }

        $products_description_id = $conn->insert_id; // Get the last inserted description ID

        // Now insert into products with the newly generated description ID
        $insertProductQuery = 'INSERT INTO products (product_img, product_quantity, product_brand, body_config, product_name, product_price, products_description_id)
                               VALUES (?, ?, ?, ?, ?, ?, ?)';

        $stmtInsertProduct = $conn->prepare($insertProductQuery);
        if (!$stmtInsertProduct) {
            die('Prepare failed (stmtInsertProduct): ' . htmlspecialchars($conn->error));
        }

        $stmtInsertProduct->bind_param('sisssdi', $product_img, $product_quantity, $product_brand, $body_config, $product_name, $product_price, $products_description_id);

        if (!$stmtInsertProduct->execute()) {
            echo 'Error inserting into products: ' . htmlspecialchars($stmtInsertProduct->error);
            $stmtInsertProduct->close();
            $conn->close();
            exit();
        }

        $stmtInsertProduct->close();
        $stmtInsertDescription->close();
    }

    $stmtCheck->close();
    $conn->close();

    // Redirect to the inventory page after the operation
    header("Location: Inventory.php");
    exit();
}
?>

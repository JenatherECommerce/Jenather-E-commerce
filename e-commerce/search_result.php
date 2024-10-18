<?php
session_start();
include("connect.php"); // Make sure you have your database connection

$isLoggedIn = isset($_SESSION["username"]);

$searchQuery = '';
if (isset($_GET['search_query'])) {
    $searchQuery = trim($_GET['search_query']);
}

// SQL query for search results
$searchResults = null;
if ($searchQuery) {
    $likeQuery = "%" . $searchQuery . "%";
    $sql_search = "SELECT p.*, pd.engine_performances, pd.dimensions, pd.interior_comfort, pd.safety, pd.wheel, pd.features 
                   FROM products p 
                   JOIN products_description pd ON p.products_description_id = pd.products_description_id 
                   WHERE p.product_name LIKE ? OR p.product_brand LIKE ?";
    
    $stmt_search = $conn->prepare($sql_search);
    $stmt_search->bind_param('ss', $likeQuery, $likeQuery);
    $stmt_search->execute();
    $searchResults = $stmt_search->get_result();
    $stmt_search->close();
} else {
    // If no search query, handle accordingly (optional)
    $searchResults = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="./css/search.css"> <!-- Link your CSS file -->
</head>
<body>

    <header>
        <div class="icon">
            <a href="#"><img src="./images/header_img/icon.png" alt="image here" height=40></a>
        </div>
        <nav class="nav-bar">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Promos</a></li>
                <li><a href="#">Financing</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </nav>
        <div class="actions">
            <form action="search_result.php" id="searchForm" method="GET">
                <input type="text" id="search" placeholder="Seach for cars..." name="search_query">
                <button type="submit" class="action-btn">Search</button>
            </form>
            <?php if(!$isLoggedIn):?>
                <button onclick="location.href='log_in.php'" class="action-btn">Login</button>
                <button onclick="location.href='registration_form.php'" class="action-btn">Sign Up</button>
            <?php else: ?>
                <button onclick="location.href='logout.php'" class="login-btn"><img src="./images/header_img/login_icon.png" alt="log_in"></button>
            <?php endif ?>
        </div>
    </header>

    <main>
        <section class="search-results">
            <h1>Search Results for "<?php echo htmlspecialchars($searchQuery); ?>"</h1>
            <?php if ($searchResults && $searchResults->num_rows > 0): ?>
                <div class="result-container">
                    <?php while($row = $searchResults->fetch_assoc()): ?>
                        <div class="card" data-product-id="<?php echo $row['product_id'] ?>">
                            <img src="Products/<?php echo $row['product_img']?>" alt="">
                            <div class="card-content">
                                <h2 class="card-title"><?php echo htmlspecialchars($row['product_name']); ?></h2>
                                <h3 class="price"><b><?php echo "Price: " . number_format($row['product_price'], 2); ?></b></h3>
                                <button onclick="location.href='product_details.php?id=<?php echo $row['product_id']; ?>'" class="action-btn">View Details</button>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <h2>No results found for "<?php echo htmlspecialchars($searchQuery); ?>"</h2>
            <?php endif; ?>
        </section>
    </main>
</body>
</html>
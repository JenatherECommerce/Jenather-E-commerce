<?php
session_start();
include("connect.php");

$isLoggedIn = isset($_SESSION["username"]);
// Default queries for Suzuki and Honda (only when there's no search)
$sql_suzuki_hatchback = "SELECT p.*, pd.engine_performances, pd.dimensions, pd.interior_comfort, pd.safety, pd.wheel, pd.features 
                   FROM products p 
                   JOIN products_description pd ON p.products_description_id = pd.products_description_id 
                   WHERE p.product_brand = 'Suzuki' AND p.body_config = 'Hatchbacks'";
$sql_suzuki_suv = "SELECT p.*, pd.engine_performances, pd.dimensions, pd.interior_comfort, pd.safety, pd.wheel, pd.features 
                   FROM products p 
                   JOIN products_description pd ON p.products_description_id = pd.products_description_id 
                   WHERE p.product_brand = 'Suzuki' AND p.body_config = 'SUVS'";
$sql_suzuki_sedans = "SELECT p.*, pd.engine_performances, pd.dimensions, pd.interior_comfort, pd.safety, pd.wheel, pd.features 
                   FROM products p 
                   JOIN products_description pd ON p.products_description_id = pd.products_description_id 
                   WHERE p.product_brand = 'Suzuki' AND p.body_config = 'Sedans and coupes'";
$sql_suzuki_mini_truck = "SELECT p.*, pd.engine_performances, pd.dimensions, pd.interior_comfort, pd.safety, pd.wheel, pd.features 
                   FROM products p 
                   JOIN products_description pd ON p.products_description_id = pd.products_description_id 
                   WHERE p.product_brand = 'Suzuki' AND p.body_config = 'Minivans and Trucks'";


$suzuki_product1 = $conn->query($sql_suzuki_hatchback);
$suzuki_product2 = $conn->query($sql_suzuki_suv);
$suzuki_product3 = $conn->query($sql_suzuki_sedans);
$suzuki_product4 = $conn->query($sql_suzuki_mini_truck);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/suzuki.css">
    <title>Jenather</title>
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

    <div id="suzukiheader">
        <img src="./images/header_img/suzuki.webp" alt="">
    </div>

    <section class="hatchbacks">
        <?php if(mysqli_num_rows($suzuki_product1) > 0): ?>
        <h1 id="hatchback">H A T C H B A C K S</h1>
            <div class="card-container">
            <?php
                while($row = mysqli_fetch_assoc($suzuki_product1)){
            ?>
                <div class="card" data-product-id="<?php echo $row['product_id'] ?>">
                    <img src="Products/<?php echo $row['product_img']?>" alt="">
                    <div class="card-content">
                        <div class="content">
                            <h2 class="card-title"><?php echo $row['product_name'] ?></h2>
                            <h3 class="price"><b><?php echo "Price: " . number_format($row['product_price'],2) ?></b></h3>
                            <p class="card-description">Click To Expand for more details</p>
                        </div>
                        <div class="card-info">
                            <h3>Product Info</h3>
                            <div class="card-info-btns">
                                <button class="card-information active" data-detail-type="engine_performances">Engine & Performance</button>
                                <button class="card-information" data-detail-type="dimensions">Dimension</button>
                                <button class="card-information" data-detail-type="interior_comfort">Interior & Comfort</button>
                                <button class="card-information" data-detail-type="safety">Safety</button>
                                <button class="card-information" data-detail-type="wheel">Wheels</button>
                                <button class="card-information" data-detail-type="features">Features</button>
                            </div>
                            <hr>
                            <div class="details" id="details-<?php echo $row['product_id'] ?>">
                                <div class="detail-section" data-type="engine_performances" style="display:block;">
                                    <p><?php echo htmlspecialchars($row['engine_performances']); ?></p>
                                </div>
                                <div class="detail-section" data-type="dimensions" style="display:none;">
                                    <p><?php echo htmlspecialchars($row['dimensions']); ?></p>
                                </div>
                                <div class="detail-section" data-type="interior_comfort" style="display:none;">
                                    <p><?php echo htmlspecialchars($row['interior_comfort']); ?></p>
                                </div>
                                <div class="detail-section" data-type="safety" style="display:none;">
                                    <p><?php echo htmlspecialchars($row['safety']); ?></p>
                                </div>
                                <div class="detail-section" data-type="wheel" style="display:none;">
                                    <p><?php echo htmlspecialchars($row['wheel']); ?></p>
                                </div>
                                <div class="detail-section" data-type="features" style="display:none;">
                                    <p><?php echo htmlspecialchars($row['features']); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="process-btn">
                                <button class="close-btn">Close</button>
                                <?php if(!$isLoggedIn):?>
                                    <button class="purchase-btn" onclick="location.href='log_in.php'">Purchase</button>
                                <?php else: ?>
                                    <button class="purchase-btn" onclick="location.href='user_profile.php'">Purchase</button>
                                <?php endif ?>
                        </div>
                    </div>
                </div>
            <?php
                } 
            ?>
        </div>
        <?php endif; ?>
    </section>

    <section class="sedan">
        <?php if(mysqli_num_rows($suzuki_product3) > 0): ?>
        <h1 id="sedans">S E D A N S</h1>
            <div class="card-container">
            <?php
                while($row = mysqli_fetch_assoc($suzuki_product3)){
            ?>
                <div class="card" data-product-id="<?php echo $row['product_id'] ?>">
                    <img src="Products/<?php echo $row['product_img']?>" alt="">
                    <div class="card-content">
                        <div class="content">
                            <h2 class="card-title"><?php echo $row['product_name'] ?></h2>
                            <h3 class="price"><b><?php echo "Price: " . number_format($row['product_price'],2) ?></b></h3>
                            <p class="card-description">Click To Expand for more details</p>
                        </div>
                        <div class="card-info">
                            <h3>Product Info</h3>
                            <div class="card-info-btns">
                                <button class="card-information active" data-detail-type="engine_performances">Engine & Performance</button>
                                <button class="card-information" data-detail-type="dimensions">Dimension</button>
                                <button class="card-information" data-detail-type="interior_comfort">Interior & Comfort</button>
                                <button class="card-information" data-detail-type="safety">Safety</button>
                                <button class="card-information" data-detail-type="wheel">Wheels</button>
                                <button class="card-information" data-detail-type="features">Features</button>
                            </div>
                            <hr>
                            <div class="details" id="details-<?php echo $row['product_id'] ?>">
                                <div class="detail-section" data-type="engine_performances" style="display:block;">
                                    <p><?php echo htmlspecialchars($row['engine_performances']); ?></p>
                                </div>
                                <div class="detail-section" data-type="dimensions" style="display:none;">
                                    <p><?php echo htmlspecialchars($row['dimensions']); ?></p>
                                </div>
                                <div class="detail-section" data-type="interior_comfort" style="display:none;">
                                    <p><?php echo htmlspecialchars($row['interior_comfort']); ?></p>
                                </div>
                                <div class="detail-section" data-type="safety" style="display:none;">
                                    <p><?php echo htmlspecialchars($row['safety']); ?></p>
                                </div>
                                <div class="detail-section" data-type="wheel" style="display:none;">
                                    <p><?php echo htmlspecialchars($row['wheel']); ?></p>
                                </div>
                                <div class="detail-section" data-type="features" style="display:none;">
                                    <p><?php echo htmlspecialchars($row['features']); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="process-btn">
                                <button class="close-btn">Close</button>
                                <?php if(!$isLoggedIn):?>
                                    <button class="purchase-btn" onclick="location.href='log_in.php'">Purchase</button>
                                <?php else: ?>
                                    <button class="purchase-btn" onclick="location.href='user_profile.php'">Purchase</button>
                                <?php endif ?>
                        </div>
                    </div>
                </div>
            <?php
                } 
            ?>
        </div>
        <?php endif; ?>
    </section>

    <section class="suv">
        <?php if(mysqli_num_rows($suzuki_product2) > 0): ?>
        <h1 id="suv">S U V s</h1>
        <div class="card-container">
            <?php
                while($row = mysqli_fetch_assoc($suzuki_product2)){
            ?>
                <div class="card" data-product-id="<?php echo $row['product_id'] ?>">
                    <img src="Products/<?php echo $row['product_img']?>" alt="">
                    <div class="card-content">
                        <div class="content">
                            <h2 class="card-title"><?php echo $row['product_name'] ?></h2>
                            <h3 class="price"><b><?php echo "Price: " . number_format($row['product_price'],2) ?></b></h3>
                            <p class="card-description">Click To Expand for more details</p>
                        </div>
                        <div class="card-info">
                            <h3>Product Info</h3>
                            <div class="card-info-btns">
                                <button class="card-information active" data-detail-type="engine_performances">Engine & Performance</button>
                                <button class="card-information" data-detail-type="dimensions">Dimension</button>
                                <button class="card-information" data-detail-type="interior_comfort">Interior & Comfort</button>
                                <button class="card-information" data-detail-type="safety">Safety</button>
                                <button class="card-information" data-detail-type="wheel">Wheels</button>
                                <button class="card-information" data-detail-type="features">Features</button>
                            </div>
                            <hr>
                            <div class="details" id="details-<?php echo $row['product_id'] ?>">
                                <div class="detail-section" data-type="engine_performances" style="display:block;">
                                    <p><?php echo htmlspecialchars($row['engine_performances']); ?></p>
                                </div>
                                <div class="detail-section" data-type="dimensions" style="display:none;">
                                    <p><?php echo htmlspecialchars($row['dimensions']); ?></p>
                                </div>
                                <div class="detail-section" data-type="interior_comfort" style="display:none;">
                                    <p><?php echo htmlspecialchars($row['interior_comfort']); ?></p>
                                </div>
                                <div class="detail-section" data-type="safety" style="display:none;">
                                    <p><?php echo htmlspecialchars($row['safety']); ?></p>
                                </div>
                                <div class="detail-section" data-type="wheel" style="display:none;">
                                    <p><?php echo htmlspecialchars($row['wheel']); ?></p>
                                </div>
                                <div class="detail-section" data-type="features" style="display:none;">
                                    <p><?php echo htmlspecialchars($row['features']); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="process-btn">
                                <button class="close-btn">Close</button>
                                <?php if(!$isLoggedIn):?>
                                    <button class="purchase-btn" onclick="location.href='log_in.php'">Purchase</button>
                                <?php else: ?>
                                    <button class="purchase-btn" onclick="location.href='user_profile.php'">Purchase</button>
                                <?php endif ?>
                        </div>
                    </div>
                </div>
            <?php
                } 
            ?>
        </div>
        <?php endif; ?>
    </section>

    <section class="mpv">
        <?php if(mysqli_num_rows($suzuki_product4) > 0): ?>
        <h1 id="mpv">M P V s</h1>
        <div class="card-container">
            <?php
                while($row = mysqli_fetch_assoc($suzuki_product4)){
            ?>
                <div class="card" data-product-id="<?php echo $row['product_id'] ?>">
                    <img src="Products/<?php echo $row['product_img']?>" alt="">
                    <div class="card-content">
                        <div class="content">
                            <h2 class="card-title"><?php echo $row['product_name'] ?></h2>
                            <h3 class="price"><b><?php echo "Price: " . number_format($row['product_price'],2) ?></b></h3>
                            <p class="card-description">Click To Expand for more details</p>
                        </div>
                        <div class="card-info">
                            <h3>Product Info</h3>
                            <div class="card-info-btns">
                                <button class="card-information active" data-detail-type="engine_performances">Engine & Performance</button>
                                <button class="card-information" data-detail-type="dimensions">Dimension</button>
                                <button class="card-information" data-detail-type="interior_comfort">Interior & Comfort</button>
                                <button class="card-information" data-detail-type="safety">Safety</button>
                                <button class="card-information" data-detail-type="wheel">Wheels</button>
                                <button class="card-information" data-detail-type="features">Features</button>
                            </div>
                            <hr>
                            <div class="details" id="details-<?php echo $row['product_id'] ?>">
                                <div class="detail-section" data-type="engine_performances" style="display:block;">
                                    <p><?php echo htmlspecialchars($row['engine_performances']); ?></p>
                                </div>
                                <div class="detail-section" data-type="dimensions" style="display:none;">
                                    <p><?php echo htmlspecialchars($row['dimensions']); ?></p>
                                </div>
                                <div class="detail-section" data-type="interior_comfort" style="display:none;">
                                    <p><?php echo htmlspecialchars($row['interior_comfort']); ?></p>
                                </div>
                                <div class="detail-section" data-type="safety" style="display:none;">
                                    <p><?php echo htmlspecialchars($row['safety']); ?></p>
                                </div>
                                <div class="detail-section" data-type="wheel" style="display:none;">
                                    <p><?php echo htmlspecialchars($row['wheel']); ?></p>
                                </div>
                                <div class="detail-section" data-type="features" style="display:none;">
                                    <p><?php echo htmlspecialchars($row['features']); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="process-btn">
                                <button class="close-btn">Close</button>
                                <?php if(!$isLoggedIn):?>
                                    <button class="purchase-btn" onclick="location.href='log_in.php'">Purchase</button>
                                <?php else: ?>
                                    <button class="purchase-btn" onclick="location.href='user_profile.php'">Purchase</button>
                                <?php endif ?>
                        </div>
                    </div>
                </div>
            <?php
                } 
            ?>
        </div>
        <?php endif; ?>
    </section>

    <section class="promos">
        <div class="Promos">
            <h1>Promos</h1>
        </div>
        <div class="slider">
            <div class="list">
                <div class="item">
                    <img src="images/product_img/promo.jpg" alt="" onclick="location.href='#'">
                </div>
                <div class="item">
                    <img src="images/product_img/honda promo cars.jpg" alt="">
                </div>
                <div class="item">
                    <img src="images/product_img/suzuki s-presso promo.jpg" alt="">
                </div>
            </div>
            <div class="buttons-promos">
                <button id="previous"><</button>
                <button id="next">></button>
            </div>
            <ul class="dots">
                <li class="active"></li>
                <li></li>
                <li></li>
            </ul>
        </div>
    </section>
    <button id="goup"><span class="arrow-up">^</span> </button>
    <script src="./js/slider.js">
    </script>
    <script src="./js/card.js"></script>
    <script src="./js/fetch_product.js"></script>
    <script src="./js/scroll.js"></script>   
    </script>
</body>
</html>
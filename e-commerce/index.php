<?php
session_start();
include("connect.php");
$isLoggedIn = isset($_SESSION["username"]);

$sql_suzuki = "SELECT p.*, pd.engine_performances, pd.dimensions, pd.interior_comfort, pd.safety, pd.wheel, pd.features 
                   FROM products p 
                   JOIN products_description pd ON p.products_description_id = pd.products_description_id 
                   WHERE p.product_brand = 'Suzuki' LIMIT 3";
    
$sql_honda = "SELECT p.*, pd.engine_performances, pd.dimensions, pd.interior_comfort, pd.safety, pd.wheel, pd.features 
                  FROM products p 
                  JOIN products_description pd ON p.products_description_id = pd.products_description_id 
                  WHERE p.product_brand = 'Honda' LIMIT 3";

$suzuki_product = $conn->query($sql_suzuki);
$honda_product = $conn->query($sql_honda);

$purchaseMessage = isset($_SESSION['purchase_message']) ? $_SESSION['purchase_message'] : null;

if (isset($_SESSION['purchase_message'])) {
    unset($_SESSION['purchase_message']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
</head>
<body>
    <header>
        <div class="icon">
            <a id="headers"><img src="./images/header_img/icon.png" alt="image here" height=40></a>
        </div>
        <nav class="nav-bar">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a id="promos">Promos</a></li>
                <li><a id="loans">Loan</a></li>
                <li><a id="contactus">Contact Us</a></li>
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
                <button onclick="location.href='user_profile.php'" class="login-btn"><img src="./images/header_img/login_icon.png" alt="log_in"></button>
            <?php endif ?>
        </div>
    </header>
    <main>
        <section class="header" id="header-section">
            <div class="container">
                <img src="./images/header_img/icon transparent.png" alt="Jenather Logo" height="400">
                <h1>Ready To Have Your First Car?</h1>
            </div>
            <div class="buttons">
                <button class="main-btn" id="suzuki">
                    <span class="circle">
                        <span class="arrow"></span>
                    </span>
                    <span class="text">Suzuki</span>
                </button>
                <button class="main-btn" id="honda">
                    <span class="circle">
                        <span class="arrow"></span>
                    </span>
                    <span class="text">Honda</span>
                </button>
            </div>
        </section>
        <section class="suzuki" id="suzuki-section">
            <div class="title">
                <img src="./images/header_img/suzuki.webp" alt="suzuki">
            </div>
            <div class="card-container">
                <?php
                    while($row = mysqli_fetch_assoc($suzuki_product)){
                        $isOutOfStock = $row['product_quantity'] <= 0;
                ?>
                <div class="card" data-product-id="<?php echo $row['product_id'] ?>">
                    <img src="Products/<?php echo $row['product_img']?>" alt="">
                    <div class="card-content">
                        <div class="content">
                            <h2 class="card-title"><?php echo $row['product_name'] ?></h2>
                            <h3 class="price"><b><?php echo "Price: ₱" . number_format($row['product_price'],2) ?></b></h3>
                            <?php if ($isOutOfStock): ?>
                                <p class="out-of-stock" style="color: red; font-weight: bold;">Out of Stock</p>
                            <?php else: ?>
                                <p class="card-description">Click To Expand for more details</p>
                            <?php endif; ?>
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
                            <?php if ($isOutOfStock): ?>
                                <button class="purchase-btn" disabled style="background-color: grey;">Unavailable</button>
                            <?php else: ?>
                                <?php if(!$isLoggedIn):?>
                                    <button class="purchase-btn" onclick="location.href='log_in.php'">Purchase</button>
                                <?php else: ?>
                                    <form action="purchase.php" method="POST">
                                        <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                                        <button class="purchase-btn" type="submit">Purchase</button>
                                    </form>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php
                    } 
                ?>
            </div>
            <?php if ($purchaseMessage): ?>
                <div id="popup" class="popup">
                    <div class="popup-content">
                        <p><?php echo htmlspecialchars($purchaseMessage); ?></p>
                        <button id="closePopup" class="popup-close-btn">OK</button>
                    </div>
                </div>
            <?php endif; ?>
            <div class="see-more" onclick="location.href='suzuki.php'">
                <h1>see more about</h1>
                <img src="./images/header_img/suzuki.webp" alt="suzuki" class="see-more-products">
                <i class='bx bx-right-arrow-alt'></i>
            </div>
        </section>
        <section class="honda" id="honda-section">
            <div class="title">
                <img src="./images/header_img/honda.png" alt="honda" class="hondas">
            </div>
            <div class="card-container">
                <?php
                    while($row = mysqli_fetch_assoc($honda_product)){
                        $isOutOfStock = $row['product_quantity'] <= 0;
                ?>
                <div class="card" data-product-id="<?php echo $row['product_id'] ?>">
                    <img src="Products/<?php echo $row['product_img']?>" alt="">
                    <div class="card-content">
                        <div class="content">
                            <h2 class="card-title"><?php echo $row['product_name'] ?></h2>
                            <h3 class="price"><b><?php echo "Price: ₱" . number_format($row['product_price'],2) ?></b></h3>
                            <?php if ($isOutOfStock): ?>
                                <p class="out-of-stock" style="color: red; font-weight: bold;">Out of Stock</p>
                            <?php else: ?>
                                <p class="card-description">Click To Expand for more details</p>
                            <?php endif; ?>
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
                            <?php if ($isOutOfStock): ?>
                                <button class="purchase-btn" disabled style="background-color: grey;">Unavailable</button>
                            <?php else: ?>
                                <?php if(!$isLoggedIn):?>
                                    <button class="purchase-btn" onclick="location.href='log_in.php'">Purchase</button>
                                <?php else: ?>
                                    <form action="purchase.php" method="POST">
                                        <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                                        <button class="purchase-btn" type="submit">Purchase</button>
                                    </form>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php
                    } 
                ?>
            </div>
            <div class="see-more" onclick="location.href='honda.php'">
                <h1>see more about</h1>
                <img src="./images/header_img/honda.png" alt="suzuki" class="see-more-products-honda">
                <i class='bx bx-right-arrow-alt'></i>
            </div>
        </section>
    </main>
    <section class="promos" id="promos-section">
        <div class="Promos">
            <h1>Promos</h1>
        </div>
        <div class="slider">
            <div class="list">
                <div class="item">
                    <img src="./images/product_img/suzuki promo cars.jpg" alt="" onclick="location.href='#'">
                </div>
                <div class="item">
                    <img src="./images/product_img/suzuki promo.png" alt="">
                </div>
                <div class="item">
                    <img src="./images/product_img/suzuki promo cars.jpg" alt="">
                </div>
                <div class="item">
                    <img src="./images/product_img/suzuki promo.png" alt="">
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
                <li></li>
            </ul>
        </div>
    </section>
    <div id="loaning">
        <h1 id="autoloanh1">AUTO LOAN</h1>
        <img id="autoloan" src="./images/finances_img/AutoLoan.webp" alt="">
        <h2 id="financing">Click Financing Partner for Auto Loan</h2>
    </div>

    <section id="loan" id="loanings-section">
        <div class="loaningsec" id="bpi">
        <img style="width: 450px; height: 250px; object-fit: cover; z-index: 1;" src="images/finances_img/bpi.png" alt="">
            <div class="column">
                <h3 id="bpih3">BANK OF THE PHILIPPINE ISLANDS ( BPI )</h3>
                <p id="bpip">We are always at your disposal: thanks to our national network, there is always <br> a Suzuki partner close to you</p>
                <button class="readmore">Read More<span class="readmore-arrow">→</span></button>    
            </div>
        </div>
        <div class="loaningsec" id="boc">
            <div class="column">
                <h3 id="boch3">BANK OF COMMERCE ( BOC )</h3>
                <p id="bocp">Suzuki Financial Services financing program, through partnership with Impuls <br> Leasing.</p>
                <button class="readmore2">Read More<span class="readmore-arrow2">→</span></button>
            </div>
            <img style="width: 450px; height: 250px; object-fit: cover; z-index: 1; " src="images/finances_img/bankofcommerce.png" alt="">
        </div>
        <div class="loaningsec" id="bdo" >
            <img style="width: 450px; height: 250px; object-fit: cover; z-index: 1;" src="images/finances_img/bdo.png" alt="">
            <div class="column">
                <h3 id="bdoh3">BANKO DE ORO ( BDO )</h3>
                <p id="bdop">Suzuki Roadside Assistance - 3 years of worry-free travel!</p>
                <button class="readmore">Read More<span class="readmore-arrow">→</span></button>
            </div>
        </div>
        <div class="loaningsec" id="cbs">
            <div class="column">
                <h3 id="cbsh3">CHINA BANK SAVINGS ( CBS )</h3>
                <p id="cbsp">We make sure you don't worry!</p>
                <button class="readmore2">Read More<span class="readmore-arrow2">→</span></button>
            </div>
            <img style="width: 450px; height: 250px; bottom: 75px; object-fit: cover; z-index: 1;" src="images/finances_img/cbs.png" alt="">
        </div>
        <div class="loaningsec" id="ewbc">
            <img style=" width: 450px; height: 250px; object-fit: cover; z-index: 1;" src="images/finances_img/eastwest.png" alt="">
            <div class="column">
                <h3 id="ewbch3">EAST WEST BANKING CORPORATION</h3>
                <p id="ewbcp">We make sure you don't worry!</p>
                <button class="readmore">Read More<span class="readmore-arrow">→</span></button>
            </div>
        </div>
        <div class="loaningsec" id="mp">
            <div class="column">
                <h3 id="mph3">MAYBANK PHILIPPINES</h3>
                <p id="mpp">We make sure you don't worry!</p>
                <button class="readmore2">Read More<span class="readmore-arrow2">→</span></button>
            </div>
            <img style="width: 450px; height: 250px; object-fit: cover; z-index: 1;" src="images/finances_img/maybank.png" alt="">
        </div>
        <div class="loaningsec" id="psb">
            <img style="width: 450px; height: 250px; object-fit: cover; z-index: 1;" src="images/finances_img/psbank.png" alt="">
            <div class="column">
                <h3 id="psbh3">PHILIPPINE SAVINGS BANK</h3>
                <p id="psbp">We make sure you don't worry!</p>
                <button class="readmore">Read More<span class="readmore-arrow">→</span></button>
            </div>
        </div>
        <div class="loaningsec" id="rcbc">
            <div class="column">
                <h3 id="rcbch3">THE RIZAL COMMERCIAL BANKING CORPORATION</h3>
                <p id="rcbcp">We make sure you don't worry!</p>
                <button class="readmore2">Read More<span class="readmore-arrow2">→</span></button>
            </div>
            <img style="width: 450px; height: 250px; bottom: 75px; object-fit: cover; z-index: 1;" src="images/finances_img/RCBC.png" alt="">
        </div>
        <div class="loaningsec" id="rb">
            <img style="width: 460px; height: 250px; object-fit: cover; z-index: 1;" src="images/finances_img/robinsonsbank.png" alt="">
            <div class="column">
                <h3 id="rbh3">ROBINSONS BANK</h3>
                <p id="rbp">We make sure you don't worry!</p>
                <button class="readmore">Read More<span class="readmore-arrow">→</span></button>
            </div>
        </div>
    </section>

    <footer id="contact-section">
        <h1 style="position: absolute; padding: 30px; left:300px; font-size: 50px; color: white;">CONTACT US</h1>
        <img style="object-fit: cover; width: 100%; margin: 0 auto; max-width: 1300px;" src="images/header_img/car interior design.jpeg" alt="">
        <p class="gmail">faboradanathaniel@gmail.com | 0966-671-2004 | Cacarong Matanda Pandi, Bulacan</p>
        <br>
        <p class="gmail">dietherpano95@gmail.com |  0945-672-7395 | Cacarong Bata Pandi,Bulacan</p>
        <br>
        <p class="gmail">jetpadilla07@gmail.com | 0915-548-0755 | Cacarong Bata Pandi,Bulacan</p>
    </footer>
    <img src="./images/profile_svg/go-up-svgrepo-com.svg" alt="" height='35' id="goup">
    <script src="./js/slider.js">
    </script>
    <script src="./js/card.js"></script>
    <script src="./js/fetch_product.js"></script>
    <script src="./js/scroll.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const popup = document.getElementById("popup");
            const closePopup = document.getElementById("closePopup");

            if (popup) {
                closePopup.addEventListener("click", () => {
                    popup.style.display = "none";
                });

                // Auto-close the popup after 5 seconds
                setTimeout(() => {
                    popup.style.display = "none";
                }, 5000);
            }
        });
    </script>
</body>
</html>
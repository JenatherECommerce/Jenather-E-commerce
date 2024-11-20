<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
    <link rel="stylesheet" href="./styling_folder/admin.css">
    <link rel="stylesheet" href="./styling_folder/inventory.css">
</head>
<body>
    <nav>
        <img src="https://res.cloudinary.com/diwwqfwjb/image/upload/v1725281506/Jenather-Ecommerce/nwqfas3que4whtkngexj.png" alt="logo">
        <ul>
            
            <li><a href="adminHome.php">Home</a></li>
            <li><a href="Profile.php">Profile</a></li>
            <li><a href="Customers.php">Customer</a></li>
            <li><a href="Inventory.php">Inventory</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <section class="section-1">
        <div class="button_container">
            <button class="button_1" type="button" onclick="switchContent('update_list'); return false;">Update Items</button>
            <button class="button_1" type="button" onclick="switchContent('add_product'); return false;">Add Items</button>

        </div>
        
        <div class="content" >
            <div id="add_product" class="add_product">
                <form action="Inventory_product.php" class="form" method="post" enctype="multipart/form-data">
                    
                    <section class="section1">
                        <div class="img_holder">
                            <img src="https://res.cloudinary.com/diwwqfwjb/image/upload/v1725281506/Jenather-Ecommerce/nwqfas3que4whtkngexj.png" alt="" id="result" >
                            <input placeholder="file" type="file" accept=".png" id="car_viewing" name="product_img" onchange="readFile();">
                        </div>
                         <div class="input_holder">
                            <input class="input_cars" type="text" name="product_quantity" placeholder="Car Quantity" required>
                            <input class="input_cars" type="text" name="product_brand" placeholder="Car Brand" required>
                            <input class="input_cars" type="text" name="product_name" placeholder="Car Name" required>
                            <input class="input_cars" type="numbers" name="product_price" placeholder="Car Price" required>
                            <input class="input_cars" type="text" name="body_config" placeholder="Car Body Configuration" required>
                            
                        </div>
                    </section> 

                    <section class="section2">

                    <div class="textarea_container">
                            <textarea class="discription" name="engine_performances" placeholder="Engine Performances" required></textarea>
                            <textarea class="discription" name="dimensions" placeholder="Dimensions" required></textarea>
                            <textarea class="discription" name="interior_comfort" placeholder="Interior Comfort" required></textarea>
                        </div>
                        <div class="textarea_container">
                            <textarea class="discription" name="safety" placeholder="Safety" required></textarea>
                            <textarea class="discription" name="wheel" placeholder="Wheel" required></textarea>
                            <textarea class="discription" name="features" placeholder="Features" required></textarea>
                        </div>
                        
                    </section>
                    <div class="button_container">
                            <button class="submit_button" type="submit" name="add_product" >Upload</button>
                            <button class="submit_button" type="submit" name="cancel" >Cancel</button>

                    </div>
                </form>
            </div>
    
            <div id="update_list" class="hidden update_list"> 
            <div class="button_container">
    <button class="carbrand" type="button" onclick="showCarContent('Suzuki')">Suzuki</button>
    <button class="carbrand" type="button" onclick="showCarContent('Honda')">Honda</button>
</div>

<div class="suzukifetchingphp"></div>
<div class="hondafetchingphp"></div>

                
                
            </div> 
        </div>


    </section>


    <script src="./function_folder/inventory_function.js"></script>
</body>
</html>
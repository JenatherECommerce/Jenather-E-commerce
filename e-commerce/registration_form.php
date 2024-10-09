

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/reg_form.css">
</head>
<body>
    <div class="reg-icon"><img src="./images/reg_form_img/icon.png" alt="img" height="50">
        <h2>Make a Move with speed</h2>
    </div>
    <section class="reg-form">
        <div class="reg-contents" id="signUp">
            <H1>Registration Form</H1>
            <form action="registration.php" method="post" class='form' autocomplete="off">
                <div class="column">
                    <div class="reg-input">
                        <label for="username">Username</label>
                        <input type="text" name="username" placeholder="Username" required>
                    </div>
                    <div class="reg-input">
                        <label for="firstname">Firstname</label>
                        <input type="text" name="firstname" placeholder="Firstname" required>
                    </div>
                </div>
                <div class="column">
                    <div class="reg-input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Password" required>
                    </div>
                    <div class="reg-input">
                        <label for="lastname">Lastname</label>
                        <input type="text" name="lastname" placeholder="Lastname" required>
                    </div>
                </div>
                <div class="column">
                    <div class="reg-input">
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="reg-input">
                        <label for="date">Birthdate</label>
                        <input type="date" name="date" placeholder="Birthdate" required>
                    </div>
                </div>     
                <div class="gender-box">
                    <h3>Gender</h3>
                    <div class="gender-option">
                        <div class="gender">
                            <input type="radio" id="male" name="gender" value="male">
                            <label for="male">Male</label>
                        </div>
                        <div class="gender">
                            <input type="radio" id="female" name="gender" value="female">
                            <label for="female">Female</label>
                        </div>
                    </div>
                </div>
                <div class="reg-input address">
                <label for="address">Address</label>
                    <input type="text" name="address" id="address" placeholder="Enter Street Address" required>
                    <div class="column">
                        <div class="select-box">
                            <select name="country" id="a">
                                <option hidden>Country</option>
                                <option>Philippines</option>
                                <option>Japan</option>
                            </select>
                        </div>
                        <input type="text" name="city" placeholder="Enter Your City" required>
                    </div>
                    <div class="column">
                        <input type="text" name="region" placeholder="Enter Your Region" required>
                        <input type="text" name="postal" placeholder="Enter Postal Code" required>
                    </div>
                <div class="column">
                    <button type="submit" name="signUp"  class="reg-btn" >Confirm</button>
                    <button type="reset" onclick="location.href='log_in.php'" class="reg-btn">Cancel</button>
                </div>
                </div>
                
            </form>
        </div>
    </section>
</body>
</html>
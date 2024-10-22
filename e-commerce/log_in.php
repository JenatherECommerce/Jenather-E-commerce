<?php
session_start();
$successMessage = isset($_SESSION['success_message']) ? $_SESSION['success_message'] : '';

$error = isset($_SESSION['error']) ? $_SESSION['error'] : '';
$usernameError = isset($_SESSION['username_error']);
$usernameClass = $error ? 'input-error' : '';
$passwordClass = $error ? 'input-error' : '';

unset($_SESSION['error']);
unset($_SESSION['username_error']);
unset($_SESSION['success_message']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jenather Car Dealership</title>
    <link rel="stylesheet" href="./css/login.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body>
    <section class="body">
        <div class="logo-container">
            <img src="./images/log_in_img/logo.png" height="500" alt="HAhaha">
        </div>
        <div class="wrapper" id="signIn">
            <form action="login.php" method="post" autocomplete="off">
                <h1>Login</h1>
                <?php if($successMessage): ?>
                    <script>
                        alert('<?= $_successMessage ?>');
                    </script>
                <?php endif; ?>
                <div class="input-box">
                    <input type="text" name="username" id="username" placeholder="Username" required>
                    <i class="bx bxs-user"></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <i class="bx bxs-lock-alt"></i>
                </div>
                <?php if ($error): ?>
                    <div class="error-message"><?= $error ?></div>
                <?php endif; ?>

                <div class="remember-forgot">
                    <label><input type="checkbox">Remember me</label>
                    <a href="#">Forgot Password?</a>
                </div>
                <button type="submit" class="btn" name="signIn">Login</button>

                <div class="register-link">
                    <p>Don't have an account? <a href="registration_form.php">Register</a></p>
                </div>
            </form>
        </div>
    </section>
</body>
</html>
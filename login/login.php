<?php
  require '../Admin/config.php';
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<link rel="stylesheet" href="style.css">

<head>
    <title>Login</title>
</head>

<body>
    <div class="login-popup">
        <span class="close-btn material-symbols-outlined">close</span>
        <div class="form-box">
            <div class="form-details">
                <h2>Welcome Back</h2>
                <p>Please log in using your personal imformation to stay connected with us</p>
            </div>

            <div class="form-content">
                <h2>LOGIN</h2>
                <form action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF"]); ?>" method="post">
                    <span class="error">
                        <?php echo $usernameErr; ?>
                    </span>
                    <span class="error">
                        <?php echo $passwordErr; ?>
                    </span>
                    <div class="input-field">
                        <input type="email" required name="username">
                        <label for="emai">Email</label>
                    </div>

                    <div class="input-field">
                        <input type="password" required name="password">
                        <label for="password">Password</label>
                    </div>

                    <a href="#" class="forgot-pass">Forgot password?</a>

                    <button type="submit">Log In</button>
                </form>
                <div class="bottom-link">
                    Don't have an account?
                    <a href="#">SignUp</a>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>
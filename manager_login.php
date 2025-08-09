<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css" />
    <title>Document</title>
</head>
<body>
    <section id="login-signup">
        <div class="login-container container">
            <h2>Login or Sign Up</h2>

            <div>
                <ul style="color: red; text-align: left;">
                    <?php
                        if (isset($_GET['error'])) {
                            echo "<li> ". $_GET['error'] ." </li>";
                        }
                    ?>
                </ul>
            </div>
            
            <div id="login-form">
                <h3>Login</h3>
                <form action="./htServer/login.php" method="POST">
                    <input type="email" placeholder="email" name="login-email" />
                    <input type="password" placeholder="Password" name="login-password" />
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
                <p>Don't have an account? <a href="#" id="switch-to-signup">Sign up</a></p>
            </div>

            <!-- Signup Form -->
            <div id="signup-form" style="display: none;">
                <h3>Sign Up</h3>
                <form action="./htServer/signup.php" method="POST">
                    <input type="text" placeholder="Full Name" name="fullname" />
                    <input type="number" placeholder="Phone" name="phone" />
                    <input type="email" placeholder="Email" name="email" />
                    <input type="password" placeholder="Password" name="signup-password" />
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                </form>
                <p>Already have an account? <a href="#" id="switch-to-login">Log in</a></p>
            </div>
        </div>
    </section>
</body>
<footer id="footer">
    <h2>Restaurant &copy; all rights reserved</h2>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="./js/login.js"></script>

<?php
    if (isset($_GET['from']) && $_GET['from'] == 'signup') {
        echo "<script>           
            var switchToLoginBTN = document.getElementById('switch-to-signup');
            switchToLoginBTN.click();

        </script>";
    }
?>

</html>


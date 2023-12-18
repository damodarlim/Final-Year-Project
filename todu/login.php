<?php
session_start();
include ('includes/dbconnect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="img/favicon.jpg" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300&display=swap" rel="stylesheet">
</head>
<body class="login-signup-body">

    <div class="container" id="login-container">
        <div class="card" id="login-card">
            <form action="includes/login_process.php" method="post">
            <?php
            // Check for signup success message
            if (isset($_SESSION['signup_success']) && $_SESSION['signup_success'] === true) {
              echo '<div class="alert alert-success text-center my-4" role="alert">';
              echo 'Congratulations! Your account was successfully created. You can now log in.';
              echo '</div>';

              // Clear the session variable after displaying the message
              unset($_SESSION['signup_success']);
            }

            ?>
               <!-- Back to Home Link -->
               <p class="mt-3">
                    <a href="index.php">&#8592 Back to Home</a>
                </p>
                <!-- Email/Username Field -->
                <div class="mb-3">
                    <label for="email_username" class="form-label">Email or Username:</label>
                    <input type="text" class="form-control" id="email_username" name="email_username" required>
                </div>

                <!-- Password Field -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <!-- Forgot Password Link -->
                <a href="forgot_password.php">Forgot Password?</a>

                <!-- Login Button -->
                <button type="submit" class="btn btn-primary">Login</button>
            </form>

            <!-- Sign Up Button -->
            <p class="mt-3">Don't have an account? <a href="signup.php">Sign Up</a></p>
        </div>
    </div>

</body>
</html>

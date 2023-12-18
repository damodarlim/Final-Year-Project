<?php 
include ('includes/dbconnect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="shortcut icon" href="img/favicon.jpg" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300&display=swap" rel="stylesheet">
</head>
<body class="login-signup-body">

    <div id="login-container" class="container">
        <div id="login-card" class="card">
            <form action="includes/signup_process.php" method="post">
                <!-- Username Field -->
                <div class="mb-1">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>

                <!-- Email Field -->
                <div class="mb-1">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" maxlength="50" id="email" name="email" required>
                </div>

                <!-- First Name Field -->
                <div class="mb-1">
                    <label for="first_name" class="form-label">First Name:</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" required>
                </div>

                <!-- Last Name Field -->
                <div class="mb-1">
                    <label for="last_name" class="form-label">Last Name:</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" required>
                </div>

                <!-- Mobile Number Field -->
                <div class="mb-1">
                    <label for="mobile_number" class="form-label">Mobile Number:</label>
                    <input type="tel" class="form-control" maxlength="11" pattern="[0-9]{3}-[0-9]{7,}" placeholder="Contact No. (xxx-xxxxxxx)" id="mobile_number" name="mobile_number" required>
                </div>

                <!-- Password Field -->
                <div class="mb-1">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control" pattern="(?=.*\d).{8,}" maxlength="50" id="password" name="password" required>
                </div>

                <!-- Confirm Password Field -->
                <div class="mb-1">
                    <label for="confirm_password" class="form-label">Confirm Password:</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                </div>

                <!-- Sign Up Button -->
                <button type="submit" class="btn btn-primary">Sign Up</button>
            </form>

            <!-- Login Link -->
            <p class="mt-2">Already have an account? <a href="login.php">Login</a></p>
        </div>
    </div>

</body>
</html>

<?php
include('includes/header.php');
include('includes/dbconnect.php');
$user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;

// Check if the signup was successful for logged-in users
$signup_success = isset($_SESSION['signup_success']) && $_SESSION['signup_success'];

// Clear the session variable to avoid displaying the message on page refresh
unset($_SESSION['signup_success']);

?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4">Sign Up as a Patron</h2>

            <?php if ($user_id) : ?>
                <!-- Display user information if logged in -->
                <p class="lead">You are already logged in. Your information:</p>
                <ul>
                    <?php
                    function getUserDetails($user_id, $conn)
                    {
                        $sql = "SELECT first_name, last_name, email, mobile FROM user_table WHERE id = '$user_id'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            return $row;
                        } else {
                            return null;
                        }
                    }

                    $userDetails = getUserDetails($user_id, $conn);
                    $fullName = $userDetails['first_name'] . ' ' . $userDetails['last_name'];
                    ?>
                    
                    <!-- Display success message if signup was successful -->
                    <?php if ($signup_success) : ?>
                        <div class="alert alert-success" role="alert">
                            You have successfully signed up as a patron!
                        </div>
                    <?php endif; ?>

                    <li>Name: <?php echo $fullName; ?></li>
                    <li>Email: <?php echo $userDetails['email']; ?></li>
                    <li>Phone: <?php echo $userDetails['mobile']; ?></li>
                </ul>
                <?php
                  // Check if there is a signup error message
                  if (isset($_SESSION['signup_error'])) {
                      echo '<div class="alert alert-danger" role="alert">' . $_SESSION['signup_error'] . '</div>';
                      // Clear the session variable to avoid showing the message on page refresh
                      unset($_SESSION['signup_error']);
                  }
                  ?>

                <!-- Display signup form if not logged in -->
                <form action="process_patron_signup.php" method="post">
                    <input type="hidden" name="name" value="<?php echo $fullName; ?>">
                    <input type="hidden" name="email" value="<?php echo $userDetails['email']; ?>">
                    <input type="hidden" name="phone" value="<?php echo $userDetails['mobile']; ?>">
            <?php else : ?>
                <!-- Display success message if signup was successful -->
                <?php if ($signup_success) : ?>
                    <div class="alert alert-success" role="alert">
                        Successfully signed up as a patron!
                    </div>
                    <?php
                    unset($_SESSION['signup_success']);
                endif;
                ?>

                <!-- Display error message if signup was unsuccessful -->
                <?php if (isset($_SESSION['signup_error'])) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $_SESSION['signup_error']; ?>
                    </div>
                    <?php
                    unset($_SESSION['signup_error']);
                endif;
                ?>

                <form action="process_patron_signup.php" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Your Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Your Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Your Phone Number</label>
                        <input type="tel" class="form-control" id="phone" name="phone" pattern="[0-9]{10}" placeholder="e.g., 1234567890" required>
                        <small id="phoneHelp" class="form-text text-muted">Please enter a 10-digit phone number.</small>
                    </div>
            <?php endif; ?>

            <div class="mb-3">
                <label for="amount" class="form-label">Amount to Contribute</label>
                <input type="number" class="form-control" id="amount" name="amount" required>
                <small id="amountHelp" class="form-text text-muted">Enter the amount you wish to contribute.</small>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
</div>

<!-- Additional content or scripts can go here -->

<?php include('includes/footer.php'); ?>

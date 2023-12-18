<?php
include('includes/header.php');

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page if not logged in
    header('Location: login.php');
    exit();
}

$userID = $_SESSION["id"];

include('includes/dbconnect.php');

// Fetch user details
$sql = "SELECT * FROM user_table WHERE id = '$userID'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
?>

<div class="container" id="userProfileContainer">
    <div class="row justify-content-center">
        <div class="col-lg-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title text-center mb-4">My Profile</h1>

                    <form action="edit_user_profile.php?id=<?php echo $_SESSION['id']; ?>" method="POST" enctype="multipart/form-data">

                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <p id="name" class="form-control-static"><?php echo $row["username"]; ?></p>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <p id="email" class="form-control-static"><?php echo $row["email"]; ?></p>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <p id="password" class="form-control-static">********</p>
                        </div>

                        <div class="mb-3">
                            <label for="contact" class="form-label">Contact:</label>
                            <p id="contact" class="form-control-static"><?php echo $row["mobile"]; ?></p>
                        </div>
                        <!-- Hidden input for user ID -->
                        <input type="hidden" name="userID" value="<?php echo $row["id"]; ?>">
                        <div class="mb-3">
                            <label for="current_password" class="form-label">Current Password:</label>
                            <input type="password" class="form-control" id="current_password" name="current_password" required>
                        </div>

                        <div class="text-center mb-4">
                            <button type="submit" class="btn btn-primary" name="edit"><i class='fa fa-edit' aria-hidden='true'></i> Edit</button>
                            <!-- Delete Account Button -->
                            <button type="submit" class="btn btn-danger" name="delete" onclick="return confirm('Are you sure you want to delete your account? This action cannot be undone.');">
                            <i class='fa fa-trash' aria-hidden='true'></i> Delete Account
                            </button>

                        </div>
                        

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
} else {
    echo "User not found";
}

// Close the database connection
$conn->close();

include('includes/footer.php'); // Include the footer file
?>

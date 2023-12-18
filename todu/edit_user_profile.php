<?php
include ('includes/header.php');
include ('includes/dbconnect.php');

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
  header('Location: login.php');
  exit();
}
if (isset($_POST['delete'])) {
  // Retrieve form data
  $user_id = isset($_POST['id']) ? mysqli_real_escape_string($conn, $_POST['id']) : null;
  $current_password = mysqli_real_escape_string($conn, $_POST['current_password']);

  $sql_select_password = "SELECT password FROM user_table WHERE id = ?";
  $stmt_select_password = mysqli_prepare($conn, $sql_select_password);
  mysqli_stmt_bind_param($stmt_select_password, "i", $user_id);
  mysqli_stmt_execute($stmt_select_password);
  $result_select_password = mysqli_stmt_get_result($stmt_select_password);
  $row = mysqli_fetch_assoc($result_select_password);
  $existing_password = $row['password'];

  if (password_verify($current_password, $existing_password)) {
      $sql_delete = "DELETE FROM user_table WHERE id = ?";
      $stmt_delete = mysqli_prepare($conn, $sql_delete);
      mysqli_stmt_bind_param($stmt_delete, "i", $user_id);
      $result_delete = mysqli_stmt_execute($stmt_delete);

      if ($result_delete) {
        session_unset();
        session_destroy();
          header("location: index.php");
          exit();
      } else {
          echo "Error deleting user account: " . mysqli_error($conn);
      }
  } else {
      echo "Incorrect current password. Account not deleted.";
  }
}

if (isset($_POST['btn-edit'])) {
    // Retrieve form data
    $user_id = isset($_POST['id']) ? mysqli_real_escape_string($conn, $_POST['id']) : null;
    $fname = mysqli_real_escape_string($conn, $_POST['editFirstName']);
    $lname = mysqli_real_escape_string($conn, $_POST['editLastName']);
    $user = mysqli_real_escape_string($conn, $_POST['editUsername']);
    $email = mysqli_real_escape_string($conn, $_POST['editEmail']);
    $new_password = mysqli_real_escape_string($conn, $_POST['editPassword']);
    $contact = mysqli_real_escape_string($conn, $_POST['editContact']);
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    $sql = "UPDATE user_table SET first_name = ?, last_name = ?, username = ?, email = ?, password = ?, mobile = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssi", $fname, $lname, $user, $email, $hashed_password, $contact, $user_id);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        header("location: user_profile.php");
        exit();
    } else {
        echo "Error updating user profile: " . mysqli_error($conn);
    }
}
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12 my-3">
                <h1 class="admin-heading">Edit User Profile</h1>
            </div>
            <div class="container d-flex justify-content-center">
                <?php
                $user_id = isset($_GET['id']) ? $_GET['id'] : null;
                if ($user_id !== null) {
                    $sql = "SELECT * FROM user_table WHERE id = {$user_id}";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                ?>
                            <!-- Form Start -->
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="w-50" autocomplete="off">

                                <div class="form-group my-4">
                                    <input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?>" required>
                                </div>
                                <div class="form-group my-4">
                                    <label>First Name</label>
                                    <input type="text" name="editFirstName" class="form-control" value="<?php echo $row['first_name']; ?>" required>
                                </div>
                                <div class="form-group my-4">
                                    <label>Last Name</label>
                                    <input type="text" name="editLastName" class="form-control" value="<?php echo $row['last_name']; ?>" required>
                                </div>
                                <div class="form-group my-4">
                                    <label>Username</label>
                                    <input type="text" name="editUsername" class="form-control" value="<?php echo $row['username']; ?>" required>
                                </div>
                                <div class="form-group my-4">
                                    <label>Email</label>
                                    <input type="email" name="editEmail" class="form-control" value="<?php echo $row['email']; ?>" required>
                                </div>
                                <div class="form-group my-4">
                                    <label>Password</label>
                                    <input type="password" name="editPassword" class="form-control" value="" required>
                                </div>
                                <div class="form-group my-4">
                                    <label>Contact</label>
                                    <input type="text" name="editContact" class="form-control" value="<?php echo $row['mobile']; ?>" required>
                                </div>
                                <div class="text-center mb-4">
                                <button class="btn btn-dark" type="submit" name="btn-edit">Submit</button>
                                </div>
                            </form>
                            <!-- Form End-->
                <?php
                        }
                    }
                } else {
                    echo "User ID is not set.";
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php include ('includes/footer.php'); ?>

<?php 
include ('../includes/dbconnect.php');
session_start();

// Redirect to the main page if the user is already logged in
if(isset($_SESSION["username"])){
    header("location: post.php");
    exit();
}

// Check login credentials
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    $sql = "SELECT member_id, username, password, role FROM member_table WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $member_id, $db_username, $db_password, $role);

        if (mysqli_stmt_fetch($stmt) && md5($password) === $db_password) {
            $_SESSION["username"] = $db_username;
            $_SESSION["member_id"] = $member_id;
            $_SESSION["member_role"] = $role;

            // Redirect to the desired location
            header("Location: post.php");
            exit();
        } else {
            $login_error = '<div class="alert alert-danger">Username and Password are incorrect!</div>';
        }

        mysqli_stmt_close($stmt);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ADMIN | Login</title>
        <link rel="shortcut icon" href="../img/favicon.jpg" />

        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" href="font/font-awesome-4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body class="login-signup-body">
        <div class="container" id="login-container">
            <div class="card" id="login-card">
                <!-- Form Start -->
                <form  action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
                <h3 class="heading">Admin Login</h3>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="" required>
                    </div>
                    <input type="submit" name="login" class="btn btn-primary" value="Login" />
                </form>
                <!-- /Form End -->
                <?php 
                    if (isset($login_error)) {
                        echo $login_error;
                    }
                ?>
            </div>
        </div>
    </body>
</html>


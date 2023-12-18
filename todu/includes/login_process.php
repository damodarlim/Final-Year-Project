<?php
include ('dbconnect.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Retrieve user input from the form
    $email_username = $_POST["email_username"];
    $password = $_POST["password"];

    // TODO: Implement any necessary validation for the input data
    if (empty($email_username) || empty($password)) {
        // Handle validation error, redirect to login page with an error message
        $_SESSION['login_error'] = "Please enter both email/username and password.";
        header("Location: ../login.php");
        exit();
    }
    // TODO: Implement your SQL query to retrieve user data based on email/username
    $sql = "SELECT * FROM user_table WHERE email = ? OR username = ?";
    
    // Create a prepared statement
    $stmt = $conn->prepare($sql);

    // Bind parameters to the statement
    $stmt->bind_param("ss", $email_username, $email_username);

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if the user exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    
        // Verify the password
        if (password_verify($password, $row["password"])) {
            // Password is correct, log in the user
            $_SESSION['id'] = $row['id'];
            $_SESSION["username"] = $row["username"]; 
    
            // Redirect to the index page
            header("Location: ../index.php");
            exit();
        } else {
            // Password is incorrect, redirect to login page with an error message
            $_SESSION['login_error'] = "Incorrect password.";
            header("Location: ../login.php");
            exit();
        }
    } else {
        // User does not exist, redirect to login page with an error message
        $_SESSION['login_error'] = "User not found.";
        header("Location: ../login.php");
        exit();
    }
}

// Close the statement and connection
$stmt->close();
$conn->close();

// Redirect to the login page if accessed without a form submission
header("Location: ../login.php");
exit();
?>

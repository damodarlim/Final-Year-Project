<?php
session_start();
include('includes/dbconnect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form was submitted with the proper data
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['amount'])) {
        // Sanitize and validate the input data
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $amount = mysqli_real_escape_string($conn, $_POST['amount']);

        $timestamp = date("Y-m-d H:i:s");

        $checkEmailQuery = "SELECT id FROM patron_table WHERE email = ?";
        $stmt = $conn->prepare($checkEmailQuery);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // Email is already used, redirect with an error message
            $_SESSION['signup_error'] = 'Email is already used. Please use a different email address.';
            header('Location: patron_signup.php');
            exit();
        }

        // Insert the data into the database using prepared statements
        $insertQuery = "INSERT INTO patron_table (name, email, phone, amount, date) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("ssiss", $name, $email, $phone, $amount, $timestamp);
        
        if ($stmt->execute()) {

            $_SESSION['signup_success'] = true;
            header("Location: patron_signup.php"); 
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Invalid form submission.";
    }
} else {
    header('Location: patron_signup.php');
    exit();
}

// Close the database connection
$stmt->close();
$conn->close();
?>

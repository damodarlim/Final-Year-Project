<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  include ('dbconnect.php');

  // Retrieve user input from the form
  $first_name = $_POST["first_name"];
  $last_name = $_POST["last_name"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $mobile_number = $_POST["mobile_number"];

  // TODO: Implement any necessary validation for the input data
  if (empty($first_name) || empty($last_name) || empty($username) || empty($email) || empty($password) || empty($mobile_number)) {
    // Handle validation error, redirect to signup page with an error message
    header("Location: ../signup.php?error=emptyfields");
    exit();
  }

  // Hash the password (for improved security, consider using password_hash)
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  // TODO: Implement your SQL query to insert data into the database using prepared statements
  $sql = "INSERT INTO user_table (first_name, last_name, username, email, password, mobile) VALUES (?, ?, ?, ?, ?, ?)";
  
  // Create a prepared statement
  $stmt = $conn->prepare($sql);

  // Bind parameters to the statement
  $stmt->bind_param("ssssss", $first_name, $last_name, $username, $email, $hashed_password, $mobile_number);

  // Execute the statement
  $stmt->execute();

  // Check for errors
  if ($stmt->errno) {
    die("Error: " . $stmt->error);
  }

  // Close the statement and connection
  $stmt->close();
  $conn->close();

  // Redirect to the login page with a success message
  $_SESSION['signup_success'] = true;
  header("Location: ../login.php");
  exit();
} else {
  // Redirect to the signup page if accessed without a form submission
  header("Location: ../signup.php");
  exit();
}
?>

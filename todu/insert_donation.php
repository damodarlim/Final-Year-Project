<?php
// Include your database connection logic
include('includes/dbconnect.php');

// Retrieve data from the POST request
$name = $_POST['name'];
$email = $_POST['email'];
$amount = $_POST['amount'];
$transaction_id = $_POST['transaction_id']; 

// Insert donation information into the database
$insertSql = "INSERT INTO donation_received (donation_id, payer_name, payer_email, amount, transaction_id, donation_date) 
              VALUES (?, ?, ?, ?, ?, NOW())";

// Prepare the SQL statement
$stmt = mysqli_prepare($conn, $insertSql);

// Bind parameters
mysqli_stmt_bind_param($stmt, "issss", $don_id, $name, $email, $amount, $transaction_id);

// Execute the statement
$insertResult = mysqli_stmt_execute($stmt);

// Check if the insertion was successful
if ($insertResult) {
    echo 'Donation information successfully stored in the database.';
} else {
    echo 'Failed to process donation. Please try again.';
}

// Close the statement and database connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>

<?php
include('includes/dbconnect.php');

// Ensure post variable exists
if (isset($_POST['email'])) {
    // Validate email address
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    if (!$email) {
        exit('Please provide a valid email address!');
    }

    // Check if email exists in the database
    $checkEmailQuery = "SELECT * FROM newsletter WHERE email = ?";
    $checkEmailStmt = mysqli_prepare($conn, $checkEmailQuery);
    mysqli_stmt_bind_param($checkEmailStmt, "s", $email);
    mysqli_stmt_execute($checkEmailStmt);
    mysqli_stmt_store_result($checkEmailStmt);

    if (mysqli_stmt_num_rows($checkEmailStmt) > 0) {
        header("Location: index.php?status=exists");
        exit();
    }

    // Insert email address into the database
    $insertQuery = "INSERT INTO newsletter (email, date_subbed) VALUES (?, ?)";
    $insertStmt = mysqli_prepare($conn, $insertQuery);
    $currentDate = date('Y-m-d\TH:i:s');
    mysqli_stmt_bind_param($insertStmt, "ss", $email, $currentDate);
    mysqli_stmt_execute($insertStmt);

    // Output success response
    header("Location: index.php?status=success");
    exit();

} else {
    // No post data specified
    exit('Please provide a valid email address!');
}
?>

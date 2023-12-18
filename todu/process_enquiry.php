<?php
include ('includes/dbconnect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    // Validate and sanitize email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address.";
        exit();
    }

    $stmt = $conn->prepare("INSERT INTO enquiries (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        // Send email
        $to = "info@todu.com";
        $subject = "Enquiry from $name";
        $body = "Name: $name\n";
        $body .= "Email: $email\n\n";
        $body .= "Message:\n$message";

        $headers = "From: " . filter_var($email, FILTER_SANITIZE_EMAIL);

        // Check if email is sent successfully
        if (mail($to, $subject, $body, $headers)) {
            echo "Thank you for your enquiry! We will get back to you soon.";
        } else {
            echo "Enquiry stored, but there was an error sending the email. We will get back to you soon.";
        }
    } else {
        echo "Sorry, there was an error processing your enquiry. Please try again later.";
    }
    $stmt->close();
    $conn->close();
} else {
    header("Location: index.php"); 
    exit();
}
?>

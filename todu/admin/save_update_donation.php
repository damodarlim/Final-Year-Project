<?php 
include ('../includes/dbconnect.php');

if (empty($_FILES['new-image']['name'])) {
    $file_name = $_POST['old_image'];
} else {
    $errors = array();

    $file_name = $_FILES['new-image']['name'];
    $file_size = $_FILES['new-image']['size'];
    $file_tmp = $_FILES['new-image']['tmp_name'];
    $file_type = $_FILES['new-image']['type'];
    $file_ext = strtolower(end(explode('.', $file_name)));
    $extensions = array("jpeg", "jpg", "png");

    if (!in_array($file_ext, $extensions)) {
        $errors[] = "This Extension file is not allowed, Please Choose a JPG or PNG file";
    }

    if ($file_size > 4097152) { // 4097152 is in bytes (2MB)
        $errors[] = "File size must be 2MB or lower.";
    }

    if (empty($errors)) {
        move_uploaded_file($file_tmp, "upload/donation/" . $file_name);
    } else {
        print_r($errors);
        die();
    }
}

// Prepare the SQL statement to update the post
$sql = "UPDATE donation_table SET title = ?, amount = ?, description = ?, donation_img = ? WHERE donation_id = ?";
$stmt = mysqli_prepare($conn, $sql);

if ($stmt) {
    // Use prepared statements consistently to prevent SQL injection
    $trimmedDescription = trim($_POST["dondesc"]);
    mysqli_stmt_bind_param($stmt, "sssss", $_POST["donation_title"],$_POST["donation_amount"], $trimmedDescription, $file_name, $_POST["donation_id"]);
    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    if ($result) {
      header("location: {$hostname}/admin/donation.php");
    } else {
      echo "Query Failed: " . mysqli_error($conn);
    }
} else {
    echo "Prepared statement failed";
}
?>

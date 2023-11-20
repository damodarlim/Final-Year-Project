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
        move_uploaded_file($file_tmp, "upload/activity/" . $file_name);
    } else {
        print_r($errors);
        die();
    }
}

// Prepare the SQL statement to update the post
$sql = "UPDATE activities_table SET title = ?, description = ?, activity_img = ? WHERE activity_id = ?";
$stmt = mysqli_prepare($conn, $sql);

if ($stmt) {
    // Use prepared statements consistently to prevent SQL injection
    mysqli_stmt_bind_param($stmt, "ssss", $_POST["activity_title"], $_POST["actdesc"], $file_name, $_POST["activity_id"]);
    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    if ($result) {
      header("location: {$hostname}/admin/activity.php");
    } else {
      echo "Query Failed: " . mysqli_error($conn);
    }
} else {
    echo "Prepared statement failed";
}
?>

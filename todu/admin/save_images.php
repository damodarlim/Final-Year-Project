<?php
include ('../includes/dbconnect.php');

if(isset($_FILES['filesToUpload'])){
  $errors = array();
  $total = count($_FILES['filesToUpload']['name']); // Get the count of uploaded files

  for ($i = 0; $i < $total; $i++) {
      $file_name = $_FILES['filesToUpload']['name'][$i];
      $file_size = $_FILES['filesToUpload']['size'][$i];
      $file_tmp = $_FILES['filesToUpload']['tmp_name'][$i];
      $file_type = $_FILES['filesToUpload']['type'][$i];
      $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION)); // Use pathinfo to get the file extension
      $extensions = array("jpeg", "jpg", "png");

      if (in_array($file_ext, $extensions) === false) {
          $errors[] = "This Extension file is not allowed, Please Choose a JPG or PNG file";
      }

      if ($file_size > 4097152) { // 4097152 is in bytes (4MB)
          $errors[] = "File size must be 4MB or lower.";
      }

      $new_name = time() . "-" . basename($file_name);
      $target = "gallery/" . $new_name;

      if (empty($errors) == true) {
          // Move the uploaded file to the target location
          if (move_uploaded_file($file_tmp, $target)) {
              // File uploaded successfully
              // Here, you can insert the file details into your database for each file
              // You might want to use prepared statements to safely insert data
              // For example, using MySQLi or PDO
              $album = mysqli_real_escape_string($conn, $_POST['album']);
              $sql = "INSERT INTO images_table (album_id, file_path)
              VALUES ('{$album}', '{$new_name}');";
              mysqli_query($conn, $sql); // Insert the file record into the database
          } else {
              $errors[] = "Failed to move the file to the target location.";
          }
      } else {
          print_r($errors);
          die();
      }
  }
}

session_start();
header("location: {$hostname}/admin/images.php");
?>

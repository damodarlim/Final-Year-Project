<?php 
include ('../includes/dbconnect.php');

if(empty($_FILES['new-image']['name'])){
  $file_name = $_POST['old_image'];
}else{
  $errors = array();

  $file_name = $_FILES['new-image']['name'];
  $file_size = $_FILES['new-image']['size'];
  $file_tmp = $_FILES['new-image']['tmp_name'];
  $file_type = $_FILES['new-image']['type'];
  $file_Exp = explode('.', $file_name);
  $file_ext = strtolower(end($file_Exp));// it will first saperate the name, then take the end and make all the letters to small 
  $extensions = array("jpeg", "jpg", "png");


  if(in_array($file_ext, $extensions) === false){
    $errors[] = "This Extension file is not allowed, Please Choose a JPG or PNG file";
  }

  if ($file_size > 4097152 ){ //4097152 is in bits
    $errors[] = "File size must be 4MB or lower.";
  }

  if (empty($errors) == true){ // theres no errors that occur, then the picture is uplaoded
    move_uploaded_file($file_tmp, "upload/".$file_name);
  }else {
    print_r($errors);
    die();
  }
}

// Check if the category has been changed
if ($_POST['old_category'] != $_POST['category']) {
  // Category has been changed, decrement the post count in the old category
  $sqlDecrement = "UPDATE category_table SET post = post - 1 WHERE category_id = {$_POST['old_category']}";
  $resultDecrement = mysqli_query($conn, $sqlDecrement);

  if (!$resultDecrement) {
      echo "Decrement operation failed.";
      die();
  }
}

// Prepare the SQL statement to update the post
$sql = "UPDATE news_table SET title = ?, description = ?, category = ?, news_img = ? WHERE news_id = ?";
$stmt = mysqli_prepare($conn, $sql);

if ($stmt) {
  // mysqli_stmt_bind_param used to be more secure and prevent sql injection
    mysqli_stmt_bind_param($stmt, "ssiss", $_POST["news_title"], $_POST["newsdesc"], $_POST["category"], $file_name, $_POST["news_id"]); 
    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    if ($result) {
      // Check if the category has been changed
      if ($_POST['old_category'] != $_POST['category']) {
          // Category has been changed, -1 in category
          $sqlIncrement = "UPDATE category_table SET post = post + 1 WHERE category_id = {$_POST['category']}";
          $resultIncrement = mysqli_query($conn, $sqlIncrement);
  
          if (!$resultIncrement) {
              echo "Increment operation failed.";
              die();
          }
      }
      echo '<script>alert("Successfully Updated!");</script>';
      header("location: post.php");
  } else {
      echo "Query Failed";
  }
}
?>

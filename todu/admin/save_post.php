<?php
include ('../includes/dbconnect.php');

  if(isset($_FILES['fileToUpload'])){
    $errors = array();

    $file_name = $_FILES['fileToUpload']['name'];
    $file_size = $_FILES['fileToUpload']['size'];
    $file_tmp = $_FILES['fileToUpload']['tmp_name'];
    $file_type = $_FILES['fileToUpload']['type'];
    $file_Exp = explode('.', $file_name);
    $file_ext = strtolower(end($file_Exp)); // it will first saperate the name, then take the end and make all the letters to small 
    $extensions = array("jpeg", "jpg", "png");


    if(in_array($file_ext, $extensions) === false){
      $errors[] = "This Extension file is not allowed, Please Choose a JPG or PNG file";
    }

    if ($file_size > 4097152 ){ //4097152 is in bits
      $errors[] = "File size must be 4MB or lower.";
    }
    $imageNewName = $file_name .".". uniqid("", false) .".". $file_ext; // creata a uniq ID, set to false to create a shorter UniqID
    $Destination = "upload/". $imageNewName;

    if (empty($errors) == true){ // theres no errors that occur, then the picture is uplaoded
      move_uploaded_file($file_tmp, $Destination);
    }else {
      print_r($errors);
      die();
    }
  }

  session_start();
  $title = mysqli_real_escape_string($conn, $_POST['post_title']);
  $description = mysqli_real_escape_string($conn, $_POST['postdesc']);
  $category = mysqli_real_escape_string($conn, $_POST['category']);
  $date = date("d M, Y");
  $author = $_SESSION['member_id'];
  
  $stmt = mysqli_prepare($conn, "INSERT INTO news_table (title, description, category, publish_date, author, news_img) VALUES (?, ?, ?, ?, ?, ?)");
  mysqli_stmt_bind_param($stmt, "ssssis", $title, $description, $category, $date, $author, $imageNewName);
  
  if (mysqli_stmt_execute($stmt)) {
      $sqlUpdateCategory = "UPDATE category_table SET post = post + 1 WHERE category_id = ?";
      $stmtUpdateCategory = mysqli_prepare($conn, $sqlUpdateCategory);
      mysqli_stmt_bind_param($stmtUpdateCategory, "i", $category);
      
      if (mysqli_stmt_execute($stmtUpdateCategory)) {
          echo '<script>alert("Successfully added!");</script>';
          header("location: post.php");
      } else {
          echo "<div class='alert alert-danger'>Failed to update category.</div>";
      }
  } else {
      echo "<div class='alert alert-danger'>Query Failed.</div>";
  }
  
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
?>
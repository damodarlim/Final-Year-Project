<?php
include ('../includes/dbconnect.php');

  if(isset($_FILES['fileToUpload'])){
    $errors = array();

    $file_name = $_FILES['fileToUpload']['name'];
    $file_size = $_FILES['fileToUpload']['size'];
    $file_tmp = $_FILES['fileToUpload']['tmp_name'];
    $file_type = $_FILES['fileToUpload']['type'];
    $file_ext = strtolower(end(explode('.', $file_name))); // it will first saperate the name, then take the end and make all the letters to small 
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

  session_start();
  $title = mysqli_real_escape_string($conn, $_POST['post_title']);
  $description = mysqli_real_escape_string($conn, $_POST['postdesc']);
  $category = mysqli_real_escape_string($conn, $_POST['category']);
  $date = date("d M, Y");
  $author = $_SESSION['member_id']; //THis will mean that who ever is logged in at that time and post. will be the author `

  $sql = "INSERT INTO news_table (title, description, category, publish_date,author, news_img)
            VALUES ('{$title}', '{$description}', '{$category}', '{$date}', {$author}, '{$file_name}');";
  $sql .= "UPDATE category_table SET post = post + 1 WHERE category_id = {$category}"; // to add into the Post section in the Category table

  if(mysqli_multi_query($conn, $sql)) {
    header("location: {$hostname}/admin/post.php");
  }else {
    echo "<div class='alert alert-danger'>Query Failed.</div>";
  }


?>
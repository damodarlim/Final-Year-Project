<?php
include ('../includes/dbconnect.php');

  if(isset($_FILES['thumbnail'])){
    $errors = array();

    $file_name = $_FILES['thumbnail']['name'];
    $file_size = $_FILES['thumbnail']['size'];
    $file_tmp = $_FILES['thumbnail']['tmp_name'];
    $file_type = $_FILES['thumbnail']['type'];
    $file_ext = strtolower(end(explode('.', $file_name))); 
    $extensions = array("jpeg", "jpg", "png");


    if(in_array($file_ext, $extensions) === false){
      $errors[] = "This Extension file is not allowed, Please Choose a JPG or PNG file";
    }

    if ($file_size > 4097152 ){ //4097152 is in bits
      $errors[] = "File size must be 4MB or lower.";
    }
    $new_name = time(). "-".basename($file_name) ;
    $target = "gallery/album/". $new_name;

    if (empty($errors) == true){ // theres no errors that occur, then the picture is uplaoded
      move_uploaded_file($file_tmp, $target);
    }else {
      print_r($errors);
      die();
    }
  }

  session_start();
  $title = mysqli_real_escape_string($conn, $_POST['album_title']);
  $date = date("d M, Y");
  $created_by = $_SESSION['member_id']; //THis will mean that who ever is logged in at that time and post. will be the author `

  $sql = "INSERT INTO album_table (title, thumbnail, creation_date,created_by)
            VALUES ('{$title}', '{$new_name}', '{$date}', '{$created_by}');";

  if(mysqli_query($conn, $sql)) {
    header("location: {$hostname}/admin/album.php");
  }else {
    echo "<div class='alert alert-danger'>Query Failed.</div>";
  }


?>
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
    $Destination = "upload/activity/" . $imageNewName; // Changed destination to include "activity" folder

    if (empty($errors) == true){ // theres no errors that occur, then the picture is uplaoded
      move_uploaded_file($file_tmp, $Destination);
    }else {
      print_r($errors);
      die();
    }
  }

  session_start();
  $title = mysqli_real_escape_string($conn, $_POST['activity_title']);
  $description = mysqli_real_escape_string($conn, $_POST['actdesc']);
  $addedBy = $_SESSION['member_id']; //THis will mean that who ever is logged in at that time and post. will be the author `

  $sql = "INSERT INTO activities_table (title, description, activity_img, added_by)
            VALUES ('{$title}', '{$description}', '{$imageNewName}', '{$addedBy}')";

  if(mysqli_query($conn, $sql)) {
    header("location: {$hostname}/admin/activity.php");
  }else {
    echo "<div class='alert alert-danger'>Query Failed.</div>";
  }


?>
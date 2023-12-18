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
    move_uploaded_file($file_tmp, "gallery/album/".$file_name);
  }else {
    print_r($errors);
    die();
  }
}

// Prepare the SQL statement to update the post
$sql = "UPDATE album_table SET title = ?, thumbnail = ? WHERE album_id = ?";
  $stmt = mysqli_prepare($conn, $sql);
  if ($stmt) {
    mysqli_stmt_bind_param($stmt, "ssi", $_POST["album_title"], $file_name, $_POST["album_id"]);
    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    if ($result) {
        header("location: album.php");
        exit; // Always exit after a header redirect
    } else {
        echo "Query Failed";
    }
} else {
    echo "Prepared statement failed";
}


?>


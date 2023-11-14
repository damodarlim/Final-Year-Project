<?php 
include ('../includes/dbconnect.php');

$image_id = $_GET['id'];

$sql1 = "SELECT * FROM images_table WHERE image_id = {$image_id};";
$result = mysqli_query($conn, $sql1) or die ("Query Failed : Select");
$row = mysqli_fetch_assoc($result);

// echo "<pre>";
// print_r($row);
// echo "</pre>";
// die();

unlink("gallery/".$row['file_path']); //to remove the image from the folder 

$sql = "DELETE FROM images_table WHERE image_id = {$image_id};";

if(mysqli_query($conn, $sql)){
  header("location: {$hostname}/admin/images.php");
}else{
  echo "Query Failed";
}

?>
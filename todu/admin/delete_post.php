<?php 
include ('../includes/dbconnect.php');

$news_id = $_GET['id'];
$cat_id = $_GET['catid'];

$sql1 = "SELECT * FROM news_table WHERE news_id = {$news_id};";
$result = mysqli_query($conn, $sql1) or die ("Query Failed : Select");
$row = mysqli_fetch_assoc($result);

// echo "<pre>";
// print_r($row);
// echo "</pre>";
// die();

unlink("upload/".$row['news_img']); //to remove the image from the folder 

$sql = "DELETE FROM news_table WHERE news_id = {$news_id};";
$sql .= "UPDATE category_table SET post = post - 1 WHERE category_id = {$cat_id}";

if(mysqli_multi_query($conn, $sql)){
  header("location: {$hostname}/admin/post.php");
}else{
  echo "Query Failed";
}

?>
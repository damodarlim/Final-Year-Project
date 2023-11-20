<?php 
include ('../includes/dbconnect.php');

$activity_id = $_GET['id'];

$sql1 = "SELECT * FROM activities_table WHERE activity_id = {$activity_id};";
$result = mysqli_query($conn, $sql1) or die ("Query Failed : Select");
$row = mysqli_fetch_assoc($result);

// echo "<pre>";
// print_r($row);
// echo "</pre>";
// die();

unlink("upload/activity/".$row['activity_img']); //to remove the image from the folder 

$sql = "DELETE FROM activities_table WHERE activity_id = {$activity_id}";

if(mysqli_query($conn, $sql)){
  header("location: {$hostname}/admin/activity.php");
}else{
  echo "Query Failed";
}

?>
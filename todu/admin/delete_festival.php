<?php 
include ('../includes/dbconnect.php');

$festival_id = $_GET['id'];

$sql1 = "SELECT * FROM festival_table WHERE festival_id = {$festival_id};";
$result = mysqli_query($conn, $sql1) or die ("Query Failed : Select");
$row = mysqli_fetch_assoc($result);

// echo "<pre>";
// print_r($row);
// echo "</pre>";
// die();

unlink("upload/activity/".$row['fest_img']); //to remove the image from the folder 

$sql = "DELETE FROM festival_table WHERE festival_id = {$festival_id}";

if(mysqli_query($conn, $sql)){
  header("location: festival.php");
}else{
  echo "Query Failed";
}

?>
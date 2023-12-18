<?php 
include ('../includes/dbconnect.php');

$donation_id = $_GET['id'];

$sql1 = "SELECT * FROM donation_table WHERE donation_id = {$donation_id};";
$result = mysqli_query($conn, $sql1) or die ("Query Failed : Select");
$row = mysqli_fetch_assoc($result);

// echo "<pre>";
// print_r($row);
// echo "</pre>";
// die();

unlink("upload/donation/".$row['donation_img']); //to remove the image from the folder 

$sql = "DELETE FROM donation_table WHERE donation_id = {$donation_id}";

if(mysqli_query($conn, $sql)){
  header("location: donation.php");
}else{
  echo "Query Failed";
}

?>
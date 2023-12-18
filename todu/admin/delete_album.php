<?php 
include ('../includes/dbconnect.php');

$album_id = $_GET['id'];

$sql1 = "SELECT * FROM album_table WHERE album_id = {$album_id};";
$result = mysqli_query($conn, $sql1) or die ("Query Failed : Select");
$row = mysqli_fetch_assoc($result);

// echo "<pre>";
// print_r($row);
// echo "</pre>";
// die();

unlink("gallery/album/".$row['thumbnail']); //to remove the image from the folder 

$sql = "DELETE FROM album_table WHERE album_id = {$album_id};";

if(mysqli_query($conn, $sql)){
  header("location: album.php");
}else{
  echo "Query Failed";
}

?>
<?php 
  include ('includes/header.php');
?>

<?php 
include ('includes/dbconnect.php');

if(isset($_GET['id'])){ // if the user clicks on the aid then this runs
    $album_id = $_GET['id'];
}

$sql1 = "SELECT * FROM images_table WHERE album_id = {$album_id}";
$result1 = mysqli_query($conn, $sql1) or die("Query Failed.");
$row1 = mysqli_fetch_assoc($result1);
?>
<h2 class="page-heading"><?php echo $row1['title']; ?></h2>
<?php 
include ('includes/dbconnect.php');

// Calculate offset code 
$limit = 3; //how many data is allowed in one table
if (isset($_GET ['page'])) {
    $page = $_GET ['page'];
} else {
    $page = 1;                        
}
$offset = ($page - 1) * $limit;

$sql = "SELECT images_table.image_id, images_table.album_id, images_table.file_path,
album_table.title FROM images_table
LEFT JOIN album_table ON images_table.album_id = album_table.album_id
WHERE images_table.album_id = {$album_id}
ORDER BY images_table.image_id DESC LIMIT {$offset}, {$limit}";

$result = mysqli_query($conn, $sql) or die("Query Failed.");
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
?> 

<!-- Gallery Section -->
<div class="container my-5">
  <div class="row">
    <div class="col-md-8 offset-md-2 text-center">
      <h2><?php echo $row1['title']; ?></h2>
    </div>
  </div>
  <div class="row my-4">
    <div class="col-md-4 mb-4">
      <a href="album/gallery/<?php echo $row['file_path']; ?>" data-lightbox="gallery" data-title="Image 1">
        <img src="album/gallery/<?php echo $row['file_path']; ?>" alt="Image 1" class="w-100 img-thumbnail">
      </a>
    </div>
    <!-- Add more images as needed -->
  </div>
</div>
<?php 
    }
  } else {
    echo "<h2>No Record Found.</h2>";
} 
?>
<!-- End Gallery Section -->

<?php 
  include ('includes/footer.php');
?>

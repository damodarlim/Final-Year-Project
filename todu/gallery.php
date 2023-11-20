<?php 
include ('includes/header.php');
?>

<!-- Start Fixed Background Img -->
<div class="fixed-background">
  <div class="row text-light py-5 float-end">
    <div class="col-12 text-center">
      <h1>Gallery</h1>
    </div>
  </div>

  <div class="fixed-wrap">
    <div class="fixed"></div>
  </div>
</div>
<!-- End Fixed Background Img -->

<?php 
include ('includes/dbconnect.php');

// Calculate offset code 
$limit = 3; // how many data is allowed in one table
if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 1;
}
$offset = ($page - 1) * $limit;

$sql = "SELECT album_table.album_id, album_table.title, album_table.thumbnail FROM album_table ORDER BY album_table.album_id DESC LIMIT {$offset}, {$limit}";

$result = mysqli_query($conn, $sql) or die("Query Failed.");
if (mysqli_num_rows($result) > 0) {
  echo '<div class="container my-5">'; // Move the container outside the loop
  echo '<div class="row my-4">';
  while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <!-- Gallery Options -->
    <div class="col-md-4 mb-4">
      <a href="album.php?id=<?php echo $row['album_id'];?>" class="card-link">
        <div class="card">
          <img src="admin/gallery/album/<?php echo $row['thumbnail'];?>" class="card-img-top" alt="Gallery 1" />
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['title'];?></h5>
            <p class="card-text"><?php echo $row['title'];?></p>
          </div>
        </div>
      </a>
    </div>
    <?php
  }
  echo '</div>'; // Close the row
  echo '</div>'; // Close the container
} else {
  echo "<h2>No Record Found.</h2>";
}

$sql1 = "SELECT * FROM album_table";
$result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

if (mysqli_num_rows($result1) > 0) {
  $total_records = mysqli_num_rows($result1);
  $total_page = ceil($total_records / $limit);

  echo '<ul class="pagination">';
  if ($page > 1) {
    echo '<li><a href="gallery.php?page=' . ($page - 1) . '">Prev</a></li>';
  }
  for ($i = 1; $i <= $total_page; $i++) {
    if ($i == $page) {
      $active = "active";
    } else {
      $active = "";
    }
    echo '<li class="' . $active . '"><a href="gallery.php?page=' . $i . '">' . $i . '</a></li>';
  }
  if ($total_page > $page) {
    echo '<li><a href="gallery.php?page=' . ($page + 1) . '">Next</a></li>';
  }
  echo '</ul>';
}
?>
<!-- End Gallery Now Section -->

<?php 
include ('includes/footer.php');
?>

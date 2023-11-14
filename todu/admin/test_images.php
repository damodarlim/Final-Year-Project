<?php
include 'header.php';
include '../includes/dbconnect.php';

// Retrieve images using mysqli
$sql = "SELECT * FROM images_table ORDER BY image_id DESC";
$result = mysqli_query($conn, $sql);

$images = array();
while ($row = mysqli_fetch_assoc($result)) {
    $images[] = $row;
}
?>

<style>
    .gallery img {
        width: 127px;
    }
</style>

<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">All Images</h1>
            </div>
            <div class="col-md-12">
                <?php
                if (mysqli_num_rows($result) > 0) {
                ?>
                    <div class="gallery">
                        <?php foreach ($images as $image) { ?>
                            <img src="gallery/<?php echo $image['file_path']; ?>" alt="Image <?php echo $image['image_id']; ?>">
                        <?php } ?>
                    </div>
                <?php
                } else {
                    echo "<h3>No Images Found</h3>";
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>

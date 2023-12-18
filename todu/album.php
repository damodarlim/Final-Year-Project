<?php 
include ('includes/header.php');
?>

<div class="container my-5">
    <div class="row my-4">
        <?php 
        include ('includes/dbconnect.php');

        if(isset($_GET['id'])){
            $album_id = $_GET['id'];
        }

        $sql1 = "SELECT * FROM images_table 
        LEFT JOIN album_table ON images_table.album_id = album_table.album_id
        WHERE images_table.album_id = {$album_id}";
        $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");
        $row1 = mysqli_fetch_assoc($result1);
        ?>
        <h2 class="page-heading"><?php echo $row1['title']; ?></h2>
        <?php 
        include ('includes/dbconnect.php');

        // Calculate offset code 
        $limit = 40;

        $sql = "SELECT images_table.image_id, images_table.album_id, images_table.file_path,
        album_table.title FROM images_table
        LEFT JOIN album_table ON images_table.album_id = album_table.album_id
        WHERE images_table.album_id = {$album_id}
        ORDER BY images_table.image_id DESC LIMIT {$limit}";

        $result = mysqli_query($conn, $sql) or die("Query Failed.");
        
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
        ?> 
        <!-- Gallery Section -->
        <div class="col-md-4 mb-4">
            <a href="admin/gallery/<?php echo $row['file_path']; ?>" data-lightbox="gallery" data-title="Image 1">
                <img src="admin/gallery/<?php echo $row['file_path']; ?>" alt="Image 1" class="w-100 img-thumbnail">
            </a>
        </div>
        <?php 
            }
        } else {
            echo "<h2>No Record Found.</h2>";
        } 
        ?>
    </div>
</div>
<!-- End Gallery Section -->

<?php 
include ('includes/footer.php');
?>

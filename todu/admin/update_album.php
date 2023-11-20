<?php include "header.php"; ?>
<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Update Post</h1>
    </div>
    <div class="col-md-offset-3 col-md-6">
        <?php 
        include ('../includes/dbconnect.php');

        $album_id = $_GET['id'];

        $sql = "SELECT album_table.album_id, album_table.title, album_table.creation_date, album_table.thumbnail,
        member_table.username FROM album_table
        LEFT JOIN member_table ON album_table.created_by = member_table.member_id
        WHERE album_table.album_id = {$album_id} ";

        $result = mysqli_query($conn, $sql) or die("Query Failed.");
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
        ?>
        <!-- Form for show edit-->
        <form action="save_update_album.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="form-group">
                <input type="hidden" name="album_id"  class="form-control" value="<?php echo $row['album_id']; ?>" placeholder="">
            </div>
            <div class="form-group my-4">
                <label for="Title">Title</label>
                <input type="text" name="album_title"  class="form-control" id="exampleInputUsername" value="<?php echo $row['title']; ?>">
            </div>
            <div class="form-group my-4">
                <label for="">Thumbnail</label>
                <input type="file" name="new-image">
                <img  src="gallery/album/<?php echo $row['thumbnail']; ?>" height="150px">
                <input type="hidden" name="old_image" value="<?php echo $row['thumbnail']; ?>">
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Update" />
        </form>
        <!-- Form End -->
        <?php 
            }
        }else {
            echo "Result Not Found!";
        }
        
        ?>
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>
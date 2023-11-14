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

        $image_id = $_GET['id'];

        $sql = "SELECT * FROM images_table LEFT JOIN
        album_table ON images_table.album_id = album_table.album_id
        WHERE images_table.image_id = {$image_id} ";

        $result = mysqli_query($conn, $sql) or die("Query Failed.");
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
        ?>
        <!-- Form for show edit-->
        <form action="save_update_images.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="form-group">
                <input type="hidden" name="image_id"  class="form-control" value="<?php echo $row['image_id']; ?>" placeholder="">
            </div>
            <div class="form-group my-4">
                          <label for="exampleInputPassword1">Album</label>
                          <select name="album" class="form-control">
                              <option disabled selected> Select Category</option>
                              <?php
                              include ('../includes/dbconnect.php'); // First step done

                                $sql1 = "SELECT * FROM album_table"; // Second step done
                                $result1 = mysqli_query($conn, $sql1) or die ("Query Failed");

                                if (mysqli_num_rows($result) > 0) {
                                  while($row1 = mysqli_fetch_assoc($result1)){
                                    if($row['album_id'] == $row1['album_id']){
                                        $selected = "selected";
                                    }else {
                                        $selected = " ";
                                    }
                                    echo "<option {$selected} value='{$row1['album_id']}' >{$row1['title']}</option>";
                                }
                                }                              
                              ?>
                          </select>
                      </div>
            <div class="form-group my-4">
                <label for="">Image</label>
                <input type="file" name="new-image">
                <img  src="gallery/<?php echo $row['file_path']; ?>" height="150px">
                <input type="hidden" name="old_image" value="<?php echo $row['file_path']; ?>">
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
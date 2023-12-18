<?php include "header.php"; ?>
<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Update Post</h1>
    </div>
    <div class="container d-flex justify-content-center">
        <?php 
        include ('../includes/dbconnect.php');

        $festival_id = $_GET['id'];

        $sql = "SELECT festival_table.festival_id, festival_table.title, festival_table.fest_img,
        festival_table.description, member_table.username 
        FROM festival_table
        LEFT JOIN member_table ON festival_table.added_by = member_table.member_id
        WHERE festival_table.festival_id = {$festival_id} ";
        
        $result = mysqli_query($conn, $sql) or die("Query Failed.");
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
        ?>
        <!-- Form for show edit-->
        <form action="save_update_festival.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="form-group my-4">
                <input type="hidden" name="festival_id"  class="form-control" value="<?php echo $row['festival_id']; ?>" placeholder="">
            </div>
            <div class="form-group my-4">
                <label for="Title">Title</label>
                <input type="text" name="festival_title"  class="form-control" id="exampleInputUsername" value="<?php echo $row['title']; ?>">
            </div>
            <div class="form-group my-4">
                <label for="Description"> Description</label>
                <textarea name="actdesc" class="form-control"  required rows="5">
                    <?php echo trim($row['description']); ?>
                </textarea>
            </div>
            <div class="form-group my-4">
                <label for="">festival image</label>
                <input type="file" name="new-image">
                <img  src="upload/festival/<?php echo $row['fest_img']; ?>" height="150px">
                <input type="hidden" name="old_image" value="<?php echo $row['fest_img']; ?>">
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

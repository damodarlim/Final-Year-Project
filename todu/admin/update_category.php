<?php include "header.php"; 

if(isset($_POST['submit'])){
    include "config.php";

    $catid = mysqli_real_escape_string($conn, $_POST ['cat_id']);
    $catname = mysqli_real_escape_string($conn, $_POST ['cat_name']);

    $sql = "UPDATE category_table SET category_name ='{$catname}' WHERE category_id = '{$catid}' ";
    $result = mysqli_query($conn, $sql) or die ("Query Failed");

    if(mysqli_query($conn, $sql)) {
      header("location: ../{$hostname}/admin/category.php");
    }
}

?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Update Category</h1>
              </div>
              <div class="container d-flex justify-content-center">
                  <!-- Form Start  -->
                  <?php 
                  include ('../includes/dbconnect.php');

                  $cat_id = $_GET['id'];
                  $sql = "SELECT * FROM category_table WHERE category_id = {$cat_id}";
                  $result = mysqli_query($conn, $sql) or die ("Query Failed.");

                  if(mysqli_num_rows($result) > 0) {
                      while($row = mysqli_fetch_assoc($result)){                
                  ?>
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST">
                        <div class="form-group">
                            <input type="hidden" name="cat_id"  class="form-control" value="<?php echo $row['category_id'];?>" placeholder="">
                        </div>
                        <div class="form-group my-4">
                            <label>Category Name</label>
                            <input type="text" name="cat_name" class="form-control" value="<?php echo $row['category_name'];?>"  placeholder="" required>
                        </div>
                        <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                    </form>
                    <?php 
                      }
                  }
                    ?>
                  <!-- Form End  -->
                </div>
              </div>
            </div>
          </div>
<?php include "footer.php"; ?>
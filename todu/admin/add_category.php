<?php include "header.php"; 

if(isset($_POST['save'])) {
    include ('../includes/dbconnect.php');

    $catName = mysqli_real_escape_string($conn, $_POST ['cat']);

    $sql = "SELECT category_name FROM category_table WHERE category_name = '{$catName}'";
    $result = mysqli_query($conn, $sql) or die ("Query Failed");

    if (mysqli_num_rows($result) > 0) {
        echo "<p style='color:red; text-align:center; margin: 10px 0;'>Category already Exist.</p>";
    }else {
        $sql1 = "INSERT INTO category_table (category_name) VALUE ('{$catName}')";
        if(mysqli_query($conn,$sql1)){
             header("location: {$hostname}/admin/category.php");
        }
    }
}

?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12 my-3">
                  <h1 class="admin-heading">Add New Category</h1>
              </div>
              <div class="container d-flex justify-content-center">
                  <!-- Form Start -->
                  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">
                      <div class="form-group my-4">
                          <label>Category Name</label>
                          <input type="text" name="cat" class="form-control" placeholder="Category Name" required>
                      </div>

                      <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                  </form>
                  <!-- /Form End -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>

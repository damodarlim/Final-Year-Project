<?php include "header.php"; 

if (isset($_POST['save'])) {
    include '../includes/dbconnect.php';

    $catName = mysqli_real_escape_string($conn, $_POST['cat']);

    $sql = "SELECT category_name FROM category_table WHERE category_name = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $catName);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$result) {
        die("Query Failed: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) > 0) {
        echo "<p style='color:red; text-align:center; margin: 10px 0;'>Category already exists.</p>";
    } else {
        $sql1 = "INSERT INTO category_table (category_name) VALUES (?)";
        $stmt1 = mysqli_prepare($conn, $sql1);
        mysqli_stmt_bind_param($stmt1, "s", $catName);
        $result1 = mysqli_stmt_execute($stmt1);

        if (!$result1) {
            die("Query Failed: " . mysqli_error($conn));
        } else {
            echo '<script>alert("Successfully Updated!");</script>';
            header("location: category.php");
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
                  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">
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

<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h1 class="admin-heading">Add Gallery Images</h1>
             </div>
              <div class="container d-flex justify-content-center">
                  <!-- Form -->
                  <form  action="save_images.php" method="POST" enctype="multipart/form-data">
                      <div class="form-group my-4">
                          <label for="exampleInputPassword1">Album</label>
                          <select name="album" class="form-control">
                              <option disabled selected> Select Category</option>
                              <?php
                              include ('../includes/dbconnect.php'); // First step done

                                $sql = "SELECT * FROM album_table"; // Second step done
                                $result = mysqli_query($conn, $sql) or die ("Query Failed");

                                if (mysqli_num_rows($result) > 0) {
                                    while($row = mysqli_fetch_assoc($result)){
                                        echo "<option value='{$row['album_id']}'>{$row['title']}</option>";
                                    }
                                }                              
                              ?>
                          </select>
                      </div>
                      <div class="form-group my-4">
                          <label for="Upload Images">Upload Gallery Images!</label>
                          <br>
                          <input type="file" name="filesToUpload[]" multiple required>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                  </form>
                  <!--/Form -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
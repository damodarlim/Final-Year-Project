<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h1 class="admin-heading">Add New Festival</h1>
             </div>
              <div class="container d-flex justify-content-center">
                  <!-- Form -->
                  <form  action="save_festival.php" method="POST" enctype="multipart/form-data">
                      <div class="form-group my-4">
                          <label for="festival_title">Title</label>
                          <input type="text" name="festival_title" class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group my-4">
                          <label for="festival_desc">Description</label>
                          <textarea name="festdesc" class="form-control" rows="5" required></textarea>
                      </div>
                      <div class="form-group my-4">
                          <label for="festival_img">Festival image</label>
                          <input type="file" name="fileToUpload" required>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                  </form>
                  <!--/Form -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>

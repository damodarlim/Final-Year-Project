<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h1 class="admin-heading">Add New Album</h1>
             </div>
              <div class="container d-flex justify-content-center">
                  <!-- Form -->
                  <form  action="save_album.php" method="POST" enctype="multipart/form-data">
                      <div class="form-group my-4">
                          <label for="album_title">Title</label>
                          <input type="text" name="album_title" class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group my-4">
                          <label for="album_img">Thumbnail Image</label>
                          <br>
                          <input type="file" name="thumbnail" required>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                  </form>
                  <!--/Form -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>

<?php include "header.php"; ?>

<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Update Donation</h1>
    </div>
    <div class="container d-flex justify-content-center">
        <?php 
        include ('../includes/dbconnect.php');

        $donation_id = $_GET['id'];

        $sql = "SELECT donation_table.donation_id, donation_table.title, donation_table.donation_img,
        donation_table.amount, donation_table.description, member_table.username 
        FROM donation_table
        LEFT JOIN member_table ON donation_table.added_by = member_table.member_id
        WHERE donation_table.donation_id = {$donation_id} ";
        
        $result = mysqli_query($conn, $sql) or die("Query Failed.");
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
        ?>
        <!-- Form for show edit-->
        <form action="save_update_donation.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="form-group my-4">
                <input type="hidden" name="donation_id"  class="form-control" value="<?php echo $row['donation_id']; ?>" placeholder="">
            </div>
            <div class="form-group my-4">
                <label for="Title">Title</label>
                <input type="text" name="donation_title"  class="form-control" id="exampleInputUsername" value="<?php echo $row['title']; ?>">
            </div>
            <div class="form-group my-4">
                          <label for="donation_amount">Amount (RM)</label>
                          <input type="text" name="donation_amount" class="form-control" autocomplete="off" value="<?php echo $row['amount']; ?>">
                      </div>
            <div class="form-group my-4">
                <label for="Description"> Description</label>
                <textarea name="dondesc" class="form-control"  required rows="5">
                    <?php echo trim($row['description']); ?>
                </textarea>
            </div>
            <div class="form-group my-4">
                <label for="">donation image</label>
                <input type="file" name="new-image">
                <img  src="upload/donation/<?php echo $row['donation_img']; ?>" height="150px">
                <input type="hidden" name="old_image" value="<?php echo $row['donation_img']; ?>">
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

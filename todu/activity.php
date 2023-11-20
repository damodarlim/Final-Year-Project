<?php 
  include ('includes/header.php');

  include ('includes/dbconnect.php');

  $act_id = $_GET['id'];

  $sql = "SELECT activities_table.activity_id, activities_table.title, activities_table.description,
  activities_table.activity_img FROM activities_table 
  WHERE activity_id = {$act_id}";
      $result = mysqli_query($conn, $sql) or die("Query Failed.");
      if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
?>

    <!-- Start Fixed Background Img -->
    <div class="fixed-background">
      <div class="row text-light py-5 float-end">
        <div class="col-12 text-center">
          <!-- Activity Title -->
          <h1><?php echo $row['title'];?></h1>
        </div>
      </div>

      <div class="fixed-wrap">
        <div class="fixed"></div>
      </div>
    </div>
    <!-- End Fixed Background Img -->
    
    <!-- Activity Content Section -->
    <div class="container my-5">
      <div class="row">
        <div class="col-md-6">
          <!-- Activity Image -->
          <img src="admin/upload/activity/<?php echo $row['activity_img']; ?>" alt="Activity Image" class="img-fluid" />
        </div>
        <div class="col-md-6">
          <!-- Activity Description -->
          <p>
            <?php echo $row['description']; ?>
          </p>
          <!-- You can add more content or customize the layout as needed -->
        </div>
      </div>
    </div>
    <?php
        }
      }else{
        echo "<h2>No Record Found.</h2>";
    }
    ?>
    <!-- End Activity Content Section -->

<?php 
  include ('includes/footer.php');
?>
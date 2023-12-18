<?php 
  include ('includes/header.php');

  include ('includes/dbconnect.php');

  $fest_id = $_GET['id'];

  $sql = "SELECT festival_table.festival_id, festival_table.title, festival_table.description,
  festival_table.fest_img FROM festival_table 
  WHERE festival_id = {$fest_id}";
      $result = mysqli_query($conn, $sql) or die("Query Failed.");
      if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
?>

    <!-- Start Fixed Background Img -->
    <div class="fixed-background">
      <div class="row text-light py-5 float-end">
        <div class="col-12 text-center">
          <!-- festival Title -->
          <h1><?php echo $row['title'];?></h1>
        </div>
      </div>

      <div class="fixed-wrap">
        <div class="fixed"></div>
      </div>
    </div>
    <!-- End Fixed Background Img -->
    
    <!-- festival Content Section -->
    <div class="container my-5">
      <div class="row">
        <div class="col-md-6">
          <img src="admin/upload/festival/<?php echo $row['fest_img']; ?>" alt="festival Image" class="img-fluid" />
        </div>
        <div class="col-md-6">
          <p>
            <?php echo $row['description']; ?>
          </p>
        </div>
      </div>
    </div>
    <?php
        }
      }else{
        echo "<h2>No Record Found.</h2>";
    }
    ?>
    <!-- End festival Content Section -->

<?php 
  include ('includes/footer.php');
?>
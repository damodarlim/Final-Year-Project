<?php 
  include ('includes/header.php');
?>

<!-- Donate Now Section -->
<div class="container my-5">
  <div class="row">
    <div class="col-md-8 offset-md-2 text-center">
      <h2>Donate Now</h2>
      <p>
        Your contributions help support our mission and activities. Choose
        from the following donation options:
      </p>
    </div>
  </div>
  
  <?php 
  include ('includes/dbconnect.php');

  // Calculate offset code 
  $limit = 3; //how many data is allowed in one table
  if (isset($_GET ['page'])) {
      $page = $_GET ['page'];
  }else {
  $page = 1;                        
  }
  $offset = ($page - 1) * $limit;
  
  $sql = "SELECT donation_table.donation_id, donation_table.title, 
  donation_table.description ,donation_table.donation_img FROM donation_table 
  ORDER BY donation_table.donation_id DESC LIMIT {$offset}, {$limit}";
  
  $result = mysqli_query($conn, $sql) or die("Query Failed.");
  if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
  ?>

  <!-- Donation Options -->
  <div class="row my-4">
    <div class="col-md-4 mb-4">
      <div class="card">
        <a href="donate.php?id=<?php echo $row['donation_id'];?>" class="card-link">
          <img src="admin/upload/donation/<?php echo $row['donation_img']; ?>" class="card-img-top" alt="Donation Option 1" />
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['title']; ?></h5>
            <p class="card-text">
              <?php echo $row['description']; ?>
            </p>
          </div>
          <div class="card-footer">
            <a href="donate.php?id=<?php echo $row['donation_id'];?>" class="btn btn-primary">Donate Now</a>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>
<?php 
      }
    }
?>
<!-- End Donate Now Section -->

<?php 
  include ('includes/footer.php');
?>

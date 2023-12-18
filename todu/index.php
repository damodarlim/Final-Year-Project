<?php 
  include ('includes/header.php');
  include ('includes/dbconnect.php');
?>

<body>

  <!-- Image Slider -->
  <div id="carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="65000">
    <!-- Slider Content  -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/carousel/1.jpg" alt="" class="w-100" />
      </div>
      <div class="carousel-item">
        <img src="img/carousel/2.jpg" alt="" class="w-100" />
      </div>
      <div class="carousel-item">
        <img src="img/carousel/3.jpg" alt="" class="w-100" />
      </div>
      <div class="carousel-item">
        <img src="img/carousel/4.jpg" alt="" class="w-100" />
      </div>
    </div>
    <!-- End of Slider content -->

    <!-- Previous and Next button -->
    <a href="#carousel" class="carousel-control-prev" role="button" data-bs-slide="prev">
      <span class="fa-solid fa-chevron-left fa-2x"></span>
    </a>

    <a href="#carousel" class="carousel-control-next" role="button" data-bs-slide="next">
      <span class="fa-solid fa-chevron-right fa-2x"></span>
    </a>
    <!-- end previous and Next button  -->
  </div>

  <!-- Main Page Heading -->
  <div class="col-12 text-center mt-5">
    <h1 class="text-dark pt-4">Festivals</h1>
    <div class="border-top border-primary w-25 mx-auto my-3"></div>
    <p class="lead">Join in and Enjoy the Events</p>
  </div>


<!-- Three Column Section  -->
<div class="container my-5">
  <div class="row">
    <?php 
      // Calculate offset code 
      $limit = 3; 
      $sql = "SELECT festival_table.festival_id, festival_table.title, 
      festival_table.description, festival_table.fest_img FROM festival_table ORDER BY 
      festival_table.festival_id DESC LIMIT {$limit}";
      $result = mysqli_query($conn, $sql) or die("Query Failed. : Recent Post");
      if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
    ?>  
    <div class="col-md-4 my-4">
      <img src="admin/upload/festival/<?php echo $row['fest_img']; ?>" alt="" class="w-100" />
      <h4 class="my-4"><?php echo $row['title']; ?></h4>
      <p><?php echo substr($row['description'], 0, 100). "..."; ?></p>
      <a href="festival_single.php?id=<?php echo $row['festival_id'];?>" class="btn btn-outline-dark btn-md">Check Out!</a>
    </div>
    <?php 
        }
      }
    ?>
  </div>
</div>
<!-- End Three Column Section  -->



  <!-- Start Fixed Background Img  -->
  <div class="fixed-background">
    <div class="row text-light py-5">
      <div class="col-12 text-center">
        <h1>TODU Online Patron</h1>
        <h3>If you're interested in Contributing!</h3>
        <a href="patron_signup.php" class="btn btn-outline-light btn-lg mx-2">Check Out!</a>
      </div>
    </div>

    <div class="fixed-wrap">
      <div class="fixed"></div>
    </div>
  </div>
  <!-- End Fixed Background Img  -->

  <!-- Start Two Column Section  -->
  <?php 
    // Calculate offset code 
    $limit = 1; //how many data is allowed in one table
    $sql = "SELECT activities_table.activity_id, activities_table.title, activities_table.description, activities_table.activity_img FROM activities_table ORDER BY activities_table.activity_id DESC LIMIT {$limit}";
    $result = mysqli_query($conn, $sql) or die("Query Failed. : Recent Post");
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
  ?>  
  <div class="container my-5">
    <div class="row py-4">
      <div class="col-lg-4 mb-4 my-lg-auto">
        <h1 class="text-dark font-weight-bold mb-3"><?php echo $row['title']; ?></h1>
        <p class="mb-4"><?php echo substr($row['description'], 0, 400). "..."; ?></p>
        <a href="activity.php?id=<?php echo $row['activity_id'];?>" target="_blank" class="btn btn-outline-dark btn-lg">Read more</a>
      </div>

      <div class="col-lg-8">
        <img src="admin/upload/activity/<?php echo $row['activity_img']; ?>" alt="" class="w-100" />
      </div>
    </div>
  </div>
  <?php 
      }
    }
  ?>

  <!-- End Two Column Section  -->

  <!-- Start Jumbotron with Newsletter Subscription Form -->
<div class="bg-light p-5 rounded-lg m-3">
  <div class="container">
    <div class="row">
      <div class="col-md-7 col-lg-8 col-xl-9 my-auto">
        <h4>Subscribe to Our Newsletter</h4>
        <p>Stay updated with our latest news and events by subscribing to our newsletter.</p>

        <?php
        // Check the status parameter in the URL
        if (isset($_GET['status'])) {
            $status = $_GET['status'];

            if ($status === 'exists') {
                echo '<script>alert("You\'re already a subscriber!");</script>';
            } elseif ($status === 'success') {
                echo '<script>alert("Thank you for subscribing!");</script>';
            }
        }
        ?>
        <!-- Newsletter Subscription Form -->
        <form action="subscribe.php" method="post">
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <button type="submit" class="btn btn-primary btn-lg" name="subscribe">Subscribe</button>
        </form>
        <!-- End Newsletter Subscription Form -->

      </div>
    </div>
  </div>
</div>
<!-- End Jumbotron with Newsletter Subscription Form -->


  <!-- Start Footer  -->
  <?php 
    include ('includes/footer.php');
  ?>
</body>

</html>

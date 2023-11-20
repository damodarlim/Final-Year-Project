<?php 
  include ('includes/header.php');
?>

<!-- Start Fixed Background Img -->
<div class="fixed-background">
  <div class="row text-light py-5 float-end">
    <div class="col-12 text-center">
      <h1>Donation</h1>
    </div>
  </div>

  <div class="fixed-wrap">
    <div class="fixed"></div>
  </div>
</div>
<!-- End Fixed Background Img -->

<!-- Donation Section -->
<div class="container my-5">
  <div class="row">
    <div class="col-md-12">
      <h2 class="mb-4">Support Our Cause</h2>
    </div>
    <div class="col-md-8">
      <img src="img/3.jpg" alt="Donation Image" class="img-fluid mb-4" />
      <p>
        Your generous donation helps us in our mission to serve the
        community. Thank you for your support!
      </p>
    </div>
    <div class="col-md-4">
      <!-- Donation Form -->
      <form action="#" method="post">
        <div class="mb-3">
          <label for="amount" class="form-label">Amount (USD)</label>
          <input
            type="number"
            class="form-control"
            id="amount"
            name="amount"
            required
          />
        </div>
        <button type="submit" class="btn btn-primary">Donate Now</button>
      </form>
      <!-- End Donation Form -->
    </div>
  </div>
</div>
<!-- End Donation Section -->

<?php 
  include ('includes/footer.php');
?>

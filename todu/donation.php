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

  <!-- Donation Options -->
  <div class="row my-4">
    <div class="col-md-4 mb-4">
      <div class="card">
        <a href="donate.php" class="card-link">
          <img src="img/Prabhupada.jpg" class="card-img-top" alt="Donation Option 1" />
          <div class="card-body">
            <h5 class="card-title">General Donation</h5>
            <p class="card-text">
              Make a general donation to support our organization's
              activities.
            </p>
          </div>
          <div class="card-footer">
            <a href="donate.php" class="btn btn-primary">Donate Now</a>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="card">
        <img src="img/donation2.jpg" class="card-img-top" alt="Donation Option 2" />
        <div class="card-body">
          <h5 class="card-title">Sponsorship</h5>
          <p class="card-text">
            Sponsor specific events, festivals, or activities organized by TODU.
          </p>
          <a href="#" class="btn btn-primary">Donate Now</a>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="card">
        <img src="img/donation3.jpg" class="card-img-top" alt="Donation Option 3" />
        <div class="card-body">
          <h5 class="card-title">Building Fund</h5>
          <p class="card-text">
            Contribute to the construction and maintenance of our temple.
          </p>
          <a href="#" class="btn btn-primary">Donate Now</a>
        </div>
      </div>
    </div>
    <!-- Add more donation options as needed -->
  </div>
</div>
<!-- End Donate Now Section -->

<?php 
  include ('includes/footer.php');
?>

<?php 
  include ('includes/header.php');
?>

<!-- About Us Section -->
<div class="container my-5">
  <div class="row">
    <div class="col-md-6 mb-4">
      <!-- Organization Image -->
      <img src="img/logo.jpg" alt="Organization" class="w-100 img-thumbnail">
    </div>
    <div class="col-md-6 mb-4">
      <!-- About Organization -->
      <h2>About Us</h2>
      <p>
        The Temple of Devotion and Understanding (TODU) is a place of worship and spiritual learning. Our organization, inspired by the teachings of ISKCON, aims to promote spiritual growth and understanding.
      </p>
      <p>
        The International Society for Krishna Consciousness (ISKCON) is a worldwide spiritual movement founded by His Divine Grace A.C. Bhaktivedanta Swami Prabhupada in 1966. ISKCON is dedicated to the propagation of the teachings of Lord Krishna as presented in the Bhagavad-gita and other Vedic scriptures.
      </p>
      <p>
        ISKCON Malaysia is an integral part of this global movement, spreading the message of love, peace, and devotion. Join us in our spiritual journey as we strive for a harmonious and enlightened world.
      </p>

      <!-- Contact Details and Opening/Closing Times -->
      <div class="mt-4">
        <h3>Contact Us</h3>
        <p>Email: info@todu.com</p>
        <p>Phone: +6017-4413980</p>

        <h3>Opening Hours</h3>
        <p>Monday to Sunday: 8:00 AM - 8:00 PM</p>
      </div>

      <!-- Enquiry Form -->
      <div class="mt-4">
        <h3>Enquiry Form</h3>
        <form action="process_enquiry.php" method="post">
          <div class="form-group my-2">
            <label for="name">Your Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>
          <div class="form-group my-2">
            <label for="email">Your Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="form-group my-2">
            <label for="message">Your Message:</label>
            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <p class="mt-2">If you have any questions, feel free to ask!</p>
      </div>
    </div>
  </div>
</div>
<!-- End About Us Section -->

<?php 
  include ('includes/footer.php');
?>

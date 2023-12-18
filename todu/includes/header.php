<?php
include ('includes/dbconnect.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ISKCON TODU</title>
  <link rel="shortcut icon" href="img/favicon.jpg" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/lightbox.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/all.min.css">
</head>
<body>

<!-- Top Bar -->
<div class="top-bar">
  <div class="container">
    <div class="col-12 text-right">
      <p><a href="tel:+6017-4413980">Call Us at TODU</a></p>
    </div>
  </div>
</div>
<!-- End of Top Bar -->

<!-- Navigation -->
<nav class="navbar bg-light navbar-light navbar-expand-lg">
  <div class="container">
    <a href="index.php" class="navbar-brand">
      <img src="img/logo.jpg" alt="Temple of Devotion and Understanding" title="Iskcon Seberang Jaya" />
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="news.php" class="nav-link">News</a></li>
        <li class="nav-item"><a href="gallery.php" class="nav-link">Gallery</a></li>
        <li class="nav-item"><a href="activities.php" class="nav-link">Activities</a></li>
        <li class="nav-item"><a href="about.php" class="nav-link">About Us</a></li>
        <li class="nav-item"><a href="donation.php" class="nav-link active">Donate Now</a></li>
        <!-- Add more navigation items as needed -->
      </ul>
      <ul class="navbar-nav ml-auto">
        <div class="topbar-divider d-none d-sm-block"></div>
        <?php if (isset($_SESSION['username'])) : ?>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['username'] ?></span>
                    <img class="img-profile rounded-circle" src="img/user.png">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="user_profile.php">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php" data-bs-toggle="modal" data-bs-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>
        <?php else : ?>
            <a class="dropdown-item" href="login.php">Sign In</a>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
<!-- End of Navigation -->

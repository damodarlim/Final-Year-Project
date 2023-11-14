<?php 
include ('../includes/dbconnect.php');
session_start(); 

if(!isset($_SESSION["username"])){
  header("location: {$hostname}/admin/");

}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>ADMIN Panel</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <!-- Font Awesome Icon -->
        <link rel="stylesheet" href="../css/all.css">
        <!-- Custom stlylesheet -->
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>

    <!-- navigation -->
    <nav class="navbar bg-light navbar-light navbar-expand-lg">
      <div class="container">
        <a href="index.php" class="navbar-brand">
          <img
            src="img/logo.jpg"
            alt="Temple of Devotion and Understanding"
            title="Iskcon Seberang Jaya"
          />
        </a>

        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarResponsive"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item">
              <a href="post.php" class="nav-link">Post</a>
            </li>
            <li class="nav-item">
              <a href="category.php" class="nav-link">Category</a>
            </li>
            <li class="nav-item">
              <a href="album.php" class="nav-link">Album</a>
            </li>
            <li class="nav-item">
              <a href="images.php" class="nav-link">Gallery</a>
            </li>
            <li class="nav-item">
              <a href="members.php" class="nav-link">Users</a>
            </li>
            <li class="nav-item">
              <a href="test_images.php" class="nav-link">testing</a>
            </li>
          </ul>
          <a href="logout.php" class="admin-logout">Hello <?php echo $_SESSION["username"]?>, logout</a>
        </div>
      </div>
    </nav>

    <!-- End of Navigation  -->

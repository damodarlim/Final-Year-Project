<?php 
include ('../includes/dbconnect.php');
session_start(); 

if(!isset($_SESSION["username"])){
  header("location: admin/");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADMIN Panel</title>
    <link rel="shortcut icon" href="img/favicon.jpg" />
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/lightbox.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/all.min.css">
</head>

<body>

    <nav class="navbar bg-light navbar-light navbar-expand-lg">
        <div class="container">
            <a href="index.php" class="navbar-brand">
                <img src="../img/logo.jpg" alt="TODU" title="Iskcon Seberang Jaya" />
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a href="post.php" class="nav-link">Post</a>
                    </li>
                    <li class="nav-item">
                        <a href="festival.php" class="nav-link">Festival</a>
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
                        <a href="activity.php" class="nav-link">Activity</a>
                    </li>
                    <li class="nav-item">
                        <a href="donation.php" class="nav-link">Donation</a>
                    </li>
                    <li class="nav-item">
                        <a href="members.php" class="nav-link">Users</a>
                    </li>
                    <!-- Dropdown - General User -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="generalUserDropdown" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            General User
                        </a>
                        <div class="dropdown-menu" aria-labelledby="generalUserDropdown">
                            <a class="dropdown-item" href="general_user.php">User</a>
                            <a class="dropdown-item" href="patron.php">Patron</a>
                            <a class="dropdown-item" href="donation_received.php">Donation</a>
                            <a class="dropdown-item" href="enquiry.php">Enquiry</a>
                        </div>
                    </li>
                </ul>
                <a href="logout.php" class="admin-logout" data-bs-toggle="modal" data-bs-target="#logoutModal">Hello <?php echo $_SESSION["username"]?>, logout</a>
            </div>
        </div>
    </nav>


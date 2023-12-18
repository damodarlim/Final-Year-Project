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
                    <li class="nav-item">
                        <a href="test_images.php" class="nav-link">testing</a>
                    </li>
                </ul>
                <a href="logout.php" class="admin-logout">Hello logout</a>
            </div>
        </div>
    </nav>

    <!-- Your main content goes here -->
    <div class="container-fluid">
        <section>
            <h2>Main Content Section</h2>
            <!-- Add your main content here -->
        </section>
    </div>

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; TODU</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    <!-- JavaScript files (Bootstrap, jQuery, Popper) -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/all.min.js"></script>
    <script src="../js/lightbox.min.js"></script> <!-- Make sure to include the lightbox library for image viewing -->

</body>

</html>


    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="Homepage.php?logout='1'">Logout</a>
                </div>
            </div>
        </div>
    </div>
<?php
include ('includes/dbconnect.php');
require_once('./operations.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload test!</title>
    <link rel="short icon" href="img/favicon.jpg" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300&display=swap"
      rel="stylesheet"
    />
</head>
<body>

<!-- Add into News and Article Section?  -->
<div class="container d-flex justify-content-center">
  <form action="news.php" method="post" class="w-50" enctype="multipart/form-data">
    <?php inputFields("Title", "title", "", "text"); ?>
    <?php inputFields("Content", "content", "", "text"); ?>
    <?php inputFields("", "file", "", "file"); ?>
    <button class="btn btn-dark" type="submit" name="btn-news" >Submit</button>
  </form>
</div>

<!-- End of Add into News and Article Section  -->

<!-- Add into Gallery Section  -->

<!-- <div class="container d-flex justify-content-center">
  <form action=" " method="post" class="w-50" enctype="multipart/form-data">
    <?php inputGallery("Title", "title", "", "text"); ?>
    <?php inputGallery("Content", "content", "", "text"); ?>
    <?php inputGallery("", "file", "", "file"); ?>
    <button class="btn btn-dark" type="submit" name="btn-gallery" >Submit</button>
  </form>
</div> -->
  
</body>
</html>
<?php 
include('includes/dbconnect.php');
include('includes/header.php');



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gallery</title>
    <link rel="short icon" href="img/favicon.jpg" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300&display=swap"
      rel="stylesheet"
    />
</head>
<body>

<!-- <div class="card bg-dark text-white">
  <img class="card-img" src="img/1.jpg " alt="Card image">
  <div class="card-img-overlay">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    <p class="card-text">Last updated 3 mins ago</p>
  </div>
</div> -->

<div class="container">
  <div class="row my-5 text-center">

    <div class="col-md-4 my-4">
          <img src="img/1.jpg" href="index.php"  alt="" class="w-100" />
          <h4 class="my-4">Feast and Fest!</h4>
        </div>

        <div class="col-md-4 my-4">
          <img src="img/1.jpg" alt="" class="w-100" />
          <h4 class="my-4">Feast and Fest!</h4>
        </div>
        
        <div class="col-md-4 my-4">
          <img src="img/1.jpg" alt="" class="w-100" />
          <h4 class="my-4">Feast and Fest!</h4>
        </div>

  </div>

</div>
    <!-- End Three Columnn Section  -->

<div class="row my-5">
  <div class="card col-md-4 my-4">
    <img class="card-img-top" src="img/1.jpg" alt="" class="w-100">
    <div class="card-img-overlay">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    <p class="card-text">Last updated 3 mins ago</p>
  </div>
  </div>

  <div class="card col-md-4 my-4">
    <img class="card-img-top" src="img/1.jpg" alt="" class="w-100">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>

  <div class="card col-md-4 my-4">
    <img class="card-img-top" src="img/1.jpg" alt="" class="w-100">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>

</div>
  
</body>
</html>
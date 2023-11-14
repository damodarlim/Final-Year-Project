<?php
include('includes/dbconnect.php');
include('includes/header.php');
if(isset($_POST['btn-news'])){
    $title=$_POST['title'];
    $content=$_POST['content'];
    $image=$_FILES['file'];
    // echo $title;
    // echo "<br>";
    // echo $content;
    // echo "<br>";
    // print_r($image);
    // echo "<br>";


    $imageFilename=$image['name'];
    // print_r($imageFilename);
    // echo "<br>";
    $imageError=$image['error'];
    // print_r($imageError);
    // echo "<br>";
    $imageTemp=$image['tmp_name'];
    // print_r($imageTemp);
    // echo "<br>";

    $fileName_separate=explode('.', $imageFilename);
    // print_r($fileName_separate);
    // echo "<br>";
    $file_extension=strtolower(end($fileName_separate));
    // print_r($file_extension);

    $extension=array('jpeg', 'jpg', 'png');
    if(in_array($file_extension, $extension)){
      $upload_image='img/'.$imageFilename;
      move_uploaded_file($imageTemp, $upload_image);
      $sql="insert into `content_table` (title, content, image) VALUES ('$title', '$content', '$upload_image')";
      $result=mysqli_query($conn, $sql);
      if($result){
        echo '<div class="alert alert-success" role="alert">
        Data inserted Successfully!
      </div>';
      }else {
        die(mysqli_error($conn));
      }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>News And Articles</title>
  <link rel="short icon" href="img/favicon.jpg" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300&display=swap"
      rel="stylesheet"
    />
</head>
<body>

    <!-- Start Fixed Background Img  -->

    <div class="fixed-background">
      <div class="row text-light py-5 float-end">
        <div class="col-12 text-center">
          <h1>News and Articles</h1>
        </div>
      </div>

      <div class="fixed-wrap">
        <div class="fixed"></div>
      </div>
    </div>

    <!-- End Fixed Background Img  -->

    <div class="container">
      <div class="row my-5">
        
      <?php         
        $sql="Select * from `content_table`";
        $result=mysqli_query($conn, $sql);
        while($row=mysqli_fetch_assoc($result)){
          $title=$row['title'];
          $content=$row['content'];
          $image=$row['image'];
          echo '<div class="col-md-4 my-4">
          <img src="'.$image.'" alt="" class="w-100" />
          <h4 class="my-4">'.$title.'</h4>
          <p>'.$content.'</p>
          <a href="#" class="btn btn-outline-dark btn-md">Check Out!</a>
        </div>';
        }        
        ?>

        <ul class='pagination'>
          <li class="active"><a>1</a></li>
          <li><a>2</a></li>
          <li><a>3</a></li>
        </ul>
      </div>
    </div>
    <!-- End Three Columnn Section  -->

</body>
</html>
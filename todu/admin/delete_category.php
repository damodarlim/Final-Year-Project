<?php 
  include ('../includes/dbconnect.php');

  $categoryid = $_GET['id'];

  $sql = "DELETE FROM category_table WHERE category_id = {$categoryid}";

  if (mysqli_query($conn, $sql)){
    header("location: category.php");
  } else {
    echo "<p style='color:red;margin: 10px 0;'> Cannot Delete the Category Record.</p>";
  }

  mysqli_close($conn);
?>
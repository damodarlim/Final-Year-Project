<?php 
include ('../includes/dbconnect.php');

  $memberid = $_GET['id'];

  $sql = "DELETE FROM member_table WHERE member_id = {$memberid}";

  if (mysqli_query($conn, $sql)){
    header("location: members.php");
  } else {
    echo "<p style='color:red;margin: 10px 0;'> Cannot Delete the User Record.</p>";
  }

  mysqli_close($conn);
?>
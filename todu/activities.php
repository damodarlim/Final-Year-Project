<?php 
  include ('includes/header.php');
?>

<!-- Start Fixed Background Img -->
<div class="fixed-background">
  <div class="row text-light py-5 float-end">
    <div class="col-12 text-center">
      <h1>Activities</h1>
    </div>
  </div>

  <div class="fixed-wrap">
    <div class="fixed"></div>
  </div>
</div>
<!-- End Fixed Background Img -->

<?php 
include ('includes/dbconnect.php');

// Calculate offset code 
$limit = 3; //how many data is allowed in one table
if (isset($_GET ['page'])) {
    $page = $_GET ['page'];
}else {
$page = 1;                        
}
$offset = ($page - 1) * $limit;

$sql = "SELECT activities_table.activity_id, activities_table.title, 
activities_table.description ,activities_table.activity_img FROM activities_table 
ORDER BY activities_table.activity_id DESC LIMIT {$offset}, {$limit}";

$result = mysqli_query($conn, $sql) or die("Query Failed.");
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {

?>
<!-- Activities Section -->
<div class="container my-5">
  <div class="row">
    <div class="col-md-4 mb-4">
      <div class="card">
        <a href="activity.php?id=<?php echo $row['activity_id'];?>" class="card-link">
        <img src="admin/upload/activity/<?php echo $row['activity_img']; ?>" class="card-img-top" alt="Activity 1" />
        <div class="card-body">
          <h5 class="card-title"><?php echo $row['title']; ?></h5>
          <p class="card-text"><?php echo substr($row['description'],0, 100). "..." ; ?></p>
          <a href="activity.php?id=<?php echo $row['activity_id'];?>" class="btn btn-primary">Learn More</a>
        </a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php 
    }
  }else{
    echo "<h2>No Record Found.</h2>";
}

$sql1 = "SELECT * FROM activities_table";
$result1 = mysqli_query($conn, $sql1) or die ("Query Failed.");

if (mysqli_num_rows($result1) > 0){
    $total_records = mysqli_num_rows($result1);
    $total_page = ceil ($total_records / $limit);

    echo '<ul class="pagination">';
    if ($page > 1){
    echo '<li><a href="activities.php?page='.($page - 1).'">Prev</a></li>';                        
    }
    for($i = 1; $i <= $total_page; $i++){  
        if ($i == $page){
            $active = "active";
        }else{
            $active = "";
        }                    
        echo '<li class="'.$active.'"><a href="activities.php?page='.$i.'">'.$i.'</a></li>';
    }
    if ($total_page > $page){
        echo '<li><a href="activities.php?page='.($page + 1).'">Next</a></li>';                
        }
    echo '</ul>';
}
?>
<!-- End Activities Section -->

<?php 
  include ('includes/footer.php');
?>
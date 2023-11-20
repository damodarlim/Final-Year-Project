<?php 
  include ('includes/header.php');
?>

<!-- Main Content Area -->
<div id="main-content">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <!-- Post Container  -->
        <div class="post-container">
        <?php 
        include ('includes/dbconnect.php');

        $news_id = $_GET['id'];

        $sql = "SELECT news_table.news_id, news_table.title, news_table.description, news_table.publish_date,
        news_table.author, category_table.category_name, member_table.username, news_table.category, 
        news_table.news_img FROM news_table 
        LEFT JOIN category_table ON news_table.category = category_table.category_id
        LEFT JOIN member_table ON news_table.author = member_table.member_id
        WHERE news_id = {$news_id}";
        
        $result = mysqli_query($conn, $sql) or die("Query Failed.");
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {

        ?>   
          <div class="post-content single-post">
            <h3><?php echo $row['title']; ?></h3>
            <div class="post-information">
              <span>
                <i class="fa fa-tags" aria-hidden="true"></i>
                <a href="category.php?cid=<?php echo $row['category']; ?>"><?php echo $row['category_name']; ?></a>
              </span>
              <span>
                <i class="fa fa-user" aria-hidden="true"></i>
                <a href="author.php?aid=<?php echo $row['author']; ?>"><?php echo $row['username']; ?></a>
              </span>
              <span>
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <?php echo $row['publish_date']; ?>
              </span>
            </div>
            <img
              class="img-fluid single-feature-image"
              src="admin/upload/<?php echo $row['news_img']; ?>"
              alt=""
            />
            <p class="description">
            <?php echo $row['description']; ?>
            </p>
          </div>
        </div>
        <?php 
            }
          } else {
            echo "<h2>No Record Found.</h2>";
        }
        ?>
        <!-- End of Post Container  -->
      </div>
      <?php include ('sidebar.php');?>
    </div>
  </div>
</div>
<!-- End of Main Content Area -->
<?php 
  include ('includes/footer.php');
?>

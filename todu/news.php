<?php 
include ('includes/header.php');
?>

<!-- Start Fixed Background Img -->
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
<!-- End Fixed Background Img -->

<!-- News Section  -->
<div class="container">
  <div class="row my-5">
    <?php 
    include ('includes/dbconnect.php');

    // Calculate offset code 
    $limit = 3; //how many data is allowed in one table
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;                        
    }
    $offset = ($page - 1) * $limit;

    $sql = "SELECT news_table.news_id, news_table.title, news_table.description,news_table.publish_date, news_table.author,
    category_table.category_name, member_table.username, news_table.category, news_table.news_img FROM news_table
    LEFT JOIN category_table ON news_table.category = category_table.category_id
    LEFT JOIN member_table ON news_table.author = member_table.member_id 
    ORDER BY news_table.news_id DESC LIMIT {$offset}, {$limit}";

    $result = mysqli_query($conn, $sql) or die("Query Failed.");
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
    ?>
    <div class="col-md-4 my-4 news-item">
      <a href="single_news.php?id=<?php echo $row['news_id'];?>">
        <img src="admin/upload/<?php echo $row['news_img']; ?>" alt="" class="w-100" />
      </a>
      <h4 class="my-4">
        <a href="single_news.php?id=<?php echo $row['news_id'];?>"><?php echo $row['title']; ?></a>
      </h4>
      <p class="news-meta">
        <a href='author.php?aid=<?php echo $row['author']; ?>' class="author"><i class="fas fa-user"></i><?php echo $row['username']; ?></a>
        <a href='category.php?cid=<?php echo $row['category']; ?>' class="category"
          ><i class="fas fa-folder"></i><?php echo $row['category_name']; ?></a
        >
        <span class="date"
          ><i class="far fa-calendar-alt"></i><?php echo $row['publish_date']; ?></span
        >
      </p>
      <p>
        <?php echo substr($row['description'], 0, 100). "..."; ?>
      </p>
      <a href="single_news.php?id=<?php echo $row['news_id'];?>" class="btn btn-outline-dark btn-md">Check Out!</a>
    </div>
    <?php 
        }
    } else {
        echo "<h2>No Record Found.</h2>";
    }

    $sql1 = "SELECT * FROM news_table";
    $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

    if (mysqli_num_rows($result1) > 0) {
        $total_records = mysqli_num_rows($result1);
        $total_page = ceil ($total_records / $limit);

        echo '<ul class="pagination">';
        if ($page > 1){
            echo '<li><a href="news.php?page='.($page - 1).'">Prev</a></li>';                        
        }
        for ($i = 1; $i <= $total_page; $i++) {  
            if ($i == $page) {
                $active = "active";
            } else {
                $active = "";
            }                    
            echo '<li class="'.$active.'"><a href="news.php?page='.$i.'">'.$i.'</a></li>';
        }
        if ($total_page > $page) {
            echo '<li><a href="news.php?page='.($page + 1).'">Next</a></li>';                
        }
        echo '</ul>';
    }
    ?>
  </div>
  <!-- End of News Section  -->
</div>

<?php 
include ('includes/footer.php');
?>

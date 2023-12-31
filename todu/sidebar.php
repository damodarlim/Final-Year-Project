<div id="sidebar" class="col-md-3">
    <!-- search box -->
    <div class="search-box-container">
        <h4>Search</h4>
        <form class="search-post" action="search.php" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search .....">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-danger">Search</button>
                </span>
            </div>
        </form>
    </div>
    <!-- /search box -->
    <!-- recent posts box -->
    <div class="recent-post-container">
        <h4>Recent Posts</h4>

        <?php 
        include ('includes/dbconnect.php');

        // Calculate offset code 
        $limit = 3; //how many data is allowed in one table

        $sql = "SELECT news_table.news_id, news_table.title, news_table.publish_date,
        category_table.category_name, news_table.category, news_table.news_img FROM news_table 
        LEFT JOIN category_table ON news_table.category = category_table.category_id
        ORDER BY news_table.news_id DESC LIMIT {$limit}";

        $result = mysqli_query($conn, $sql) or die("Query Failed. : Recent Post");
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
        ?>       

        <div class="recent-post">
            <a class="post-img" href="single_news.php?id=<?php echo $row['news_id'];?>">
                <img src="admin/upload/<?php echo $row['news_img']; ?>" alt=""/>
            </a>
            <div class="post-content">
                <h5><a href="single_news.php?id=<?php echo $row['news_id'];?>"><?php echo $row['title']; ?></a></h5>
                <span>
                    <i class="fa fa-tags" aria-hidden="true"></i>
                    <a href='category.php?cid=<?php echo $row['category']; ?>'><?php echo $row['category_name']; ?></a>
                </span>
                <span>
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <?php echo $row['publish_date']; ?>
                </span>
                <a class="read-more" href="single_news.php?id=<?php echo $row['news_id'];?>">read more</a>
            </div>
        </div>
        <?php 
            }
        }
        ?>
        <!-- /recent posts box -->
    </div>
</div>

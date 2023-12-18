<?php include "header.php"; ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Update Post</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <?php 
                include ('../includes/dbconnect.php');

                $news_id = $_GET['id'];

                $sql = "SELECT news_table.news_id, news_table.title, news_table.description, news_table.news_img,
                category_table.category_name, news_table.category FROM news_table
                LEFT JOIN category_table ON news_table.category = category_table.category_id
                LEFT JOIN member_table ON news_table.author = member_table.member_id
                WHERE news_table.news_id = {$news_id} ";

                $result = mysqli_query($conn, $sql) or die("Query Failed.");
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                ?>
                <!-- Form for show edit-->
                <form action="save_update_post.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div class="form-group">
                        <input type="hidden" name="news_id" class="form-control" value="<?php echo $row['news_id']; ?>" placeholder="">
                        <input type="hidden" name="old_category" value="<?php echo $row['category']; ?>">
                    </div>
                    <div class="form-group my-4">
                        <label for="Title">Title</label>
                        <input type="text" name="news_title" class="form-control" id="exampleInputUsername" value="<?php echo $row['title']; ?>">
                    </div>
                    <div class="form-group my-4">
                        <label for="Description"> Description</label>
                        <textarea name="newsdesc" class="form-control" required rows="5">
                            <?php echo trim($row['description']); ?>
                        </textarea>
                    </div>
                    <div class="form-group my-4">
                        <label for="Category">Category</label>
                        <select class="form-control" name="category">
                            <option disabled> Select Category</option>
                            <?php
                            include ('../includes/dbconnect.php'); // First step done
                            $sql1 = "SELECT * FROM category_table"; // Second step done

                            $result1 = mysqli_query($conn, $sql1) or die("Query Failed");

                            if (mysqli_num_rows($result1) > 0) {
                                while($row1 = mysqli_fetch_assoc($result1)){
                                    if($row['category'] == $row1['category_id']){
                                        $selected = "selected";
                                    }else {
                                        $selected = " ";
                                    }
                                    echo "<option {$selected} value='{$row1['category_id']}' >{$row1['category_name']}</option>";
                                }
                            }
                            ?> 
                        </select>
                    </div>
                    <div class="form-group my-4">
                        <label for="">Post image</label>
                        <br>
                        <input type="file" name="new-image">
                        <img  src="upload/<?php echo $row['news_img']; ?>" height="150px">
                        <input type="hidden" name="old_image" value="<?php echo $row['news_img']; ?>">
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Update" />
                </form>
                <!-- Form End -->
                <?php 
                    }
                } else {
                    echo "Result Not Found!";
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>

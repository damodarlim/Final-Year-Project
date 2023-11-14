<?php
include "header.php"; 

?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Gallery</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add_images.php">add Gallery</a>
            </div>
            <div class="col-md-12">
                <?php 
                    include ('../includes/dbconnect.php');                    
                    $limit = 9; //how many data is allowed in one table
                    if (isset($_GET ['page'])) {
                        $page = $_GET ['page'];
                    }else {
                    $page = 1;                        
                    }
                    $offset = ($page - 1) * $limit;

                    $sql = "SELECT * FROM images_table LEFT JOIN
                    album_table ON images_table.album_id = album_table.album_id
                    ORDER BY image_id DESC LIMIT {$offset}, {$limit}";
                    $result = mysqli_query($conn, $sql) or die("Query Failed.");
                    if (mysqli_num_rows($result) > 0) {
                
                ?>
                <table class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Album Name</th>
                        <th>Upload Date</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        <?php while($row = mysqli_fetch_assoc($result)) {?> 
                        <tr>
                            <td class='id'><?php echo $row['image_id']; ?></td>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['upload_date']; ?></td>
                            <td class='edit'><a href='update_images.php?id=<?php echo $row["image_id"]; ?>'><i class='fa fa-edit'></i></a></td>
                            <td class='delete'><a href='delete_images.php?id=<?php echo $row["image_id"]; ?>'><i class='fa fa-trash'></i></a></td>
                        <tr>                            
                    </tbody>
                    <?php } ?>
                </table>
                <?php }else {
                    echo "<h3>No Records Found</h3>";
                  } 
                
                $sql1 = "SELECT * FROM images_table";
                  $result1 = mysqli_query($conn, $sql1) or die ("Query Failed.");

                  if (mysqli_num_rows($result1) > 0){
                    $total_records = mysqli_num_rows($result1);
                    $total_page = ceil ($total_records / $limit);

                    echo '<ul class="pagination admin-pagination">';
                    if ($page > 1){
                    echo '<li><a href="images.php?page='.($page - 1).'">Prev</a></li>';                        
                    }
                    for($i = 1; $i <= $total_page; $i++){  
                        if ($i == $page){
                            $active = "active";
                        }else{
                            $active = "";
                        }
                        echo '<li class="'.$active.'"><a href="images.php?page='.$i.'">'.$i.'</a></li>';
                    }
                    if ($total_page > $page){
                        echo '<li><a href="images.php?page='.($page + 1).'">Next</a></li>';                
                        }
                    echo '</u>';
                  }
                  ?>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
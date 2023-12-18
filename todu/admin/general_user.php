<?php 
include "header.php";
include ('../includes/dbconnect.php');
if ($_SESSION["member_role"] == '0'){                     
  header("location: post.php");
}
?>

<div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <h1 class="admin-heading">All General Users</h1>
                </div>
                <div class="col-md-12">
                  <?php 
                  $limit = 5;
                  if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                  } else {
                    $page = 1;
                  }
                  $offset = ($page - 1) * $limit;
                  
                  $sql = "SELECT * FROM user_table ORDER BY id DESC LIMIT {$offset}, {$limit}";
                  $result = mysqli_query($conn, $sql);
                  if(mysqli_num_rows($result) > 0) {
                  
                  ?>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Created On</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while($row = mysqli_fetch_assoc($result)) { ?>
                              <tr>
                              <td class='id'><?php echo $row['id']; ?></td>
                              <td><?php echo $row['first_name'] . " " . $row['last_name']; ?></td>
                              <td><?php echo $row['username']; ?></td>
                              <td><?php echo $row['email']; ?></td>
                              <td><?php echo $row['mobile']; ?></td>
                              <td><?php echo $row['created_at']; ?></td>
                              </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <?php } 
                    $sql1 = "SELECT * FROM user_table";
                    $result1 = mysqli_query($conn, $sql1);
                    
                    if ($result1) {
                        $total_records = mysqli_num_rows($result1);
                        $total_page = ceil($total_records / $limit);
                    
                        echo '<ul class="pagination">';
                        if ($page > 1) {
                            echo '<li><a href="general_user.php?page=' . ($page - 1) . '">Prev</a></li>';
                        }
                    
                        for ($i = 1; $i <= $total_page; $i++) {
                            $active = ($i == $page) ? "active" : "";
                            echo '<li class="' . $active . '"><a href="general_user.php?page=' . $i . '">' . $i . '</a></li>';
                        }
                    
                        if ($total_page > $page) {
                            echo '<li><a href="general_user.php?page=' . ($page + 1) . '">Next</a></li>';
                        }
                        echo '</ul>';
                    }        
                    
                    ?>
                </div>
            </div>
        </div>
    </div>

<?php include "footer.php"?>
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
        <h1 class="admin-heading">All Members</h1>
      </div>
      <div class="col-md-2">
        <a class="add-new" href="add_member.php">Add Member</a>
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
          
          $sql = "SELECT * FROM member_table ORDER BY member_id DESC LIMIT {$offset}, {$limit}";
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
                      <th>Role</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                  <?php while($row = mysqli_fetch_assoc($result)) { ?>
                  <tr>
                      <td class='id'><?php echo $row['member_id']; ?></td>
                      <td><?php echo $row['first_name'] . " " . $row['last_name']; ?></td>
                      <td><?php echo $row['username']; ?></td>
                      <td><?php echo $row['email']; ?></td>
                      <td><?php echo $row['contact']; ?></td>
                      <td><?php 
                      if($row['role'] == 1) {
                        echo "Admin";
                      } else {
                        echo "Regular Member";
                      }?></td>
                      <td class='edit'><a href='edit_member.php?id=<?php echo $row["member_id"]; ?>'><i class='fa fa-edit'></i></a></td>
                      <td class='delete'><a href='delete_member.php?id=<?php echo $row["member_id"]; ?>'
                      onclick='return checkdelete()'><i class='fa fa-trash'></i></a></td>
                      <script>
                        function checkdelete() {
                            return confirm('Are you sure you wan to delete this record ?');
                        } 
                      </script>
                  </tr>
                <?php } ?> 
                </tbody>
            </table>
              <?php }           
                $sql1 = "SELECT * FROM member_table";
                $result1 = mysqli_query($conn, $sql1);

                if (mysqli_num_rows($result1) > 1) {
                  $total_records = mysqli_num_rows($result1);
                  $total_page = ceil ($total_records / $limit);

                  echo '<ul class="pagination">';
                  if ($page > 1){
                    echo '<li><a href="members.php?page='.($page - 1).'">Prev</a></li>';                        
                  }

                  for($i = 1; $i <= $total_page; $i++) {
                    if ($i == $page) {
                      $active = "active";
                    } else {
                      $active ="";
                    }

                    echo '<li class="'.$active.'"><a href="members.php?page='.$i.'">'.$i.'</a></li>';
                  }
                  if ($total_page > $page) {
                    echo '<li><a href="members.php?page='.($page + 1).'">Next</a></li>'; 
                  }
                  echo '</ul>';
                }        
              ?>
      </div>
    </div>
  </div>
</div>

<?php include "footer.php"?>

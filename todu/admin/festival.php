<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Festivals</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add_festival.php">add Festival</a>
              </div>
              <div class="col-md-12">
              <?php 
                    include ('../includes/dbconnect.php'); // Database configuration
                    // Calculate offset code 
                    $limit = 3; //how many data is allowed in one table
                    if (isset($_GET ['page'])) {
                        $page = $_GET ['page'];
                    }else {
                    $page = 1;                        
                    }
                    $offset = ($page - 1) * $limit;

                    // to allow only admins to view all post, edit and delete them.

                    if ($_SESSION["member_role"] == '1'){           
                        $sql = "SELECT festival_table.festival_id, festival_table.title, 
                        festival_table.description, member_table.username 
                        FROM festival_table
                        LEFT JOIN member_table ON festival_table.added_by = member_table.member_id
                        ORDER BY festival_table.festival_id DESC LIMIT {$offset}, {$limit}";
                    }
                    // only allow the regular user to see what they have posted and can edit or delete.
                    elseif ($_SESSION["member_role"] == '0'){
                      $sql = "SELECT festival_table.festival_id, festival_table.title, 
                      festival_table.description, member_table.username 
                      FROM festival_table
                      LEFT JOIN member_table ON festival_table.added_by = member_table.member_id
                      WHERE festival_table.added_by = {$_SESSION['member_id']}
                      ORDER BY festival_table.festival_id DESC LIMIT {$offset}, {$limit}";                   

                    }


                    $result = mysqli_query($conn, $sql) or die("Query Failed.");
                    if (mysqli_num_rows($result) > 0) {
                
                ?>
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                          <th>S.No.</th>
                          <th>Title</th>
                          <th>Added By</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                      <?php while($row = mysqli_fetch_assoc($result)) {?> 
                          <tr>
                              <td class='id'><?php echo $row['festival_id']; ?></td>
                              <td><?php echo $row['title']; ?></td>
                              <td><?php echo $row['username']; ?></td>
                              <td class='edit'><a href='update_festival.php?id=<?php echo $row["festival_id"]; ?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='delete_festival.php?id=<?php echo $row["festival_id"];?>' onclick='return checkdelete()'><i class='fa fa-trash'></i></a></td>
                              <script>
                                function checkdelete() {
                                    return confirm('Are you sure you wan to delete this record ?');
                                } 
                              </script>
                          </tr>
                      <?php } ?>
                      </tbody>
                  </table>
                  <?php }else {
                    echo "<h3>No Records Found</h3>";
                  }
                  // Show Pagination
                  $sql1 = "SELECT * FROM festival_table";
                  $result1 = mysqli_query($conn, $sql1) or die ("Query Failed.");

                  if (mysqli_num_rows($result1) > 0){
                    $total_records = mysqli_num_rows($result1);
                    $total_page = ceil ($total_records / $limit);

                    echo '<ul class="pagination admin-pagination">';
                    if ($page > 1){
                    echo '<li><a href="festival.php?page='.($page - 1).'">Prev</a></li>';                        
                    }
                    for($i = 1; $i <= $total_page; $i++){  
                        if ($i == $page){
                            $active = "active";
                        }else{
                            $active = "";
                        }                    
                        echo '<li class="'.$active.'"><a href="festival.php?page='.$i.'">'.$i.'</a></li>';
                    }
                    if ($total_page > $page){
                        echo '<li><a href="festival.php?page='.($page + 1).'">Next</a></li>';                
                        }
                    echo '</ul>';
                  }
                  ?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>


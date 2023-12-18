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
                    <h1 class="admin-heading">Donation Received</h1>
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
                  
                  $sql = "SELECT * FROM donation_received 
                  LEFT JOIN donation_table ON donation_received.donation_id = donation_table.donation_id 
                  ORDER BY donation_received_id DESC LIMIT {$offset}, {$limit}";          
                  $result = mysqli_query($conn, $sql);
                  if(mysqli_num_rows($result) > 0) {
                  
                  ?>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Amount</th>
                                <th>Donation Name</th>
                                <th>Created On</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while($row = mysqli_fetch_assoc($result)) { ?>
                              <tr>
                              <td class='id'><?php echo $row['donation_received_id']; ?></td>
                              <td><?php echo $row['payer_name']; ?></td>
                              <td><?php echo $row['payer_email']; ?></td>
                              <td><?php echo $row['amount']; ?></td>
                              <td><?php echo $row['title']; ?></td>
                              <td><?php echo $row['donation_date']; ?></td>
                              </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <?php } 
                    $sql1 = "SELECT * FROM donation_received";
                    $result1 = mysqli_query($conn, $sql1);
    
                    if (mysqli_num_rows($result1) > 1) {
                      $total_records = mysqli_num_rows($result1);
                      $total_page = ceil ($total_records / $limit);
    
                      echo '<ul class="pagination">';
                      if ($page > 1){
                        echo '<li><a href="donation_received.php?page='.($page - 1).'">Prev</a></li>';                        
                      }
    
                      for($i = 1; $i <= $total_page; $i++) {
                        if ($i == $page) {
                          $active = "active";
                        } else {
                          $active ="";
                        }
    
                        echo '<li class="'.$active.'"><a href="donation_received.php?page='.$i.'">'.$i.'</a></li>';
                      }
                      if ($total_page > $page) {
                        echo '<li><a href="donation_received.php?page='.($page + 1).'">Next</a></li>'; 
                      }
                      echo '</ul>';
                    }        
                    
                    ?>
                </div>
            </div>
        </div>
    </div>

<?php include "footer.php"?>
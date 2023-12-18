<?php include "header.php";
include ('../includes/dbconnect.php');
if ($_SESSION["member_role"] == '0'){                     
    header("location: {$hostname}/admin/post.php");
}
if (isset($_POST['btn-edit'])) {

    $memberid = mysqli_real_escape_string($conn, $_POST ['member_id']);
    $fname = mysqli_real_escape_string($conn, $_POST ['editFname']);
    $lname = mysqli_real_escape_string($conn, $_POST ['editLname']);
    $user = mysqli_real_escape_string($conn, $_POST ['editUser']);
    $email = mysqli_real_escape_string($conn, $_POST ['editEmail']);
    $contact = mysqli_real_escape_string($conn, $_POST ['editContact']);
    // $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $role = mysqli_real_escape_string($conn, $_POST ['role']);

    $sql = "UPDATE member_table SET first_name = '{$fname}', last_name = '{$lname}', username = '{$user}', email = '{$email}', contact = '{$contact}', role = '{$role}' WHERE member_id = '{$memberid}'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_query($conn, $sql)) {
        header("location: ../admin/members.php");
    }
}

?>

<div id ="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12 my-3">
                  <h1 class="admin-heading">Edit Member</h1>
            </div>
                <div class="container d-flex justify-content-center">
                    <?php 
                                        
                    $member_id = $_GET['id'];
                    $sql = "SELECT * FROM member_table WHERE member_id = {$member_id}";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)){                                         
                    ?>
                    <!-- Form Start -->
                    <form  action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST" class="w-50" autocomplete="off">
                        
                            <div class="form-group my-4">
                                <input type="hidden" name="member_id" class="form-control" value="<?php echo $row['member_id']; ?>" placeholder="" required>
                            </div>
                            <div class="form-group my-4">
                                <label>First Name</label>
                                <input type="text" name="editFname" class="form-control" value="<?php echo $row['first_name']; ?>" placeholder="" required>
                            </div>
                                <div class="form-group my-4">
                                <label>Last Name</label>
                                <input type="text" name="editLname" class="form-control" value="<?php echo $row['last_name']; ?>" placeholder="" required>
                            </div>
                            <div class="form-group my-4">
                                <label>User Name</label>
                                <input type="text" name="editUser" class="form-control" value="<?php echo $row['username']; ?>" placeholder="" required>
                            </div>
                            <div class="form-group my-4">
                                <label>Email</label>
                                <input type="email" name="editEmail" class="form-control"  value="<?php echo $row['email']; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" maxlength="50" placeholder="" required>
                            </div>
                            <div class="form-group my-4">
                                <label>Contact</label>
                                <input type="text" name="editContact" class="form-control" value="<?php echo $row['contact']; ?>" maxlength="11" pattern="[0-9]{3}-[0-9]{7}" placeholder="" required>
                            </div>
                            <div class="form-group my-4">
                                <label>Role</label>
                                <br>
                                <select name="role" class="form-control" value="<?php echo $row['role']; ?>" id="inpEditRole" required>
                                    <?php 
                                        if ($row['role'] == 1) {
                                            echo "<option value='0'>Regular Member</option>
                                                <option value='1' selected>Admin</option>";
                                            }else {
                                            echo "<option value='0' selected>Regular Member</option>
                                                <option value='1'>Admin</option>";
                                            } 
                                    ?>
                                </select>
                            </div>                      

                        <button class="btn btn-dark" type="submit" name="btn-edit">Submit</button>
                    </form>
                    <!-- Form End-->
                    <?php 
                            }
                        }                
                    ?>
                </div>
        </div>
    </div>
</div>
<?php include "footer.php"?>


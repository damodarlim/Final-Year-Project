<?php 
include "header.php";
include ('../includes/dbconnect.php');

if ($_SESSION["member_role"] == '0'){                     
  header("location: post.php");
}

  if(isset($_POST['btn-member'])){

    $fname = mysqli_real_escape_string($conn, $_POST ['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST ['lname']);
    $user = mysqli_real_escape_string($conn, $_POST ['user']);
    $email = mysqli_real_escape_string($conn, $_POST ['email']);
    $contact = mysqli_real_escape_string($conn, $_POST ['contact']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $role = mysqli_real_escape_string($conn, $_POST ['role']);

    $sql = "SELECT username FROM member_table WHERE username = '{$user}' ";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      echo "<p style='color:red; text-align:center; margin: 10px 0;'>UserName already Exist.</p>";

    }else {
      $sql1 = "INSERT INTO member_table (first_name, last_name, username, email, contact, password, role)
              VALUE ('{$fname}', '{$lname}', '{$user}', '{$email}', '{$contact}', '{$password}', '{$role}')";
      if(mysqli_query($conn, $sql1)){
        header("location: members.php");
      }
    }
  }
?>

<div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12 my-3">
                  <h1 class="admin-heading">Add Member</h1>
              </div>
              <div class="container d-flex justify-content-center">
                  <!-- Form Start -->
                  <form  action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST" class="w-50" autocomplete="off">
                      <div class="form-group my-4">
                          <label>First Name</label>
                          <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                      </div>
                          <div class="form-group my-4">
                          <label>Last Name</label>
                          <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                      </div>
                      <div class="form-group my-4">
                          <label>User Name</label>
                          <input type="text" name="user" class="form-control" placeholder="Username" required>
                      </div>
                      <div class="form-group my-4">
                          <label>Email</label>
                          <input type="email" name="email" class="form-control"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" maxlength="50" placeholder="Email Address" required>
                      </div>
                      <div class="form-group my-4">
                          <label>Contact</label>
                          <input type="text" name="contact" class="form-control" maxlength="11" pattern="[0-9]{3}-[0-9]{7}" placeholder="Contact No. (xxx-xxxxxxx)" required>
                      </div>
                      <div class="form-group my-4">
                          <label>Password</label>
                          <input type="password" name="password" class="form-control" placeholder="Password" required>
                      </div>
                      <div class="form-group my-4">
                            <label>Role</label>
                            <br>
                            <select name="role" class="form-control" id="inpEditRole" required>
                              <option selected disabled>Select Role</option>
                              <option value="0">Regular Member</option>
                              <option value="1">Admin</option>	  
                            </select>
                        </div>                      

                    <button class="btn btn-dark" type="submit" name="btn-member">Submit</button>
                  </form>
                   <!-- Form End-->
               </div>
           </div>
       </div>
   </div>
</div>

<?php include "footer.php"?>
   
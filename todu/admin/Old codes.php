<!-- Old Add member codes  -->

<div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                      </div>
                          <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="user" class="form-control" placeholder="Username" required>
                      </div>
                      <div class="form-group">
                          <label>Email</label>
                          <input type="email" name="email" class="form-control"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" maxlength="50" placeholder="Email Address" required>
                      </div>
                      <div class="form-group">
                          <label>Contact</label>
                          <input type="text" name="contact" class="form-control" maxlength="11" pattern="[0-9]{3}-[0-9]{7}" placeholder="Contact No. (xxx-xxxxxxx)" required>
                      </div>

                      <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="password" class="form-control" placeholder="Password" required>
                      </div>
                      <div class="form-group">
                          <label>Role</label>
                          <br>
                          <select name="role" class="form-control" id="inpEditRole" required>
                            <option selected disabled>Select Role</option>
                            <option value="0">Regular Member</option>
                            <option value="1">Admin</option>	  
                          </select>
                      </div>

<!-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------  -->


<?php inputField("First Name","text","fname"," "," ","First Name");?>
                    <?php inputField("Last Name","text","lname"," "," ","Last Name");?>
                    <?php inputField("Username","text","user"," "," ","Username");?>
                    <?php inputField("Email","email","email","[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$","50","Email Address");?>
                    <?php inputField("Contact","text","contact","[0-9]{3}-[0-9]{7}","11","Contact No. (xxx-xxxxxxx)");?>
                    <?php inputField("Password","password","password"," "," ","Password");?>

<!-- End of old Add member codes  -->

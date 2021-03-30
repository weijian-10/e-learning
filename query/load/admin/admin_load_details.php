<?php
require("../../../db.php");  
$query="Select * from admin where admin_id='".$_GET["admin_id"]."'";
$result=mysqli_query($con,$query);
$row=mysqli_fetch_array($result);

?>
  <form method="post">
         <div class="form-group">
            <label for="recipient-name" class="col-form-label">Username:</label>
            <input type="text" class="form-control" id="admin_username" name="admin_username" value="<?php echo $row["admin_username"]; ?>">
            <input type="hidden" class="form-control" id="admin_id" name="admin_id" value="<?php echo $row["admin_id"]; ?>">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Password:</label>   
            <input type="password" class="form-control" id="admin_pass" name="admin_pass" onclick="adminLogin()" value="<?php echo $row["admin_pass"]; ?>">
          </div>
            <div class="form-group">
                <input type="checkbox" onclick="showpass()" >Show password
            </div>

    </form>     
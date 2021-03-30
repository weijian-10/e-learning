<?php
require("../../../db.php");  
$query="Select * from user inner join course on user.course_id=course.course_id where user_id='".$_GET["user_id"]."'";
$result=mysqli_query($con,$query);
$row=mysqli_fetch_array($result);
if($row["image"]!=""){
    $img='<img height="150" width="150" src="'. $row["image"] .' ">';
}
else{
    $img="";
}

?>
      <form method="post" id="eform1" enctype="multipart/form-data" >
         <div class="form-group">
            <label for="recipient-name" class="col-form-label">Username:</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo $row["username"]; ?>">
            <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?php echo $row["user_id"]; ?>">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Password:</label>
            <input type="password" class="form-control" id="password" name="password" value="<?php echo $row["password"]; ?>">
             <input type="checkbox" onclick="showpass()">Show Password
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $row["name"]; ?>">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Age:</label>
            <input type="text" class="form-control" id="age" name="age" value="<?php echo $row["age"]; ?>">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Address:</label>
            <input type="text" class="form-control" id="address" name="address" value="<?php echo $row["address"]; ?>">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Gender:</label>
              <select id="gender" name="gender" class="form-control">
                  <?php
                  
                    if($row["gender"]=="Male"){
                        echo'<option selected value="Male">Male</option>';
                        echo'<option  value="Female">Female</option>';
                    }
                   elseif($row["gender"]=="Female"){
                        echo'<option  value="Male">Male</option>';
                        echo'<option selected  value="Female">Female</option>';
                    }
                  else{
                       echo'<option  value="Male">Male</option>';
                        echo'<option   value="Female">Female</option>';
                  }
                  
                  ?>
              </select>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Course:</label>
              <input type="text" name="course_name" id="course_name" class="form-control" value="<?php echo $row["course_name"]?>" disabled >
              <input type="hidden" name="course" id="course" class="form-control" value="<?php echo $row["course_id"]?>" >
              
           </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Email:</label>
            <input type="text" class="form-control" id="email" name="email" value="<?php echo $row["email"]; ?>">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Phone:</label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row["phone"]; ?>">
          </div>  
         <div class="form-group">
            <label for="recipient-name" class="col-form-label">Profile Image:</label>
            <input type="file" name="efile" id="efile" size="50"  class="form-control"/>
            <?php echo $img; ?>
          </div>
    </form>     
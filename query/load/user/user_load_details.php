<?php
require("../../../db.php");  
session_start();
if(isset($_SESSION["admin_id"])){
    $where="";
    
}
elseif(isset($_SESSION["teacher_id"])){
    $where=" where course_id='".$_SESSION["course_id"]."'";
    
}
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
            <input type="text" class="form-control"  id="eusername" name="eusername" value="<?php echo $row["username"]; ?>">
            <input type="hidden" class="form-control"  id="euser_id" name="euser_id" value="<?php echo $row["user_id"]; ?>">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Password:</label>
            <input type="password" class="form-control"   id="epassword" name="epassword" value="<?php echo $row["password"]; ?>">
            <input type="checkbox" onclick="showpass1()" >Show password
          </div>
           <div class="form-group">
            <label for="recipient-name" class="col-form-label">Course:</label>
               <select  id="ecourse_name" name="ecourse_name" class="form-control">
                 <?php
                        echo $query2="Select * from course  ".$where." ";
                        $result2=mysqli_query($con,$query2);
                      while($row2=mysqli_fetch_array($result2)){
                          if($row2["course_id"]==$row["course_id"])
                          {
                          echo '<option selected value='.$row2["course_id"].'>'.$row2["course_name"].'</option>';
                          }
                          else{
                         echo '<option  value='.$row2["course_id"].'>'.$row2["course_name"].'</option>';
                          }
                      }
                   
                    ?>
               </select>
           </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Age:</label>
            <input type="text" class="form-control" id="eage" name="eage" value="<?php echo $row["age"]; ?>">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Address:</label>
            <input type="text" class="form-control" id="eaddress" name="eaddress" value="<?php echo $row["address"]; ?>">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Gender:</label>
              <select  id="egender" name="egender" class="form-control">
                <?php
                    if($row["gender"]=="Male"){
                        echo '<option selected value="Male">Male</option>';
                            echo '<option  value="Female">Female</option>';
                    }
                    elseif($row["gender"]=="Female"){
                       echo '<option  selected value="Female">Female</option>';
                           echo '<option  value="Male">Male</option>';
                    }
              
                  
                  ?>
              </select>
          </div>
         
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" id="ename" name="ename" value="<?php echo $row["name"]; ?>">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Email:</label>
            <input type="text" class="form-control" id="eemail" name="eemail" value="<?php echo $row["email"]; ?>">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Phone:</label>
            <input type="text" class="form-control" id="ephone" name="ephone" value="<?php echo $row["phone"]; ?>">
          </div>
         <div class="form-group">
            <label for="recipient-name" class="col-form-label">Image:</label><br>   
            <input type="file" name="efile" id="efile" size="50"  class="form-control"/>
            <?php echo $img; ?>
          </div>
         
    </form>     
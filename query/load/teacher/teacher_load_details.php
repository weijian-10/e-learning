<?php
require("../../../db.php");  
$query="Select * from teacher where teacher_id='".$_GET["teacher_id"]."'";
$result=mysqli_query($con,$query);
$row=mysqli_fetch_array($result);


?>
      <form method="post" id="eform1" enctype="multipart/form-data" >
     <div class="form-group">
        <label for="recipient-name" class="col-form-label">Course:</label>
         <select name="ecourse_id" id="ecourse_id" class="form-control">
               <option value="">Please Select</option>
              <?php
                    $query2="Select * from course";
                    $result2=mysqli_query($con,$query2);
                    while($row2=mysqli_fetch_array($result2))
                    {
                        if($row["course_id"]==$row2["course_id"]){
                                echo '<option selected value="'.$row2["course_id"].'">'.$row2["course_name"].'</option>';
                        }else{
                                echo '<option value="'.$row2["course_id"].'">'.$row2["course_name"].'</option>';
                        }
                    }
               
               ?>
             
            </select> 
          </div>
         <div class="form-group">
            <label for="recipient-name" class="col-form-label">Username:</label>
            <input type="text" class="form-control" id="teacher_username" name="teacher_username" value="<?php echo $row["teacher_username"]; ?>">
            <input type="hidden" class="form-control" id="teacher_id" name="teacher_id" value="<?php echo $row["teacher_id"]; ?>">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Password:</label>
            <input type="password" class="form-control" id="teacher_password" name="teacher_password" value="<?php echo $row["teacher_password"]; ?>">
          </div>
           <div class="form-group">
                <input type="checkbox" onclick="showpass1()" >Show password
          </div>

    </form>     
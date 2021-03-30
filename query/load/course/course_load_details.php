<?php
require("../../../db.php");  
session_start();
$query="Select * from course where course_id='".$_GET["course_id"]."'";
$result=mysqli_query($con,$query);
$row=mysqli_fetch_array($result);
if($row["course_image"]!=""){
    $img='<img height="150" width="150" src="'. $row["course_image"] .' ">';
}
else{
    $img="";
}
   if(isset($_SESSION["teacher_id"])){
       $disable="readonly";
   }
   if(isset($_SESSION["admin_id"])){
       $disable="";
   }
?>
      <form method="post" id="eform1" enctype="multipart/form-data" >
         <div class="form-group">
            <label for="recipient-name" class="col-form-label">Course:</label>
            <input type="text" class="form-control" id="ecourse_name" name="ecourse_name" <?php  echo $disable;?> value="<?php echo $row["course_name"]; ?>">
            <input type="hidden" class="form-control" id="ecourse_id" name="ecourse_id" value="<?php echo $row["course_id"]; ?>">
          </div>
         <div class="form-group">
            <label for="recipient-name" class="col-form-label">Image:</label>
            <input type="file" name="efile" id="efile" size="50"  class="form-control"/>
            <?php echo $img; ?>
          </div>
         
    </form>     
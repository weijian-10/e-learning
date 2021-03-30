<?php
require("../../../db.php"); 
session_start();
if(isset($_SESSION["admin_id"])){
    $where="";
    
}elseif(isset($_SESSION["teacher_id"])){
    $where=" where course_id=".$_SESSION["course_id"]."";
}
$query="SELECT * FROM `subject` inner JOIN course ON subject.course_id=course.course_id WHERE subject.subject_id='".$_GET["subject_id"]."'";
$result=mysqli_query($con,$query);
$row=mysqli_fetch_array($result);

?>
  <form method="post">
      <div class="form-group">
            <label for="recipient-name" class="col-form-label">Course:</label>
           <select id="ecourse_id" class="form-control">
              <?php
                   $query2="Select * from course ".$where." ";
                   $result2=mysqli_query($con,$query2);
                    while($row2=mysqli_fetch_array($result2))
                    {
                        if($row["course_name"]==$row2["course_name"])
                        {
                            echo '<option selected value='.$row["course_id"].'>'.$row["course_name"].'</option>';
                        }
                        else{
                            echo '<option value='.$row2["course_id"].'>'.$row2["course_name"].'</option>';
                        }
                    }
                ?>
              
            </select>
          </div>
         <div class="form-group">
            <label for="recipient-name" class="col-form-label">SubjectName:</label>
            <input type="text" class="form-control" id="esubject_name" name="esubject_name" value="<?php echo $row["subject_name"]; ?>">
            <input type="hidden" class="form-control" id="subject_id" name="subject_id" value="<?php echo $row["subject_id"]; ?>">
          </div>
          
    </form>     
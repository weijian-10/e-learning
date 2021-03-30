<?php
require("../../../db.php"); 
function load_course(){
    require("../../../db.php");
    session_start();
    if(isset($_SESSION["admin_id"])){
        $where="";
    }
    elseif(isset($_SESSION["teacher_id"]))
    {
        $where=" where course_id='".$_SESSION["course_id"]."'";
    }
    
    echo $query2="SELECT * 
             FROM `tutorial` 
             INNER JOIN
             subject on tutorial.subject_id=subject.subject_id 
             INNER JOIN
             course on subject.course_id=course.course_id 
             WHERE
             tutorial_id='".$_GET["tutorial_id"]."' ".$where." ";
    $result2=mysqli_query($con,$query2);
    $row2=mysqli_fetch_array($result2); 
    $output="";
 
       $query="SELECT * FROM course ".$where." ";
       $result=mysqli_query($con,$query);
        while($row=mysqli_fetch_array($result))
        { 
            if($row2["course_name"]==$row["course_name"])
            {
                $output .= '<option  selected value='.$row2["course_id"].'>'.$row2["course_name"].'</option>';
            }
            else{
               $output .= '<option  value='.$row["course_id"].'>'.$row["course_name"].'</option>';
            }
        }
    return $output;
                 
}
    $query="SELECT * FROM `tutorial` inner join subject on tutorial.subject_id=subject.subject_id WHERE tutorial_id='".$_GET["tutorial_id"]."'";
    $result=mysqli_query($con,$query);
    while($row=mysqli_fetch_array($result)){
        //$tutorial_desc=$row["tutorial_desc"];
        //$tutorial_example=$row["tutorial_example"];
        $tutorial_id=$row["tutorial_id"];
        $t_subject_name=$row["subject_name"];
        $tutorial_filepath=$row["tutorial_filepath"];
        $tutorial_name=$row["tutorial_name"];
        $course_id=$row["course_id"];
    }

?>
  <form method="post" id="eform1">
      
       <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Course Name:</label>
            <select name="ecourse_name" id="ecourse_name" class="form-control" onchange="loadCourse()">
                   <?php echo load_course(); ?>
 
              </select>
          </div>
     
         <div class="form-group">
            <label for="recipient-name" class="col-form-label">Subject:</label>
               <select name="esubject_id" id="esubject_id" class="form-control">
                  
               <?php
                   $query2="SELECT * FROM `course` inner JOIN subject on course.course_id=subject.course_id WHERE course.course_id='".$course_id."'";
                   $result2=mysqli_query($con,$query2);
                   while($row2=mysqli_fetch_array($result2)){
                       if($row2["subject_name"]==$t_subject_name){
                           echo '<option selected value='.$row2["subject_id"].'>'.$t_subject_name.'</option>';
                        }
                       else{
                            echo '<option value='.$row2["subject_id"].'>'.$row2["subject_name"].'</option> ';   
                       }
                   }
                      
                ?>
              </select>      
          </div>
       <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Subtitle Name:</label>
                  <input type="text" class="form-control" name="etutorial_name" id="etutorial_name"  value="<?php echo $tutorial_name; ?>">
                  <input type="hidden" class="form-control" name="etutorial_id" id="etutorial_id"  value="<?php echo $tutorial_id; ?>">
          </div>
       <div class="form-group">
            <label for="recipient-name" class="col-form-label">Filepath:</label>
            <input type="file" name="efile" id="efile" size="50"   class="form-control"/>
            <span><?php  echo $tutorial_filepath ;?></span><br>
<!--            <a id="apdf" onclick="apdf()"   href="">Click here to preview your PDF</a>    -->
          </div>
        
      
     
    </form>     

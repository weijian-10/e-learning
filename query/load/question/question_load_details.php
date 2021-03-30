<?php
require("../../../db.php");  
session_start();
function load_course(){
    require("../../../db.php");
  if(isset($_SESSION["admin_id"])){
      $where="";
      $where1="";
  }
    elseif(isset($_SESSION["teacher_id"])){
        $where=" where course_id='".$_SESSION["course_id"]."'";
        $where1=" and course.course_id='".$_SESSION["course_id"]."'";
    }
     $query2="SELECT * FROM `question` 
            INNER JOIN
        subject on 
        question.subject_id=subject.subject_id 
            INNER JOIN
        question_answer ON 
        question.question_id=question_answer.question_id 
          INNER JOIN
            course ON
          subject.course_id=course.course_id
            WHERE
         question.question_id='".$_GET["question_id"]."' ".$where1." ";
    
    $result2=mysqli_query($con,$query2);
    $row2=mysqli_fetch_array($result2); 
    $output="";
 
       $query="SELECT * FROM course ".$where."" ;
       $result=mysqli_query($con,$query);
        while($row=mysqli_fetch_array($result))
        { 
            if($row2["course_name"]==$row["course_name"])
            {
                $output .= '<option selected  value='.$row["course_id"].'>'.$row["course_name"].'</option>';            
            }
            else{
                $output .= '<option  value='.$row["course_id"].'>'.$row["course_name"].'</option>';            

            }
          
        }
    return $output;
                 
}
 if(isset($_SESSION["admin_id"])){
    //$where="";
      $where1="";
  }
    elseif(isset($_SESSION["teacher_id"])){
        //$where=" where course_id='".$_SESSION["course_id"]."'";
        $where1=" and subject.course_id='".$_SESSION["course_id"]."'";
    }

     $query="SELECT * FROM `question` 
            INNER JOIN
        subject on 
        question.subject_id=subject.subject_id 
            INNER JOIN
        question_answer ON 
        question.question_id=question_answer.question_id 
        INNER JOIN 
        tutorial ON 
        question.tutorial_id=tutorial.tutorial_id 
            WHERE
         question.question_id='".$_GET["question_id"]."' ".$where1."  " ;

$result=mysqli_query($con,$query);
    while($row=mysqli_fetch_array($result))
    {
        $question_id=$row["question_id"];
        $q_subject_name=$row["subject_name"];
        $q_subject_id=$row["subject_id"];
        $question_title=$row["question_title"];
        $correct_answer=$row["correct_answer"];
        $course_id=$row["course_id"];
        $tutorial_name=$row["tutorial_name"];
        
    }
?>                  

      <form method="post" id="eform1" enctype="multipart/form-data" >
         <div class="form-group">
            <label for="recipient-name" class="col-form-label">Course Name:</label>
            <select id="ecourseid" name="ecourseid" class="form-control" onchange="loadCourse();">
                <?php  echo load_course(); ?>
            </select>
          </div>
         <div class="form-group">
            <label for="recipient-name" class="col-form-label">Subject Name:</label>
            <select id="esubject_id" name="esubject_id" class="form-control" onchange="loadSubject();">
                <option value="">Please Select</option>
                <?php
                   echo $query2="SELECT * FROM subject  where course_id='".$course_id."' ";
                   $result2=mysqli_query($con,$query2);
                   while($row2=mysqli_fetch_array($result2)){
                       if($row2["subject_name"]==$q_subject_name){
                           echo '<option selected value='.$row2["subject_id"].'>'.$q_subject_name.'</option>';
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
            <select id="etutorial_id" name="etutorial_id" class="form-control">
                   <option value="">Please Select</option>
                <?php
                    $query_tutorial="SELECT * FROM tutorial where subject_id=".$q_subject_id." ";
                   $result_tutorial=mysqli_query($con,$query_tutorial);
                   while($row_tutorial=mysqli_fetch_array($result_tutorial)){
                       if($row_tutorial["tutorial_name"]==$tutorial_name)
                       {
                        echo '<option selected value="'.$row_tutorial["tutorial_id"].'">'.$tutorial_name.'</option>';
                       }
                       else{
                            echo '<option  value="'.$row_tutorial["tutorial_id"].'">'.$row_tutorial["tutorial_name"].'</option>';

                        }

                   }
                  
                
                ?>

            </select>
          </div>
                    <div class="form-group">
                        <label for="recipient-name"  class="col-form-label">Question Title</label>
                        <textarea row="15" col="50"   class="form-control" name="equestion_title" id="equestion_title"><?php echo $question_title; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name"  class="col-form-label">Correct Answer</label>
                            <select  class="form-control" name="ecorrect_answer" id="ecorrect_answer" >
                             <option value="">Please Select</option>
                            <?php
                                $query33="Select * from question where question_id='".$_GET["question_id"]."'";
                                 $result33=mysqli_query($con,$query33);
                                while($row33=mysqli_fetch_array($result33)){
                                       $correct_answer=$row33["correct_answer"];
                                }
                                if($correct_answer=="a"){
                                    echo ' <option selected value="a">A</option> 
                                            <option value="b">B</option>
                                            <option value="c">C</option>
                                            <option value="d">D</option>';
                                }
                                elseif($correct_answer=="b"){
                                      echo ' <option  value="a">A</option> 
                                            <option selected value="b">B</option>
                                            <option value="c">C</option>
                                            <option value="d">D</option>';
                                }
                                elseif($correct_answer=="c"){
                                      echo ' <option selected value="a">A</option> 
                                            <option value="b">B</option>
                                            <option selected  value="c">C</option>
                                            <option value="d">D</option>';
                                }
                               elseif($correct_answer=="d"){
                                      echo ' <option selected value="a">A</option> 
                                            <option value="b">B</option>
                                            <option value="c">C</option>
                                            <option selected value="d">D</option>';
                                }
                            ?>
                               
                            
                        </select>
                        <input type="hidden"  class="form-control" name="equestion_id" id="equestion_id" value="<?php echo $question_id; ?>" >
                    
                   </div>
    <?php
    $query3="SELECT * FROM `question_answer` INNER JOIN question ON question_answer.question_id=question.question_id WHERE question.question_id='".$_GET["question_id"]."' ";
    $result3=mysqli_query($con,$query3);
    $count=1;
    $id=1;
    $abc = array('A','B','C','D');
  for ($i = 0; $i < count($abc); )  
  {
          while($row3=mysqli_fetch_array($result3))
          {
              
                  echo ' <div class="form-group">
                                   <label for="recipient-name"  class="col-form-label">Question Answer '.$abc[$i].'</label>
                                   <input type="hidden"  class="form-control" name="eqa_id"  id="eqa_id" value="'.$row3["qa_id"].'" >
                                   <input type="text"  class="form-control"  id="eqa'.$id.'" name="eqa'.$id.'" value="'.$row3["qa_answer"].'" >
                               </div>';
                    $i++;
                    $id++;

          }

    }
    ?>
<?php
     $query666="Select * from question where question_id='".$_GET["question_id"]."'"  ;
     $result666=mysqli_query($con,$query666);
    $row666=mysqli_fetch_array($result666)
?>
       <div class="form-group">
            <label for="recipient-name" class="col-form-label">Question Image:</label>
            <input type="file" name="efile" id="efile" size="50"  class="form-control"/>
             <img id="eprofile_pic" height="150" width="150" src="<?php echo $row666["question_image"] ?>"   >
          </div>             
                  
       </form>      
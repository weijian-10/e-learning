<?php
require("../../../db.php");  
session_start();
 $minutes=$_GET["minutes"];
 $seconds=$_GET["seconds"];

$duration=array($minutes,$seconds);

  $query="SELECT * FROM `result` WHERE tutorial_id='".$_GET["tutorial_id"]."' AND user_id='".$_SESSION["user_id"]."'";
$result=mysqli_query($con,$query);
$num_rows=mysqli_num_rows($result);//count total question

$date=date("Y-m-d H:i:s");
$count=1;
$correct_answer=0;
while($row=mysqli_fetch_array($result)){
        $question_id=$row["question_id"];
        $array[]=$question_id;
    
         $answered_question=$row["result_choose"];
        $answered_question_array[]=$answered_question;
    
            $question_number=$row["question_number"];
            $question_number_array[]=$question_number;

        $query2="SELECT * FROM `question`
                    INNER JOIN result 
                    ON
                    question.question_id=result.question_id 
                    WHERE
                    question.question_id='".$question_id."'  AND user_id='".$_SESSION["user_id"]."'";
         $result2=mysqli_query($con,$query2);
         $row2=mysqli_fetch_array($result2);
        if($row2["correct_answer"]==$row2["result_choose"])
        {
            $correct_answer++;
           
        }
    
}

    $qs_id_array=implode(",",$array);   
    $asq_id_array=implode(",",$answered_question_array); 
   $questionnumb_id_array=implode(",",$question_number_array); 
    $result_duration=implode(":",$duration);


   $query88="SELECT *
   FROM `tutorial` 
   INNER JOIN subject 
   ON tutorial.subject_id=subject.subject_id 
   INNER JOIN course ON course.course_id=subject.course_id 
   WHERE
tutorial.tutorial_id='".$_GET["tutorial_id"]."'  ";
$result88=mysqli_query($con,$query88);
$row88=mysqli_fetch_array($result88);
$course_id=$row88["course_id"];
 
    $query33="INSERT INTO `history` 
    (`question_id`, `datetime`, `time_duration`, `tutorial_id`, `c_correct_num`,`user_id`,`answered_question`,`course_id`,`question_number`,`course_id2`) 
    VALUES 
    ('$qs_id_array', '$date', '$result_duration', '".$_GET["tutorial_id"]."','$correct_answer','".$_SESSION["user_id"]."','$asq_id_array','$course_id','$questionnumb_id_array','".$_SESSION["course_id"]."')";
   $result33=mysqli_query($con,$query33);
   $lastid=mysqli_insert_id($con);
    $query44=" DELETE FROM `result` WHERE `result`.`user_id` = '".$_SESSION["user_id"]."' and tutorial_id='".$_GET["tutorial_id"]."'";
   $result44=mysqli_query($con,$query44);



 $select="SELECT * FROM `history` INNER JOIN tutorial ON history.tutorial_id=tutorial.tutorial_id WHERE history.history_id='$lastid' ";
$sttr=mysqli_query($con,$select);
$sttr_result=mysqli_fetch_array($sttr);
    $arr=$sttr_result["question_id"];
    $count=count(explode(",",$arr));
    $correct=$sttr_result["c_correct_num"];
    $num=($correct/$count)*100;
    $anum= round($num, 2);
    echo "
    <div>
        <span>Subtitle Name:</span>
        <b>$sttr_result[tutorial_name]</b>
        <br>
        <span>Total questions:</span>   
        <b>$count</b>
        <br>
        <span>Correct answers:</span>
        <b>$correct</b>
        <br>
        <span>Mark:</span>
        <b>".$anum."</b>
        <br>
        <span>Time taking:</span>
        <b>".$sttr_result["time_duration"]."</b>

        <br>
        <a  class='btn btn-outline-info' href='user_answer_question.php?ututorial_id=".$sttr_result["tutorial_id"]."&&usubject_id=".$sttr_result["subject_id"]." '>Do Again</a>
        <a  class='btn btn-outline-info' href='index.php'>Main Page</a><br><br>
        <b>Color Green : <span style='color:lime'>Correct Answer</span></b><br>
        <b>Color Red : <span style='color:red'>Chosen Answer</span></b><br><br>
    </div>
    ";
   $update_history="UPDATE `history` SET `mark` = '$anum' WHERE `history`.`history_id` = '$lastid' ";
    $history_result=mysqli_query($con,$update_history);

    $select_question="SELECT * FROM history where tutorial_id='".$_GET["tutorial_id"]."' and user_id='".$_SESSION["user_id"]."' order by history_id DESC";
    $result_squestion=mysqli_query($con,$select_question);
    $row_question=mysqli_fetch_array($result_squestion);

    $array_question=$row_question["question_id"];
    $question_id=explode(",",$array_question); 
    $count=count($question_id);

    $array_answerquestion=$row_question["answered_question"];
    $answer_question1=explode(",",$array_answerquestion);

    $array_question_number=$row_question["question_number"];
    $question_number1=explode(",",$array_question_number);

$query55="SELECT * FROM `question`  WHERE tutorial_id='".$_GET["tutorial_id"]."' ";
$result55=mysqli_query($con,$query55);

$count1=1;
$abc = array('a','b','c','d');
  for ($x = 0; $x < $count; $x++)
    {
         $question_id[$x];
         $answer_question1[$x];
        $question_number1[$x];
        $row55=mysqli_fetch_array($result55);
       $query66="SELECT * FROM `question`
                  INNER JOIN 
                  question_answer
                  ON 
                  question.question_id=question_answer.question_id 
                  where
                  question.question_id='".$row55["question_id"]."'";
                  $result66=mysqli_query($con,$query66);
       
               
         if($row55["question_id"]==$question_id[$x] && $row55["correct_answer"]!=$answer_question1[$x])
         {
             echo ' '. $question_number1[$x].') <b>'.$row55["question_title"].'</b>&nbsp<a href="viewtopic.php?question_id='.$row55["question_id"].'"  target="_blank"> View Forum</a><br>';
             
            for ($i = 0; $i < count($abc);)
            {
                    
                 while($row66=mysqli_fetch_array($result66))
                 {
                     
                    if($answer_question1[$x]=="a" && $i==0)
                    {
                        $color="color:red";
                    }
                    elseif($answer_question1[$x]=="b" && $i==1)
                    {
                           $color="color:red";
                    }
                     elseif($answer_question1[$x]=="c" && $i==2)
                     {
                          $color="color:red";
                    }

                     elseif($answer_question1[$x]=="d" && $i==3)
                     {
                          $color="color:red";   //choose ur picked answer will red color
                     }
                    else
                     {
                         if($row55["correct_answer"]=="a" && $i==0)
                         {
                             $color="color:lime";
                         }
                        elseif($row55["correct_answer"]=="b" && $i==1)
                        {
                               $color="color:lime";
                        }
                         elseif($row55["correct_answer"]=="c" && $i==2)
                         {
                              $color="color:lime";
                         }
    
                         elseif($row55["correct_answer"]=="d" && $i==3)
                         {
                              $color="color:lime";  //   correct answer will  green color
                         }
                             else{
                                    $color="color:black";  //default answer will black color
                                }
                     } 

//                     echo  ' '.$abc[$i].') <input type="radio" name="qa_answer" id="qa_answer"   value='.$row66["qa_answer"].'>
//                            <span style="'.$color.';font-weight:bold">'.$row66["qa_answer"].'</span>  <br><br>';
//                       $i++;
                       echo  ' '.$abc[$i].')
                            <span style="'.$color.';font-weight:bold">'.$row66["qa_answer"].'</span>  <br><br>';
                       $i++;
                 }
              
            }
         } 
        
      else
        {
            echo "";
        }

    
      }
          

?> 

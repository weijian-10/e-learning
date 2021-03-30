<?php
require("../../../headerlink.php");
require("../../../db.php");  
session_start();
$query="Select * from history where history_id='".$_GET["history_id"]."'";
$result=mysqli_query($con,$query);
$row=mysqli_fetch_array($result);
$history_id=$row["history_id"];
$tutorial_id=$row["tutorial_id"];
$user_id=$row["user_id"];

$query22="SELECT * FROM `history` INNER JOIN tutorial ON history.tutorial_id=tutorial.tutorial_id inner join user on history.user_id=user.user_id WHERE history.history_id='$history_id' ";
$result22=mysqli_query($con,$query22);
$row22=mysqli_fetch_array($result22);
$question_id=$row22["question_id"];
$count=count(explode(",",$question_id));
$student_username=$row22["username"];
$tutorial_name=$row22["tutorial_name"];
$correct_answer=$row22["c_correct_num"];
$mark=$row22["mark"];
$timetaking=$row22["time_duration"];
?>

<main class="l-main" style="margin-top: 100px;
    margin-left: 100px;
    margin-right: 100px;">
    <div style="margin-left:30px">
    </div>
            <button type="button" data-toggle="tooltip" onclick="window.close()" class="btn btn-primary">Close</button>

      <div class="content-wrapper content-wrapper--with-bg">

        <div class="list-group" >
            <div href="#" class="list-group-item" id="exam_question">
               <h4>View <?php echo $student_username;  ?> Result</h4> 
                 <div>
        <span>Subtitle Name:</span>
        <b><?php echo $tutorial_name ?></b>
        <br>
        <span>Total questions:</span>   
        <b><?php echo $count ?></b>
        <br>
        <span>Correct answers:</span>
        <b><?php echo $correct_answer ?></b>
        <br>
        <span>Mark:</span>
        <b><?php echo $mark ?></b>
        <br>
        <span>Time taking:</span>
        <b><?php echo $timetaking ?></b>
       <hr>
        <b>Color Green : <span style='color:lime'>Correct Answer</span></b><br>
        <b>Color Red : <span style='color:red'>Chosen Answer</span></b><br><br>
     <?php
     $select_question="SELECT * FROM history where tutorial_id='".$tutorial_id."' and user_id='".$user_id."' order by history_id DESC";
    $result_squestion=mysqli_query($con,$select_question);
    $row_question=mysqli_fetch_array($result_squestion);

    $array_question=$row_question["question_id"];
    $question_id=explode(",",$array_question); 
    $count=count($question_id);
    $array_answerquestion=$row_question["answered_question"];
    $answer_question1=explode(",",$array_answerquestion);

$query55="SELECT * FROM `question`  WHERE tutorial_id='".$tutorial_id."' ";
$result55=mysqli_query($con,$query55);

$count1=1;
$abc = array('a','b','c','d');
  for ($x = 0; $x < $count; $x++)
    {
        $question_id[$x];
         $answer_question1[$x];
        $row55=mysqli_fetch_array($result55);
       $query66="SELECT * FROM `question`
                  INNER JOIN 
                  question_answer
                  ON 
                  question.question_id=question_answer.question_id 
                  where
                  question.question_id='".$row55["question_id"]."'";
                  $result66=mysqli_query($con,$query66);
       
               
         if($row55["question_id"]==$question_id[$x] || $row55["correct_answer"]==$answer_question1[$x] )
         {
             echo ' '.$count1++.') <b>'.$row55["question_title"].'</b>&nbsp<a href="../../../viewtopic.php?question_id='.$row55["question_id"].'"  target="_blank"> View Forum</a><br>';
             
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
    </div>
            </div>
                
        </div>
      </div>
</main>
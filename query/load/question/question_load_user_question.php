<?php
require("../../../db.php");  
 session_start();
//if(isset($_GET["nquestion_id"])){
//    $where=' tutorial_id='.$_GET["ntutorial_id"].' ';
//}
//else{
//    $where=' tutorial_id='.$_GET["ututorial_id"].' ';
//}
//  
//$query2323="Select * from question where $where";
//$result2323=mysqli_query($con,$query2323);
//$num_rows2323=mysqli_num_rows($result2323);
//if($num_rows2323==0){ //if check no question it will show this msg
//    echo "<h4>Sorry,we will add the question later.Press the button to close</h4>";
//    echo '<button class="btn btn-primary"  onclick="window.close()">Close</button>';
//} 
//else{ //if got question will show all question
 $abc = array('a','b','c','d');
 $qa_answerid=1;
if(isset($_GET["count"])){
    $count=$_GET["count"];
}else{
    $count=1;
}

if(isset($_GET["ututorial_id"])){ //load result limit 1 
    $where=' tutorial_id='.$_GET["ututorial_id"].' limit 1';
}
elseif(isset($_GET["nquestion_id"])){ //next query
    $question_id=$_GET["nquestion_id"];
    $where=' question_id=(SELECT min(question_id) FROM question WHERE question_id >'.$question_id.' AND tutorial_id = '.$_GET["ntutorial_id"].')';
    $r_question_id=$_GET["nquestion_id"];
    $r_tutorial_id=$_GET["ntutorial_id"];
    $r_correct_answer=$_GET["choose_answer"];
    $r_user_id=$_SESSION["user_id"];
    $query_r="INSERT INTO `result` (`question_id`, `result_choose`, `user_id`, `tutorial_id`,question_number) VALUES ('$r_question_id', '$r_correct_answer', '$r_user_id', '$r_tutorial_id','".$_GET["num_question"]."')";
    $result_r=mysqli_query($con,$query_r);

}
elseif(isset($_GET["bquestion_id"])){ //back query
    $question_id=$_GET["bquestion_id"];
    $where=' question_id=(SELECT max(question_id) FROM question WHERE question_id <'.$question_id.' AND tutorial_id = '.$_GET["btutorial_id"].')';

}
   $query="SELECT * FROM `question` WHERE $where ";
 $result=mysqli_query($con,$query);
 $row_num=mysqli_num_rows($result);
    
if($row_num==0){
        echo '<button type="button" id="end"  class="btn btn-outline-info" onclick="checkAnswer()">End</button>' ;
        
}else{
    while($row=mysqli_fetch_array($result)) 
    {
        // if($row["question_image"]==""){
        //     $img='';

        // }
        // else{
        //    $img='<img src='.$row["question_image"].' height="150" width="150" ><br>';

        // }
         $question_id=$row["question_id"];
         $question_title=$row["question_title"];
         $tutorial_id=$row["tutorial_id"];
         $correct_answer=$row["correct_answer"];
      
        
//        $query123="SELECT * FROM result where question_id='$question_id'";
//        $result123=mysqli_query($con,$query123);
//        $row123=mysqli_fetch_array($result123);
        
        
         echo 
         '
         
         <span id="no">'.$count.'</span>)
         <label>'.$question_title.'</label>
         <input type="hidden" id="question_id" name="question_id" value='.$question_id.'>
         <input type="hidden" id="tutorial_id" name="tutorial_id" value='.$tutorial_id.'><br><br>
         ';  

        $query2="SELECT * FROM `question_answer`
                INNER JOIN 
                question 
                ON 
                question_answer.question_id=question.question_id
                WHERE 
                question.question_id='$question_id' ";

        $result2 = mysqli_query($con,$query2); 
        for ($i = 0; $i < count($abc); )
        {
            while($row2 = mysqli_fetch_array($result2))
            {
                $qa = $row2["qa_answer"];
//                if($row123["result_choose"]=="a" && $i==0){
//                     $checked="checked";
//                }
//                elseif($row123["result_choose"]=="b" && $i==1){
//                     $checked="checked";
//                }
//                 elseif($row123["result_choose"]=="c" && $i==2){
//                     $checked="checked";
//                }
//
//                 elseif($row123["result_choose"]=="d" && $i==3){
//                     $checked="checked";
//                }else{
//                     $checked="";
//                 }    
        
                echo ''.$abc[$i].' . <input type="radio"  name="qa_answer" id="qa_answer'.$qa_answerid.'" value="'.$abc[$i].'" > '.$qa.'
                <br><br>';
                    $i++;
                     $qa_answerid++;
                

            }

        }
    }
    echo '<button type="button" id="next"  class="btn btn-outline-info" onclick="Next()">Next</button>';
}
//}
?>
<!--                <button type="button" id="back" class="btn btn-outline-info" onclick="Back()">Back</button>-->
                

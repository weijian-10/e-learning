<?php
require("../../../db.php");  
 $targetfolder = "../../../pic/";
 $targetfolder = $targetfolder . basename($_FILES['file']['name']) ;
 $ok=1;

$file_type=$_FILES['file']['type'];
$subject_id=$_POST["subject_id"];
$question_title=htmlspecialchars($_POST["question_title"]);
$correct_answer=$_POST["correct_answer"];
$tutorial_id=$_POST["tutorial_id"];
$qa1=htmlspecialchars($_POST["qa1"]);
$qa2=htmlspecialchars($_POST["qa2"]);
$qa3=htmlspecialchars($_POST["qa3"]);
$qa4=htmlspecialchars($_POST["qa4"]);


if ($file_type=="image/jpeg" || $file_type=="image/png" || $file_type=="image/jpg" ) {

 if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))

 {
    $newfilepath="pic/";
    $newfilepath=$newfilepath.basename($_FILES['file']['name']);
      $query="INSERT INTO `question` ( `subject_id`, `correct_answer`, `question_title`,`tutorial_id`,`question_image`) VALUES ( '$subject_id', '$correct_answer', '$question_title','$tutorial_id','$newfilepath')";
$result=mysqli_query($con,$query);
$questionid_lastid=mysqli_insert_id($con);

 $query2="INSERT INTO `question_answer`( `qa_answer`, `question_id`) 
             VALUES 
             ('$qa1', '$questionid_lastid'), 
             ('$qa2', '$questionid_lastid'), 
             ('$qa3', '$questionid_lastid'), 
             ('$qa4', '$questionid_lastid')";
$result2=mysqli_query($con,$query2);
     header("location:../../../course.php");
 }



}
if($file_type=="") {
     $query="INSERT INTO `question` ( `subject_id`, `correct_answer`, `question_title`,`tutorial_id`) VALUES ( '$subject_id', '$correct_answer', '$question_title','$tutorial_id')";
$result=mysqli_query($con,$query);
$questionid_lastid=mysqli_insert_id($con);

 $query2="INSERT INTO `question_answer`( `qa_answer`, `question_id`) 
             VALUES 
             ('$qa1', '$questionid_lastid'), 
             ('$qa2', '$questionid_lastid'), 
             ('$qa3', '$questionid_lastid'), 
             ('$qa4', '$questionid_lastid')";
$result2=mysqli_query($con,$query2);
     header("location:../../../course.php");
    
}


else {

 echo "wrongimage";

}
  
   

?>

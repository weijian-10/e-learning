<?php
require("../../../db.php");  
   $targetfolder = "../../../pic/";
    $targetfolder = $targetfolder . basename($_FILES['efile']['name']) ;
    $ok=1;
$file_type=$_FILES['efile']['type'];

$question_id=$_POST["equestion_id"];
$qa_id=$_POST["eqa_id"];
$subject_id=$_POST["esubject_id"];
$correct_answer=$_POST["ecorrect_answer"];
$question_title=htmlspecialchars($_POST["equestion_title"]);
$etutorial_id=$_POST["etutorial_id"];
$esubject_id=$_POST["esubject_id"];
$qa1=htmlspecialchars($_POST["eqa1"]);
$qa2=htmlspecialchars($_POST["eqa2"]);
$qa3=htmlspecialchars($_POST["eqa3"]);
$qa4=htmlspecialchars($_POST["eqa4"]);

if(empty($_FILES['efile']['name'])){
    $targerfile="";
}else{
if ($file_type=="image/jpeg" || $file_type=="image/png" || $file_type=="image/jpg" ) {

 if(move_uploaded_file($_FILES['efile']['tmp_name'], $targetfolder))
 {
     $newfilepath="pic/";
     $newfilepath=$newfilepath.basename($_FILES['efile']['name']);
      
 }

}   
else {

  $newfilepath="";
    echo "wrongimage";

 }
     $targerfile=",`question_image`='".$newfilepath."'";
    

}
$select_qaID="SELECT * FROM question_answer INNER JOIN question ON question_answer.question_id=question.question_id where question_answer.question_id='$question_id' ";
$result_qaID=mysqli_query($con,$select_qaID);
$row_qaid=array();
    while($row=mysqli_fetch_array($result_qaID))
    {
        $row_qaid[]=$row["qa_id"];//25 26 27 28
    }
  $out = json_encode($row_qaid,JSON_FORCE_OBJECT); 
  
    $qa_id1=json_decode($row_qaid[0]);
    $qa_id2=json_decode($row_qaid[1]);
    $qa_id3=json_decode($row_qaid[2]);
    $qa_id4=json_decode($row_qaid[3]);


     $update="UPDATE `question` SET 
            `subject_id` = '$subject_id',`correct_answer` = '$correct_answer', `question_title` = '$question_title',subject_id='$esubject_id',tutorial_id='$etutorial_id' $targerfile
            WHERE `question_id` = '$question_id' ";
   mysqli_query($con, $update);

   $update2="UPDATE question_answer 
   SET qa_answer = CASE WHEN qa_id = '$qa_id1' THEN '$qa1'
                    WHEN qa_id = '$qa_id2' THEN '$qa2'
                    WHEN qa_id = '$qa_id3' THEN '$qa3'
                    WHEN qa_id = '$qa_id4' THEN '$qa4'
                    ELSE ''
                END
 WHERE qa_id IN ($qa_id1,$qa_id2,$qa_id3,$qa_id4)";
mysqli_query($con, $update2);
?>



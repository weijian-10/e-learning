<?php
require("../../../db.php");  
$targetfolder = "../../../upload/";
$subject_id=$_POST["esubject_id"];
$tutorial_name=$_POST["etutorial_name"];
$tutorial_id=$_POST["etutorial_id"];
$targetfolder = $targetfolder . basename($_FILES['efile']['name']) ;
$ok=1;

$file_type=$_FILES['efile']['type'];
$query66="Select * from tutorial where tutorial_name='".$_POST["etutorial_name"]."'";
$result66=mysqli_query($con,$query66);
$num_rows66=mysqli_num_rows($result66);

if(empty($_FILES['efile']['name'])){
    $targerfile="";
}else{
    if ($file_type=="application/pdf") {

 if(move_uploaded_file($_FILES['efile']['tmp_name'], $targetfolder))
 {
     $newfilepath="upload/";
     $newfilepath=$newfilepath.basename($_FILES['efile']['name']);
      
 }


}
    else {
        $newfilepath="";
            echo 1;

 }
     $targerfile=",`tutorial_filepath`='".$newfilepath."'";
    

}
  if($num_rows66==1)
    {
      $update="UPDATE `tutorial` SET `subject_id` = '".$subject_id."'
                 $targerfile   WHERE `tutorial_id` = '".$tutorial_id."'";
$result=mysqli_query($con,$update);
    }
else{
  $update="UPDATE `tutorial` SET `subject_id` = '".$subject_id."',`tutorial_name`= '".$tutorial_name."'
                 $targerfile   WHERE `tutorial_id` = '".$tutorial_id."'";
$result=mysqli_query($con,$update);


}
   
?>
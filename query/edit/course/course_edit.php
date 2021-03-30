<?php
require("../../../db.php");  
   $targetfolder = "../../../pic/";
   
$course_name=$_POST["ecourse_name"];
    $course_id=$_POST["ecourse_id"];
    $targetfolder = $targetfolder . basename($_FILES['efile']['name']) ;
    $ok=1;

$file_type=$_FILES['efile']['type'];
$query66="Select * from course where course_name='".$_POST["ecourse_name"]."'";
$result66=mysqli_query($con,$query66);
$num_rows66=mysqli_num_rows($result66);

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
     $targerfile=",`course_image`='".$newfilepath."'";
     $targerfile2="`course_image`='".$newfilepath."'";
    

}
  if($num_rows66>0)
    {
       $update="UPDATE `course` SET $targerfile2 WHERE `course_id` = '$course_id' ";
      mysqli_query($con, $update);
    }
else{
 $update="UPDATE `course` SET `course_name` = '$course_name' $targerfile WHERE `course_id` = '$course_id' ";
mysqli_query($con, $update);


}
   
?>
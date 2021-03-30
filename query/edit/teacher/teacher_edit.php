<?php
require("../../../db.php");  
$query66="Select * from teacher where teacher_username='".$_GET["teacher_username"]."'";
$result66=mysqli_query($con,$query66);
$num_rows66=mysqli_num_rows($result66);
  if($num_rows66==1)
    {
        $update="UPDATE `teacher` SET  `teacher_password` = '".$_GET["teacher_password"]."',course_id='".$_GET["ecourse_id"]."' 
            WHERE `teacher_id` = '".$_GET["teacher_id"]."'";
        mysqli_query($con, $update) or die(mysqli_error());
    }
else{
    $update="UPDATE `teacher` SET `teacher_username` = '".$_GET["teacher_username"]."', `teacher_password` = '".$_GET["teacher_password"]."',course_id='".$_GET["ecourse_id"]."' 
            WHERE `teacher_id` = '".$_GET["teacher_id"]."'";
    mysqli_query($con, $update) or die(mysqli_error());
}
?>
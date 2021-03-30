<?php
require("../../../db.php");  
$query66="Select * from subject where subject_name='".$_GET["subject_name"]."'";
$result66=mysqli_query($con,$query66);
$num_rows66=mysqli_num_rows($result66);
  if($num_rows66==1)
    {
      $update="UPDATE `subject` SET `course_id`='".$_GET["course_id"]."' WHERE `subject_id` = '".$_GET["subject_id"]."'";

    mysqli_query($con, $update) or die(mysqli_error());
    }
else{
    $update="UPDATE `subject` SET `course_id`='".$_GET["course_id"]."', `subject_name` = '".$_GET["subject_name"]."' WHERE `subject_id` = '".$_GET["subject_id"]."'";

    mysqli_query($con, $update) or die(mysqli_error());
}

?>
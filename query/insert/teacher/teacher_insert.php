<?php 
require("../../../db.php");
$teacher_username=$_GET['teacher_username'];    
$teacher_password=$_GET['teacher_password'];
$course_id=$_GET['course_id'];
 $query66="Select * from teacher where teacher_username='$teacher_username'";
$result66=mysqli_query($con,$query66);
$num_rows66=mysqli_num_rows($result66);
  if($num_rows66==1)
    {
      echo "1";
    }
else{
     $query="Insert Into teacher(teacher_username,teacher_password,course_id)values('$teacher_username','$teacher_password','$course_id')";
     $result=mysqli_query($con,$query);
    }       
 ?>  
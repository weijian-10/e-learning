   <?php 
require("../../../db.php");  
$query66="Select * from subject where subject_name='".$_GET["subject_name"]."'";
$result66=mysqli_query($con,$query66);
$num_rows66=mysqli_num_rows($result66);
  if($num_rows66==1)
    {
      echo "12";
    }
else{
            $subjectname=$_GET['subject_name'];
            $course_id=$_GET['course_id'];
            $query="Insert Into subject(course_id,subject_name)values('$course_id','$subjectname')";
            $result=mysqli_query($con,$query);
}

 ?>

      
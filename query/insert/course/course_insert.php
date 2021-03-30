<?php
require("../../../db.php");  
 $targetfolder = "../../../upload/";
    $course_name=$_POST["course_name"];
 $targetfolder = $targetfolder . basename($_FILES['file']['name']) ;
 $ok=1;
$query66="Select * from course where course_name='".$_POST["course_name"]."'";
$result66=mysqli_query($con,$query66);
$num_rows66=mysqli_num_rows($result66);
  if($num_rows66==1)
    {
      echo "12";
    }else{
$file_type=$_FILES['file']['type'];

if ($file_type=="image/jpeg" || $file_type=="image/png" || $file_type=="image/jpg" ) {

 if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))

 {
    $newfilepath="upload/";
    $newfilepath=$newfilepath.basename($_FILES['file']['name']);
     $query="INSERT INTO `course` (course_name,`course_image`) VALUES ('$course_name','$newfilepath')";
     $result=mysqli_query($con,$query);
     header("location:../../../course.php");
 }

 else {

        echo "Problem uploading file";

    }

}

else {

 echo "wrongimage";

}
  }
   
?>
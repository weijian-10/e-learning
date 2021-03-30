<?php
require("../../../db.php");  
if(isset($_POST["course_name"])){
    $query="SELECT * FROM `course` inner JOIN subject ON course.course_id=subject.course_id WHERE course.course_id='".$_POST["course_name"]."'";
    $result=mysqli_query($con,$query);
    $output='<option value="">Please Select</option>';
    while($row=mysqli_fetch_array($result))
    {
        $output .='<option value="'.$row["subject_id"].'">'.$row["subject_name"].'</option>';
    }
    echo $output;
}
if(isset($_GET["ecourse_name"])){
    
    $query2="SELECT * FROM `course` inner JOIN subject ON course.course_id=subject.course_id WHERE course.course_id='".$_GET["ecourse_name"]."'";
    $result2=mysqli_query($con,$query2);
    $output2='<option value="">Please Select</option>';
    while($row2=mysqli_fetch_array($result2))
    {
        $output2 .='<option value="'.$row2["subject_id"].'">'.$row2["subject_name"].'</option>';
    }
    echo $output2;
    
 }
?>
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
if(isset($_GET["ecourseid"])){
    $query="SELECT * FROM `course` inner JOIN subject ON course.course_id=subject.course_id WHERE course.course_id='".$_GET["ecourseid"]."'";
    $result=mysqli_query($con,$query);
    $output='<option value="">Please Select</option>';
while($row=mysqli_fetch_array($result))
{
    $output .='<option value="'.$row["subject_id"].'">'.$row["subject_name"].'</option>';
}
echo $output;
}
?>
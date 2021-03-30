<?php
require("../../../db.php");  
session_start();
if(isset($_SESSION["teacher_id"]))
{
    $where=" where course.course_id='".$_SESSION["course_id"]."' ";
}
elseif(isset($_SESSION["admin_id"]))
{
    $where="";
}
$query="SELECT * FROM `question`
        INNER JOIN 
        subject
        ON
        subject.subject_id=question.subject_id 
        INNER JOIN
        tutorial
        ON 
        question.tutorial_id=tutorial.tutorial_id 
        INNER JOIN 
        course
        ON 
        subject.course_id=course.course_id
        ".$where." order by question.question_id desc
        ";
$result = mysqli_query($con,$query);
$data = array();
$count=1;
while($row=mysqli_fetch_array($result))
{
$id=$row["question_id"];
 $sub_array = array();
 $sub_array[]='<tr><td>'.$count.'</td>';
 $sub_array[]='<td>'.$row["subject_name"].'</td>';
 $sub_array[]='<td>'.$row["course_name"].'</td>';
 $sub_array[]='<td>'.$row["tutorial_name"].'</td>';
 $sub_array[]='<td>'.$row["question_title"].'</td>';
 $sub_array[]='<td><button onclick="editData(this.value)" value="'.$row["question_id"].'" type="button" name="edit"  class="btn btn-primary btn-xs edit" >Edit</button></td></tr>';
 $sub_array[]='<td><button onclick="deleteAll(this.value)"  value="'.$row["question_id"].'" type="button" name="delete"  class="btn btn-danger btn-xs delete" >Delete</button></td></tr>';
 $count++;    

 $data[] = $sub_array;

}
//<input type="checkbox" class="checkboxClass" id="checkboxID" onclick="UpdateCheck(this.value)"  value="'.$row["cat_id"].'" name="checkbox">
$output = array(
 "data" => $data
);
echo json_encode($output);
?>  


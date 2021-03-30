<?php

require("../../../db.php");  
session_start();
if(isset($_SESSION["admin_id"]))
{
    $where="";
}
elseif(isset($_SESSION["teacher_id"])){
    $where=" where course.course_id='".$_SESSION["course_id"]."'";
}
 $query="SELECT * FROM `subject` INNER JOIN course ON subject.course_id=course.course_id ".$where."
        ORDER BY subject.subject_id desc";
$result = mysqli_query($con,$query);
$data = array();
$count=1;
while($row=mysqli_fetch_array($result))
{
$id=$row["subject_id"];
 $sub_array = array();
 $sub_array[]='<tr><td>'.$count.'</td>';
 $sub_array[]='<td>'.$row["course_name"].'</td>';
 $sub_array[]='<td>'.$row["subject_name"].'</td>';
 $sub_array[]='<td><button onclick="editData(this.value)" value="'.$row["subject_id"].'" type="button" name="edit"  class="btn btn-primary btn-xs edit" >Edit</button></td></tr>';
 $sub_array[]='<td><button onclick="deleteAll(this.value)"  value="'.$row["subject_id"].'" type="button" name="delete"  class="btn btn-danger btn-xs delete" >Delete</button></td></tr>';
 $count++;    

 $data[] = $sub_array;

}
//<input type="checkbox" class="checkboxClass" id="checkboxID" onclick="UpdateCheck(this.value)"  value="'.$row["cat_id"].'" name="checkbox">
$output = array(
 "data" => $data
);
echo json_encode($output);
?>  


<?php
require("../../../db.php");  
session_start();
//echo $_SESSION["teacher_id"];
//echo $_SESSION["admin_id"];
if(isset($_SESSION["teacher_id"]))
{
    $where=" where teacher_id='".$_SESSION["teacher_id"]."'";
}
elseif(isset($_SESSION["admin_id"])){
    $where="";
}
$query="Select * from teacher inner join course on teacher.course_id=course.course_id ".$where." order by teacher_id asc";
$result = mysqli_query($con,$query);
$data = array();
$count=1;
while($row=mysqli_fetch_array($result))
{
$id=$row["teacher_id"];
 $sub_array = array();
 $sub_array[]='<tr><td>'.$count.'</td>';
 $sub_array[]='<td>'.$row["teacher_username"].'</td>';
 $sub_array[]='<td>'.$row["teacher_password"].'</td>';
 $sub_array[]='<td>'.$row["course_name"].'</td>';
 $sub_array[]='<td><button onclick="editData(this.value)" value="'.$row["teacher_id"].'" type="button" name="edit"  class="btn btn-primary btn-xs edit" >Edit</button></td></tr>';
 $sub_array[]='<td><button onclick="deleteAll(this.value)"  value="'.$row["teacher_id"].'" type="button" name="delete"  class="btn btn-danger btn-xs delete" >Delete</button></td></tr>';
 $count++;    

 $data[] = $sub_array;

}
//<input type="checkbox" class="checkboxClass" id="checkboxID" onclick="UpdateCheck(this.value)"  value="'.$row["cat_id"].'" name="checkbox">
$output = array(
 "data" => $data
);
echo json_encode($output);
?>  


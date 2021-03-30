<?php
require("../../../db.php");  
session_start();
if(isset($_SESSION["admin_id"])){
    $where="";
}
elseif(isset($_SESSION["teacher_id"]))
{
    $where=" WHERE user.course_id='".$_SESSION["course_id"]."'";
}
 $query="SELECT * FROM `user` INNER JOIN course ON user.course_id=course.course_id ".$where." order by user_id asc";
$result = mysqli_query($con,$query);
$data = array();
$count=1;
while($row=mysqli_fetch_array($result))
{
$id=$row["user_id"];
 $sub_array = array();
 $sub_array[]='<tr><td>'.$count.'</td>';
 $sub_array[]='<td>'.$row["username"].'</td>';
 $sub_array[]='<td>'.$row["password"].'</td>';
 $sub_array[]='<td>'.$row["course_name"].'</td>';
 $sub_array[]='<td>'.$row["name"].'</td>';
 $sub_array[]='<td>'.$row["age"].'</td>';
 $sub_array[]='<td>'.$row["address"].'</td>';
 $sub_array[]='<td>'.$row["gender"].'</td>';
 $sub_array[]='<td>'.$row["email"].'</td>';
 $sub_array[]='<td>'.$row["phone"].'</td>';
 $sub_array[]='<td>'.$row["image"].'</td>';
 $sub_array[]='<td><button onclick="editData(this.value)" value="'.$row["user_id"].'" type="button" name="edit"  class="btn btn-primary btn-xs edit" >Edit</button></td></tr>';
 $sub_array[]='<td><button onclick="deleteAll(this.value)"  value="'.$row["user_id"].'" type="button" name="delete"  class="btn btn-danger btn-xs delete" >Delete</button></td></tr>';
 $count++;    

 $data[] = $sub_array;

}
//<input type="checkbox" class="checkboxClass" id="checkboxID" onclick="UpdateCheck(this.value)"  value="'.$row["cat_id"].'" name="checkbox">
$output = array(
 "data" => $data
);
echo json_encode($output);
?>  


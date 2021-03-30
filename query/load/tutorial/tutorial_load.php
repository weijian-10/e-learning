<?php
require("../../../db.php");  
session_start();
if(isset($_SESSION["teacher_id"])){
    $where=" where course.course_id='".$_SESSION["course_id"]."'";
}
elseif(isset($_SESSION["admin_id"])){
    $where=" ";
}
 $query="Select * from tutorial
        inner join
        subject
        on 
        tutorial.subject_id=subject.subject_id 
        inner join 
        course
        on
        subject.course_id=course.course_id 
        ".$where."
        order by tutorial_id desc
";
$result = mysqli_query($con,$query);

$data = array();
$count=1;
while($row=mysqli_fetch_array($result))
{
    if($row["tutorial_filepath"]==""){
    $font="<b>No Study Material Uploaded</b>";
    $disabled="disabled";
}
    else{
        $font="$row[tutorial_filepath]";
         $disabled="";
    }
$id=$row["tutorial_id"];
 $sub_array = array();
 $sub_array[]='<td>'.$row["course_name"].'</td>';
 $sub_array[]='<td>'.$row["subject_name"].'</td>';
 $sub_array[]='<td>'.$row["tutorial_name"].'</td>';
 $sub_array[]='<td><button type="button" class="btn btn-outline-primary btn-xs" '.$disabled.' id="apdf" onclick="apdf(this.value)" value="'.$id.'"  >'.$font.'</button></td>';

 $sub_array[]='<td><button onclick="editData(this.value)" value="'.$row["tutorial_id"].'" type="button" name="edit"  class="btn btn-primary btn-xs edit" >Edit</button></td></tr>';
 $sub_array[]='<td><button onclick="deleteAll(this.value)"  value="'.$row["tutorial_id"].'" type="button" name="delete"  class="btn btn-danger btn-xs delete" >Delete</button></td></tr>';
 $count++;    

 $data[] = $sub_array;

}
//<input type="checkbox" class="checkboxClass" id="checkboxID" onclick="UpdateCheck(this.value)"  value="'.$row["cat_id"].'" name="checkbox">
$output = array(
 "data" => $data
);
echo json_encode($output);
?>  


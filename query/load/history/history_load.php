<?php
require("../../../db.php");  
session_start();
if(isset($_SESSION["teacher_id"])){
    $where=" WHERE history.course_id2= '".$_SESSION["course_id"]."' or history.course_id='".$_SESSION["course_id"]."'";
}
elseif(isset($_SESSION["admin_id"])){
    $where="";
}
     $query="SELECT * FROM `history` 
        LEFT JOIN
        user 
        on 
        history.user_id=user.user_id 
        LEFT JOIN
        tutorial 
        ON 
        history.tutorial_id=tutorial.tutorial_id 
        LEFT JOIN
        course 
        on 
        course.course_id=history.course_id
        LEFT JOIN
        subject
        on
        tutorial.subject_id=subject.subject_id
        ".$where."  order by history_id desc ";
$result = mysqli_query($con,$query);





$data = array();
$count=1;
while($row=mysqli_fetch_array($result))
{
$query2="Select * from course where course_id='".$row["course_id2"]."'";
$result2=mysqli_query($con,$query2);
$row2=mysqli_fetch_array($result2);

$question_id=$row["question_id"];
$count_qid=count(explode(",",$question_id));
$id=$row["history_id"];
 $sub_array = array();
 $sub_array[]='<tr><td>'.$count.'</td>';
 $sub_array[]='<td>'.$row["username"].'</td>';
 $sub_array[]='<td>'.$row2["course_name"].'</td>';
 $sub_array[]='<td>'.$row["course_name"].'</td>';
 $sub_array[]='<td>'.$row["subject_name"].'</td>';
 $sub_array[]='<td>'.$row["tutorial_name"].'</td>';
 $sub_array[]='<td>'.$row["datetime"].'</td>';
 $sub_array[]='<td>'.$row["time_duration"].'</td>';
 $sub_array[]='<td>'.$row["mark"].'</td>';
 $sub_array[]='<td>'.$count_qid.'</td>';
 $sub_array[]='<td>'.$row["c_correct_num"].'</td>';
 $sub_array[]='<td><button onclick="editData(this.value)" value="'.$row["history_id"].'" type="button" name="edit"  class="btn btn-primary btn-xs edit" >View Result</button></td></tr>';
 $sub_array[]='<td><button onclick="deleteAll(this.value)"  value="'.$row["history_id"].'" type="button" name="delete"  class="btn btn-danger btn-xs delete" >Delete</button></td></tr>';
 
 $count++;    

 $data[] = $sub_array;

}
//<input type="checkbox" class="checkboxClass" id="checkboxID" onclick="UpdateCheck(this.value)"  value="'.$row["cat_id"].'" name="checkbox">SELECT * FROM `user` INNER JOIN history ON user.user_id=history.user_id INNER JOIN course ON user.course_id=course.course_id WHERE
$output = array(
 "data" => $data
);
echo json_encode($output);
?>  


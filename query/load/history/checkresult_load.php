<?php
require("../../../db.php");  
session_start();

 $query="SELECT * FROM `history` 
        INNER JOIN
        user 
        on 
        history.user_id=user.user_id 
        INNER JOIN
        tutorial 
        ON 
        history.tutorial_id=tutorial.tutorial_id 
        LEFT JOIN
        course
        ON
        course.course_id=history.course_id
        INNER JOIN
        subject 
        on
        tutorial.subject_id=subject.subject_id where history.user_id='".$_SESSION["user_id"]."' order by history_id desc ";
$result = mysqli_query($con,$query);
//$row2=mysqli_fetch_array($result);
$query2="Select * from user inner join course on user.course_id=course.course_id where user.course_id='".$_SESSION["course_id"]."'";
$result2=mysqli_query($con,$query2);
$row2=mysqli_fetch_array($result2);


//$num=mysqli_num_rows($result);

$data = array();
$count=1;
while($row=mysqli_fetch_array($result))
{
$id=$row["history_id"];
 $sub_array = array();
 $question_id=$row["question_id"];
$count_qid=count(explode(",",$question_id));
 $sub_array[]='<tr><td>'.$count.'</td>';
 $sub_array[]='<td>'.$row["username"].'</td>';
 $sub_array[]='<td>'.$row2["course_name"].'</td>';
 $sub_array[]='<td>'.$row["course_name"].'</td>';
 $sub_array[]='<td>'.$row["subject_name"].'</td>';
 $sub_array[]='<td>'.$row["tutorial_name"].'</td>';
 $sub_array[]='<td>'.$count_qid.'</td>';
 $sub_array[]='<td>'.$row["c_correct_num"].'</td>';
 $sub_array[]='<td>'.$row["time_duration"].'</td>';
 $sub_array[]='<td>'.$row["datetime"].'</td>';
 $sub_array[]='<td>'.$row["mark"].'</td>';
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


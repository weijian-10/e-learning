<?php
require("../../../db.php");  
if(isset($_POST["subject_id"])){
    $query="SELECT * FROM `tutorial` INNER JOIN subject ON tutorial.subject_id=subject.subject_id where subject.subject_id='".$_POST["subject_id"]."'";
    $result=mysqli_query($con,$query);
    $output='<option value="">Please Select</option>';
    while($row=mysqli_fetch_array($result))
    {
        $output .='<option value="'.$row["tutorial_id"].'">'.$row["tutorial_name"].'</option>';
    }
    echo $output;
}
 if(isset($_GET["esubjectid"])){
      $query="SELECT * FROM `tutorial` INNER JOIN subject ON tutorial.subject_id=subject.subject_id where subject.subject_id='".$_GET["esubjectid"]."'";
    $result=mysqli_query($con,$query);
    $output='<option value="">Please Select</option>';
    while($row=mysqli_fetch_array($result))
    {
        $output .='<option value="'.$row["tutorial_id"].'">'.$row["tutorial_name"].'</option>';
    }
    echo $output;
 }
?>
    
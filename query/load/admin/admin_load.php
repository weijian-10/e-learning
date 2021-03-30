<?php

require("../../../db.php");  
$query="Select * from admin order by admin_id asc";
$result = mysqli_query($con,$query);
$data = array();
$count=1;
while($row=mysqli_fetch_array($result))
{
$id=$row["admin_id"];
 $sub_array = array();
 $sub_array[]='<tr><td>'.$count.'</td>';
 $sub_array[]='<td>'.$row["admin_username"].'</td>';
 $sub_array[]='<td>'.$row["admin_pass"].'</td>';
 $sub_array[]='<td><button onclick="editData(this.value)" value="'.$row["admin_id"].'" type="button" name="edit"  class="btn btn-primary btn-xs edit" >Edit</button></td></tr>';
    // $sub_array[]='<td><button onclick="deleteAll(this.value)"  value="'.$row["admin_id"].'" type="button" name="delete"  class="btn btn-danger btn-xs delete" >Delete</button></td></tr>';
 $count++;    

 $data[] = $sub_array;

}
//<input type="checkbox" class="checkboxClass" id="checkboxID" onclick="UpdateCheck(this.value)"  value="'.$row["cat_id"].'" name="checkbox">
$output = array(
 "data" => $data
);
echo json_encode($output);
?>  


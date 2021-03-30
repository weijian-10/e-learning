<?php
require("../../../db.php");  
    $targetfolder = "../../../pic/";
    $username=$_POST["username"];
    $userid=$_POST["user_id"];
    $password=$_POST["password"];
    $name=$_POST["name"];
    $age=$_POST["age"];
    $address=$_POST["address"];
    $gender=$_POST["gender"];
    $course=$_POST["course"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];

 $targetfolder = $targetfolder . basename($_FILES['efile']['name']) ;
 $ok=1;

$file_type=$_FILES['efile']['type'];
$query66="Select * from user where username='".$_POST["username"]."'";
$result66=mysqli_query($con,$query66);
$num_rows66=mysqli_num_rows($result66);


if(empty($_FILES['efile']['name'])){
    $targerfile="";
}else{

if ($file_type=="image/jpeg" || $file_type=="image/png" || $file_type=="image/jpg" ) {

 if(move_uploaded_file($_FILES['efile']['tmp_name'], $targetfolder))
 {
     $newfilepath="pic/";
     $newfilepath=$newfilepath.basename($_FILES['efile']['name']);
      
 }
}
    
  else {
        $newfilepath="";
            echo 1;

 }
     $targerfile=",image='".$newfilepath."'";
    

}
  if($num_rows66==1)
    {
        $update="UPDATE `user` SET 
            `password` = '$password',
             `age` = '$age', `address` = '$address', 
             `gender` = '$gender', `course_id` = '$course', 
             `name` = '$name', `email` = '$email', 
             `phone` = '$phone' $targerfile
             WHERE `user_id` = '$userid'";
$result=mysqli_query($con,$update);
    }
else{
     $update="UPDATE `user` SET 
             `username` = '$username', `password` = '$password',
             `age` = '$age', `address` = '$address', 
             `gender` = '$gender', `course_id` = '$course', 
             `name` = '$name', `email` = '$email', 
             `phone` = '$phone' $targerfile
             WHERE `user_id` = '$userid'";
$result=mysqli_query($con,$update);
}


   
?>

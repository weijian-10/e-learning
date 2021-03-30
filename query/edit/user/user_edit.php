<?php
require("../../../db.php");  
$targetfolder = "../../../pic/";
$username=$_POST["eusername"];
$password=$_POST["epassword"];
$user_id=$_POST["euser_id"];
$ecourse_name=$_POST["ecourse_name"];
$age=$_POST["eage"];
$address=$_POST["eaddress"];
$gender=$_POST["egender"];
$name=$_POST["ename"];
$email=$_POST["eemail"];
$user_id=$_POST["euser_id"];
$phone=$_POST["ephone"];

$targetfolder = $targetfolder . basename($_FILES['efile']['name']) ;
$ok=1;
$query66="Select * from user where username='".$_POST["eusername"]."'";
$result66=mysqli_query($con,$query66);
$num_rows66=mysqli_num_rows($result66);

$file_type=$_FILES['efile']['type'];

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
     $targerfile=",`image`='".$newfilepath."'";
    

}
  if($num_rows66>0)
    {
        $update="UPDATE `user` SET  `password` = '$password', `age` = '$age', `address` = '$address',`course_id` ='$ecourse_name',`gender` = '$gender', `name` = '$name', `email` = '$email', `phone` = '$phone' $targerfile WHERE `user_id` = '$user_id'";
    mysqli_query($con, $update);
    }
else{
  $update="UPDATE `user` SET `username` = '$username', `password` = '$password', `age` = '$age', `address` = '$address',`course_id` ='$ecourse_name', `gender` = '$gender', `name` = '$name', `email` = '$email', `phone` = '$phone' $targerfile WHERE `user_id` = '$user_id'";
    mysqli_query($con, $update);




}
   
?>
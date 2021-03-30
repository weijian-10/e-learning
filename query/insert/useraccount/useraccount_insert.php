<?php
require("../../../db.php");  
$targetfolder = "../../../pic/";
            $username=$_POST["r_username"];
            $password=$_POST['r_password'];
            $course_name=$_POST['r_course'];
            $name=$_POST['r_name'];
            $age=$_POST['r_age'];
            $address=$_POST['r_address'];
            $gender=$_POST['r_gender'];
            $email=$_POST['r_email'];
            $phone=$_POST['r_phone'];
$targetfolder = $targetfolder . basename($_FILES['file']['name']) ;
 $ok=1;

$file_type=$_FILES['file']['type'];
$query66="Select * from user where username='".$_POST["r_username"]."'";
$result66=mysqli_query($con,$query66);
$num_rows66=mysqli_num_rows($result66);
  if($num_rows66==1)
    {
      echo "12";
    }
else{
if ($file_type=="image/jpeg" || $file_type=="image/png" || $file_type=="image/jpg" ) {

 if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))

 {
    $newfilepath="pic/";
    $newfilepath=$newfilepath.basename($_FILES['file']['name']);
     
      $insert="INSERT INTO `user` ( `username`, `password`, `age`, `address`, `gender`, `name`, `email`, `phone`, `course_id`, `image`) VALUES ('$username', '$password', '$age', '$address', '$gender', '$name', '$email', '$phone', '$course_name' ,'$newfilepath')";
    $result=mysqli_query($con,$insert);
 }

 else {

        echo "Problem uploading file";

    }

}

else {

 echo "wrongimage";

}
}
  
   
?>

<?php
require("../../../db.php");  
$targetfolder = "../../../pic/";
            $username=$_POST['username'];
            $password=$_POST['password'];
            $course_name=$_POST['course_name'];
            $name=$_POST['name'];
            $age=$_POST['age'];
            $address=$_POST['address'];
            $gender=$_POST['gender'];
            $email=$_POST['email'];
            $phone=$_POST['phone'];
$targetfolder = $targetfolder . basename($_FILES['file']['name']) ;
 $ok=1;
$query66="Select * from user where username='".$_POST["username"]."'";
$result66=mysqli_query($con,$query66);
$num_rows66=mysqli_num_rows($result66);
  if($num_rows66==1)
    {
      echo "12";
    }
else{
$file_type=$_FILES['file']['type'];

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

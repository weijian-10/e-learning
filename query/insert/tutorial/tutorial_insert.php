<?php
require("../../../db.php");  
 $targetfolder = "../../../upload/";
$subject_id=$_POST["subject_id"];
$tutorial_name=$_POST["tutorial_name"];
$targetfolder = $targetfolder . basename($_FILES['file']['name']) ;
$ok=1;

$file_type=$_FILES['file']['type'];
$query66="Select * from tutorial where tutorial_name='".$_POST["tutorial_name"]."'";
$result66=mysqli_query($con,$query66);
$num_rows66=mysqli_num_rows($result66);
  if($num_rows66==1)
    {
      echo "12";
    }
else{
if ($file_type=="application/pdf") {

 if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))

 {
    $newfilepath="upload/";
    $newfilepath=$newfilepath.basename($_FILES['file']['name']);
     //echo "The file ". basename( $_FILES['file']['name']). " is uploaded"; 
     $query="INSERT INTO `tutorial` (subject_id,`tutorial_filepath`,`tutorial_name`) VALUES ('$subject_id','$newfilepath','$tutorial_name')";
     $result=mysqli_query($con,$query);
     header("location:../../../tutorial.php");
 }

}

if($file_type=="") {
    
     $query="INSERT INTO `tutorial` (subject_id,`tutorial_name`) VALUES ('$subject_id','$tutorial_name')";
     $result=mysqli_query($con,$query);
     header("location:../../../tutorial.php");
 
}

else {

 echo "PDF_FILE";
}
}
?>
<?php
require("../../../db.php");  
  $query1="SELECT * FROM `question` WHERE tutorial_id='".$_GET["tutorial_id"]."'";  
  $result1=mysqli_query($con,$query1);
  $row1=mysqli_num_rows($result1);
  $row1a=mysqli_fetch_assoc($result1);
if($row1==0){
    $disable="disabled";
}
else{
    $disable="";
}
   $query="SELECT * FROM tutorial
              INNER JOIN
              subject ON 
              tutorial.subject_id=subject.subject_id 
              WHERE 
              tutorial.tutorial_id= '".$_GET["tutorial_id"]."'";
$result=mysqli_query($con,$query);
$row=mysqli_fetch_array($result);

?>

        <h5 class="card-title">Subject Name:<?php echo $row["subject_name"]; ?></h5>
        <h5 class="card-text">Subtitle Name:<?php  echo $row["tutorial_name"]?></h5><br>
        <a id="a"  download  onclick="download_pdf();"  href="<?php echo $row["tutorial_filepath"]; ?>" class="btn btn-primary">Download PDF FILE</a>
        <input type="hidden" name="ututorial_id" id="ututorial_id" value="<?php  echo $row["tutorial_id"]?>" >
        <input type="hidden" name="uquestion_id" id="uquestion_id" value="<?php  echo $row1a["question_id"]?>" >
        <a id="b"  onclick="apdf();" style="color:white"   class="btn btn-primary">Preview PDF FILE</a>
        <button type="button" href="#" <?php echo $disable; ?> class="btn btn-primary" onclick='openModal("<?php echo $_GET['tutorial_id'].",".$row['subject_id'];?>")' >Start The Exercise</button>

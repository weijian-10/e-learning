<?php
require("../../../db.php");  
    $query = "DELETE FROM subject WHERE subject_id='".$_GET["subject_id"]."'"; 
    $result = mysqli_query($con,$query);
?>

<?php
require("../../../db.php");  
    $query = "DELETE FROM course WHERE course_id='".$_GET["course_id"]."'"; 
    $result = mysqli_query($con,$query);
?>

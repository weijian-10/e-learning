<?php
require("../../../db.php");  
    $query = "DELETE FROM teacher WHERE teacher_id='".$_GET["teacher_id"]."'"; 
    $result = mysqli_query($con,$query);
?>

<?php
require("../../../db.php");  
    $query = "DELETE FROM question WHERE question_id='".$_GET["question_id"]."'"; 
    $result = mysqli_query($con,$query);
?>

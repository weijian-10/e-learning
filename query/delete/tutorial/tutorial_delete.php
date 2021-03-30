<?php
require("../../../db.php");  
    $query = "DELETE FROM tutorial WHERE tutorial_id='".$_GET["tutorial_id"]."'"; 
    $result = mysqli_query($con,$query);
?>

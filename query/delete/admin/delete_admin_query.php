<?php
require("../../../db.php");  
    $query = "DELETE FROM admin WHERE admin_id='".$_GET["admin_id"]."'"; 
    $result = mysqli_query($con,$query);
?>

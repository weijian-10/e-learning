<?php
require("../../../db.php");  
    $query = "DELETE FROM user WHERE user_id='".$_GET["user_id"]."'"; 
    $result = mysqli_query($con,$query);
?>

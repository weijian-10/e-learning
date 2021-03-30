<?php
require("../../../db.php");  
    $query = "DELETE FROM history WHERE history_id='".$_GET["history_id"]."'"; 
    $result = mysqli_query($con,$query);
?>

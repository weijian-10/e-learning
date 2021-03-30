<?php
require("../../../db.php");  
    $update="UPDATE `admin` SET `admin_username` = '".$_GET["admin_username"]."', `admin_pass` = '".$_GET["admin_pass"]."' WHERE `admin_id` = '".$_GET["admin_id"]."'";
    mysqli_query($con, $update) or die(mysqli_error());
?>
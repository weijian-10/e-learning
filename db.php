<?php   
if($_SERVER['SERVER_NAME']=="localhost"){
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "fyp_wj_tq";
}else{
    $server = "aster.arvixe.com";
    $username = "sales";
    $password = "sales";
    $database = "fyp_wjtq";
}
    date_default_timezone_set("Asia/Kuala_Lumpur");
$con = new mysqli($server,$username,$password,$database);

?>

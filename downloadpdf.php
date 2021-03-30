<?php
 echo $filepath=$_GET["tutorial_filepath"];
header("Content-type:application/pdf");

// It will be called downloaded.pdf
header("Content-Disposition:attachment;filename='downloaded.pdf'");

// The PDF source is in original.pdf
readfile("upload/weijian.pdf");
?>
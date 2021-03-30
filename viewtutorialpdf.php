<?php
include("db.php");
include("headerlink.php");
$query="Select * from tutorial where tutorial_id='".$_GET["ututorial_id"]."'";
$result=mysqli_query($con,$query);
$row=mysqli_fetch_array($result);
$filepath=$row["tutorial_filepath"];
?>
<script src="include/pdfobject.js"></script>
<div class="container">
  <div id="viewpdf2"></div>
</div>
<script>
 var viewer=$('#viewpdf2');
    PDFObject.embed('<?php echo $filepath ;?>',viewer); 

</script>
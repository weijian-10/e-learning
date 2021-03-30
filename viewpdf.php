<?php
include("db.php");
include("headerlink.php");
$query="Select * from tutorial where tutorial_id='".$_GET["etutorial_id"]."'";
$result=mysqli_query($con,$query);
$row=mysqli_fetch_array($result);
$filepath=$row["tutorial_filepath"];
if($row["tutorial_filepath"]==""){
    $font="<h1>No Study Material Uploaded</h1>";
}
else{
    $font="";
}
?>
<script src="include/pdfobject.js"></script>
<div class="container">
    <?php
    echo $font;
    ?>
  <div id="viewpdf"></div>
</div>
<script>
 var viewer=$('#viewpdf');
    PDFObject.embed('<?php echo $filepath ;?>',viewer); 

</script>
<?php
session_start();
   if(!isset($_SESSION["username"])) {
     header("location:index.php");
   }
?>
<style>
    .dashboard{
        background-color: rgb(0,0,255,0.3);
    }
          .Divadd{display:none;}
</style>   
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<?php
include('sidebar.php');
include('db.php');

$datetime=date("Y");
$datemonth=date("m");


$select="select * from course";
$result=mysqli_query($con,$select);
$array;
$dataPoints1=array();
while($row=mysqli_fetch_array($result)){
    $course=$row["course_name"];
    
    $query="Select history.*,course.course_name from history  
inner join tutorial on history.tutorial_id=tutorial.tutorial_id inner join subject on tutorial.subject_id=subject.subject_id inner join course on subject.course_id=course.course_id
where MONTH(history.datetime) = '$datemonth' AND YEAR(history.datetime) = '$datetime' AND course.course_id='$row[course_id]'";
    $sttr=mysqli_query($con,$query);
    $rows=mysqli_num_rows($sttr);
    if($rows==0){
        //array_push($dataPoints,"y=>0","label=>$course");
        //array("y" => 0, "label"=> "$course")
        array_push($dataPoints1,array("y=>0","label"=>$course));
        $array[]="0";
    }else{
        $mark=0;
        
        while($row=mysqli_fetch_array($sttr)){
            $mark+=$row["mark"];
        }
         $total=($mark/($rows*100)) * 100;
        $array[]=$total;
        array_push($dataPoints1,array("y"=>$total,"label"=>$course));
        //array_push($dataPoints,"y"=>$mark,"label"=>$course);
    }
    
    
}
//echo $new=implode(",",$array);




//array_push($dataPoints1);

// print_r($dataPoints1);
?>
<!DOCTYPE HTML>
<html>
<head>
    
</head>
<body>
    <main class="l-main">
      <div class="content-wrapper content-wrapper--with-bg">
        
        <div class="list-group">
            <div href="#" class="list-group-item">
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
   </div>
        
          </div>
      </div>
    </main>
</body>
</html>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "Every Course Students Results "
	},
	axisY: {
		title: "Number of Mark"
	},
	data: [{
		type: "line",
		dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
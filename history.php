<style>
    .history{
        background-color: rgb(0,0,255,0.3);
    } 
    .Divadd{
        display:none;
    }
</style>
<?php
include("sidebar.php");
include("db.php");
?>
<main class="l-main">
      <div class="content-wrapper content-wrapper--with-bg">
        
        <div class="list-group">
            <div href="#" class="list-group-item">
                
                <body>
                    <h2>Student Result History Page</h2>
                    
                    <hr>
                    <table width="100%" id="myTable"  class="table table-striped" >
                        <thead>
                            <tr> 
                                <th>ID</th>
                                <th>Student Name</th>
                                <th>Course</th>
                                <th>TakingCourse</th>
                                <th>Subject Name</th>
                                <th>Tutorial Name</th>
                                <th>Date Time</th>
                                <th>Time Duration</th>
                                <th>Mark</th>
                                 <th>Total Question</th>
                                <th>Total Correct Answer</th>
                                <th>View Result</th>
                                 <th>Delete</th>

                            </tr>
                        </thead>
                        
                    </table>
                </body> 
                
                
            </div>
        
          </div>
      </div>
    </main>
<script type="text/javascript" language="javascript">
  $(document).ready(function() {
        fetch_data();
 })
    
//Start Load table
 function fetch_data(){ 
$('#myTable').DataTable({
    "pageLength": 10,
    "order":[],
            "ordering": false,

    "ajax":{    
            "url":"query/load/history/history_load.php",
            },
    } );        
 } 
//End Load table
 function deleteAll($str){ 
 var xmlhttp;
 var ok = confirm("Are you sure want to Delete this record?");
    if(ok){
      if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert("Delete Sucess");
                    $('#myTable').DataTable().ajax.reload();

        }
    };
    xmlhttp.open("GET","query/delete/history/history_delete.php?history_id="+$str,true);
    xmlhttp.send();
    }
}   
function editData(str){ 
    window.open("query/load/history/admin_viewresult.php?history_id="+str);

}


</script>
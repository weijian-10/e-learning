 <?php 
include("headerlink.php");

?>
<style>

 tr, th ,td{
        text-align: center;
    }
</style>
<body>
    <div class="container" style="margin-top:50px">
    <button class="btn btn-primary"  onclick="window.close()">Close</button>
     <h2>Result Page</h2>
     
     <hr>
     <table width="100%" id="myTable"  class="table table-striped" >
         <thead>
             <tr> 
                 <th>ID</th>
                 <th>Username</th>
                 <th>Course</th>
                 <th>TakingCourse</th>
                 <th>Subject Name</th>
                 <th>Tutorial Name</th>
                 <th>Total Question</th>
                 <th>Correct Question</th>
                 <th>Duration</th>
                 <th>Date Time</th>
                 <th>Mark</th>
                 <th>View Result</th>

              </tr>
         </thead>
         
     </table>
        </div>
 </body> 
                
     

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
            "url":"query/load/history/checkresult_load.php",
            },
    } );        
 } 
//End Load table
function editData(str){ 
    window.open("query/load/history/user_viewresult.php?history_id="+str);

}

</script>
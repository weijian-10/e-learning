<?php
require("headerlink.php")

?>
<table width="100%" id="myTable"  class="table table-striped" >
                        <thead>
                            <tr> 
                                <th>ID</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        
                    </table>
<script>
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
            "url":"query/load/teacher/teacher_load.php",
            },
    } );        
 } 
//End Load table
</script>
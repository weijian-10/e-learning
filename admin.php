<style>
    .admin{
        background-color: rgb(0,0,255,0.3);
    } 
    .Divadd{
        display:none;
    }
</style>
<?php
include('sidebar.php'); 
?>
<main class="l-main">
      <div class="content-wrapper content-wrapper--with-bg"> 
        <div class="list-group">
            <div href="#" class="list-group-item">
                
                <body>
                    <h2>Admin Page</h2>
                    
                    <hr>
                    <table width="100%" id="myTable"  class="table table-striped" >
                        <thead>
                            <tr> 
                                <th>ID</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        
                    </table>
                </body> 
            </div>
          </div>
      </div>
</main>
<!--Start Add  Modal -->

<div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="a">
      <form method="post">
         <div class="form-group">
            <label for="recipient-name" class="col-form-label">Username:</label>
            <input type="text" class="form-control" id="username" name="username" >
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Password:</label>
            <input type="text" class="form-control" id="password" name="password" >
          </div>
       </form>      
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="saveAdd()">Add</button>
      </div>
    </div>
  </div>
</div>
       <!--End Add Modal -->
<!--Start Edit  Modal -->

<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="b">  
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="saveEdit()">Save</button>
      </div>
    </div>
  </div>
</div>
       <!--End Edit Modal -->
<script type="text/javascript" language="javascript">
  $(document).ready(function() {
        fetch_data();

 })
//shpw password
function showpass(){
		var x = document.getElementById("admin_pass");
		if(x.type === "password"){
			x.type = "text";
		}else{
			x.type = "password";
		}
	}
//Start Load table
 function fetch_data(){ 
$('#myTable').DataTable({
    "pageLength": 10,
    "order":[],
            "ordering": false,

    "ajax":{    
            "url":"query/load/admin/admin_load.php",
            },
    } );        
 } 
//End Load table
    
//Start Open Modal Edit Details
function editData(str){
    var xmlhttp;
     if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
         document.getElementById("b").innerHTML = xmlhttp.responseText;
         $('#editmodal').modal('show');

    }
};

xmlhttp.open("GET","query/load/admin/admin_load_details.php?admin_id="+str,true);
xmlhttp.send();
}
//End Open Modal Edit Details

// Start Save Edit Data
function saveEdit(){
    if(document.getElementById("admin_username").value==""){
               alert("please type username");
               return false;
           }
         if(document.getElementById("admin_pass").value==""){
               alert("please type password");
               return false;
           }
    var xmlhttp;
     if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("b").innerHTML = xmlhttp.responseText;
            alert("Edit Sucess");
            $('#editmodal').modal('hide');
            refresh_table();
            
        }
    };
    xmlhttp.open("GET","query/edit/admin/edit_admin_query.php?admin_username="+document.getElementById("admin_username").value+
                  "&admin_pass="+document.getElementById("admin_pass").value+
                  "&admin_id="+document.getElementById("admin_id").value,
                  true);
    xmlhttp.send();
 }
// End Save Edit Data
    
    
// Open modal start
function addData(){
    $('#addmodal').modal('show');   
}
// End modal start
    
function saveAdd(){
if(document.getElementById("username").value==""){
               alert("please type username");
               return false;
           }
         if(document.getElementById("password").value==""){
               alert("please type password");
               return false;
           }
    var xmlhttp;
    if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
 xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        
            alert("Insert Success");
            $('#addmodal').modal('hide');
            document.getElementById("username").value ="";   
            document.getElementById("password").value ="";
            refresh_table();
      
    }
};
xmlhttp.open("GET","query/insert/admin/admin_insert.php?admin_username="+document.getElementById("username").value + "&admin_pass="+document.getElementById("password").value,true);
xmlhttp.send();
}
    

   
//Start Delete Data
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
            alert("delete success");
            refresh_table();
        }
    };
    xmlhttp.open("GET","query/delete/admin/delete_admin_query.php?admin_id="+$str,true);
    xmlhttp.send();
    }
}
//End Delete Data
function refresh_table(){ 
      $('#myTable').DataTable().ajax.reload();
}
    

</script>
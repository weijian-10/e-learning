<style>
    .question{
        background-color: rgb(0,0,255,0.3);
    } 
</style>
<?php
include('sidebar.php');
include('db.php');
$query="Select * from subject";
$result=mysqli_query($con,$query);

?>
<main class="l-main">
      <div class="content-wrapper content-wrapper--with-bg">
        
        <div class="list-group">
            <div href="#" class="list-group-item">
                
                <body>
                    <h2>Question Page</h2>
                    
                    <hr>
                    <table width="100%" id="myTable"  class="table table-striped" >
                        <thead>
                            <tr> 
                                <th>ID</th>
                                <th>Subject Name</th>
                                <th>Course Name</th>
                                <th>Subtitle Name</th>
                                <th>Question Title</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        
                    </table>
                </body> 
                
                
            </div>
        
          </div>
      </div>
    </main>

<!--Start Add  Modal  -->

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
      <form method="post" id="form1" enctype="multipart/form-data" >
           <div class="form-group">
            <label for="recipient-name" class="col-form-label">Course Name:</label>
              <select name="course_name" id="course_name" class="form-control">
                   <option value="">Please Select</option>
                   <?php 
                  if(isset($_SESSION["teacher_id"])){
                      $where=" where course_id='".$_SESSION["course_id"]."'";
                      $selected="selected";
                  }
                  elseif(isset($_SESSION["admin_id"])){
                      $where="";
                      $selected="";
                  }
                    $query2="Select * from course ".$where." ";
                    $result2=mysqli_query($con,$query2);
                   while($row2=mysqli_fetch_array($result2))
                     {
                         echo '<option  value='.$row2["course_id"].'>'.$row2["course_name"].'</option>';
                     }
                    ?>
                     
                  
              </select>
          </div>
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Subject Name:</label>
            <select id="subject_id" name="subject_id" class="form-control">
                <option value="">Please Select</option>

            </select>
          </div>
          
         <div class="form-group">
            <label for="recipient-name" class="col-form-label">Subtitle Name:</label>
            <select id="tutorial_id" name="tutorial_id" class="form-control">
                   <option value="">Please Select</option>

            </select>
          </div>

         
          
                    <div class="form-group">
                        <label for="recipient-name"  class="col-form-label">Question Title</label>
                        <textarea row="15" col="50"   class="form-control" name="question_title" id="question_title" ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name"  class="col-form-label">Correct Answer</label>
                        <select  class="form-control" name="correct_answer" id="correct_answer" >
                             <option value="">Please Select</option>
                             <option value="a">A</option>
                             <option value="b">B</option>
                             <option value="c">C</option>
                             <option value="d">D</option>
                        </select>
                   </div>
                    <div class="form-group">
                        <label for="recipient-name"  class="col-form-label">Question Answer A</label>
                        <input type="text"  class="form-control" name="qa1" id="qa1" >
                    </div>
                    <div class="form-group">
                        <label for="recipient-name"  class="col-form-label">Question Answer B</label>
                        <input type="text"  class="form-control" name="qa2" id="qa2" >
                    </div>
                    <div class="form-group">
                        <label for="recipient-name"  class="col-form-label">Question Answer C</label>
                        <input type="text"  class="form-control" name="qa3" id="qa3" >
                    </div>
                    <div class="form-group">
                        <label for="recipient-name"  class="col-form-label">Question Answer D</label>
                        <input type="text"  class="form-control" name="qa4" id="qa4" >
                    </div>
                <div class="form-group">
                        <label for="recipient-name"  class="col-form-label">Question Image</label>
                       <input type="file" name="file" id="file" size="50"  class="form-control"/><br>
                        <img id="profile_pic" height="150" width="150" src="" alt="No image" >
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
    
//Start Load table
 function fetch_data(){ 
$('#myTable').DataTable({
    "pageLength": 10,
    "order":[],
            "ordering": false,

    "ajax":{    
            "url":"query/load/question/question_load.php",
            },
    } );        
 } 
    
//End Load table
$('#course_name').change(function(){
          var course_name=$(this).val();
          $.ajax({
              url:"query/load/question/question_load_subject.php",
              method:"POST",
              data:{course_name:course_name},
              dataType:"text",
              success:function(data)
              {
                  $('#subject_id').html(data);
              }
          });
      });
    
$('#subject_id').change(function(){
          var subject_id=$(this).val();
          $.ajax({
              url:"query/load/question/question_load_tutorial.php",
              method:"POST",
              data:{subject_id:subject_id},
              dataType:"text",
              success:function(data)
              {
                  $('#tutorial_id').html(data);
              }
          });
});
function loadCourse(){
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
            document.getElementById("esubject_id").innerHTML=xmlhttp.responseText;
    }
};

xmlhttp.open("GET","query/load/question/question_load_subject.php?ecourseid="+document.getElementById("ecourseid").value,true);
xmlhttp.send();
}
function loadSubject(){
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
            document.getElementById("etutorial_id").innerHTML=xmlhttp.responseText;
    }
};

xmlhttp.open("GET","query/load/question/question_load_tutorial.php?esubjectid="+document.getElementById("esubject_id").value,true);
xmlhttp.send();
}
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

xmlhttp.open("GET","query/load/question/question_load_details.php?question_id="+str,true);
xmlhttp.send();
}
//End Open Modal Edit Details

// Start Save Edit Data
function saveEdit(){
        var form = document.getElementById("eform1");
    var data = new FormData(form);
if(document.getElementById("ecourseid").value=="")
        {
               alert("Please Choose  Course Name");
               return false;
        }
    if(document.getElementById("esubject_id").value=="")
        {
               alert("Please Choose subject Name");
               return false;
        }
    if(document.getElementById("etutorial_id").value=="")
        {
               alert("Please Choose Subtitle Name");
               return false;
        }
    if(document.getElementById("equestion_title").value=="")
        {
               alert("Please type Question Title");
               return false;
        }
    if(document.getElementById("ecorrect_answer").value=="")
        {
               alert("Please type Correct Answer");
               return false;
        }
    if(document.getElementById("eqa1").value=="")
        {
               alert("Please type Question A ");
               return false;
        }
    if(document.getElementById("eqa2").value=="")
        {
               alert("Please type Question B");
               return false;
        }
     if(document.getElementById("eqa3").value=="")
        {
               alert("Please type Question C");
               return false;
        }

     if(document.getElementById("eqa4").value=="")
        {
               alert("Please type Question D");
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
    xmlhttp.open("POST","query/edit/question/question_edit.php?subject_id="+document.getElementById("esubject_id").value+
                 "&equestion_id="+document.getElementById("equestion_id").value+
                 "&esubject_id="+document.getElementById("esubject_id").value+
                 "&etutorial_id="+document.getElementById("etutorial_id").value+
                 "&eqa_id="+document.getElementById("eqa_id").value+
                 "&equestion_title="+document.getElementById("equestion_title").value+
                 "&ecorrect_answer="+document.getElementById("ecorrect_answer").value+
                 "&eqa1="+document.getElementById("eqa1").value+
                 "&eqa2="+document.getElementById("eqa2").value+
                 "&eqa3="+document.getElementById("eqa3").value+
                 "&eqa4="+document.getElementById("eqa4").value,true);
    xmlhttp.send(data);
 }
// End Save Edit Data
    
    
// Open modal start
function addData(){
    $('#addmodal').modal('show');   
}
// End modal start
    
function saveAdd(){
    var form = document.getElementById("form1");
    var data = new FormData(form);
   if(document.getElementById("course_name").value=="")
        {
               alert("Please Choose  Course Name");
               return false;
        }
    if(document.getElementById("subject_id").value=="")
        {
               alert("Please Choose subject Name");
               return false;
        }
    if(document.getElementById("tutorial_id").value=="")
        {
               alert("Please Choose Subtitle Name");
               return false;
        }
    if(document.getElementById("question_title").value=="")
        {
               alert("Please type Question Title");
               return false;
        }
    if(document.getElementById("correct_answer").value=="")
        {
               alert("Please type Correct Answer");
               return false;
        }
    if(document.getElementById("qa1").value=="")
        {
               alert("Please type Question A ");
               return false;
        }
    if(document.getElementById("qa2").value=="")
        {
               alert("Please type Question B");
               return false;
        }
     if(document.getElementById("qa3").value=="")
        {
               alert("Please type Question C");
               return false;
        }

     if(document.getElementById("qa4").value=="")
        {
               alert("Please type Question D");
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
          if(xmlhttp.responseText=="wrongimage"){
               alert("Please Input jpg.file/png.file/jpeg.file");
           }
    else{
             var ok = confirm("Are you sure want to continue this record?");
      if(ok){
            alert("Insert Success");
            $('#addmodal').modal('hide');
            document.getElementById("question_title").value=""
            document.getElementById("correct_answer").value="";
            document.getElementById("qa1").value=""
            document.getElementById("qa2").value=""
            document.getElementById("qa3").value=""
            document.getElementById("qa4").value=""
           document.getElementById("file").value ="";   
             document.getElementById("profile_pic").src ="";  
            refresh_table();
      }
        else{
            alert("Insert Success");
            $('#addmodal').modal('hide');
            document.getElementById("course_name").value="";
            document.getElementById("subject_id").value=""
            document.getElementById("tutorial_id").value=""
            document.getElementById("question_title").value=""
            document.getElementById("correct_answer").value="";
            document.getElementById("qa1").value=""
            document.getElementById("qa2").value=""
            document.getElementById("qa3").value=""
            document.getElementById("qa4").value=""
             document.getElementById("file").value ="";   
             document.getElementById("profile_pic").src ="";  
            refresh_table();
        }

    }
    }
};
xmlhttp.open("POST","query/insert/question/question_insert.php?subject_id="+document.getElementById("subject_id").value+
             "&question_title="+document.getElementById("question_title").value+
             "&tutorial_id="+document.getElementById("tutorial_id").value+
             "&correct_answer="+document.getElementById("correct_answer").value+
             "&qa1="+document.getElementById("qa1").value+
             "&qa2="+document.getElementById("qa2").value+
             "&qa3="+document.getElementById("qa3").value+
             "&qa4="+document.getElementById("qa4").value,true);
xmlhttp.send(data);
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
            alert("Delete Sucess");
                    $('#myTable').DataTable().ajax.reload();

        }
    };
    xmlhttp.open("GET","query/delete/question/question_delete.php?question_id="+$str,true);
    xmlhttp.send();
    }
}
//End Delete Data
function refresh_table(){ 
      $('#myTable').DataTable().ajax.reload();
}
    
function readURL(input){
    if(input.files && input.files[0]){
          var reader=new FileReader();
          
          reader.onload=function(e){
              $('#profile_pic').attr('src',e.target.result);
              
          }
          reader.readAsDataURL(input.files[0]);
      }
  }
  
  $("#file").change(function(){
      readURL(this);
      
  }); 
</script>
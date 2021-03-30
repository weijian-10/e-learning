<?php 
include("headerlink.php");
?>

<style>

@import url('css/font.css');
html,body{
background-image: url('image/loginwall.jpg');
background-size: cover;
background-repeat: no-repeat;
height: 100%;
font-family: 'Numans', sans-serif;
}

.container{
height: 100%;
align-content: center;
}

.card{
height: 370px;
margin-top: auto;
margin-bottom: auto;
width: 400px;
background-color: rgba(0,0,0,0.5) !important;
}

.social_icon span{
font-size: 60px;
margin-left: 10px;
color: #FFC312;
}

.social_icon span:hover{
color: white;
cursor: pointer;
}

.card-header h3{
color: white;
}

.social_icon{
position: absolute;
right: 20px;
top: -45px;
}

.input-group-prepend span{
width: 50px;
background-color: #FFC312;
color: black;
border:0 !important;
}

input:focus{
outline: 0 0 0 0  !important;
box-shadow: 0 0 0 0 !important;

}

.remember{
color: white;
}

.remember input
{
width: 20px;
height: 20px;
margin-left: 15px;
margin-right: 5px;
}

.login_btn{
color: black;
background-color: #FFC312;
width: 100px;
}

.login_btn:hover{
color: black;
background-color: white;
}

.links{
color: white;
}

.links a{
margin-left: 4px;
}   
</style>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign In</h3>
				
			</div>
			<div class="card-body">
				<form>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-user"></i></span>
						</div>
						<input type="text" class="form-control"  id="username" name="username" placeholder="username">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-key"></i></span>
						</div>
						<input type="password" class="form-control" id="password" name="password" placeholder="password">
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox" onclick="showpass()" >Show password
					</div>
					<div class="form-group">
                      <button class="btn float-right login_btn" type="button" onclick="adminLogin()">Login</button>

					</div>
				</form>
			</div>
			
		</div>
	</div>
</div>
</body>

<script>
	function showpass(){
		var x = document.getElementById("password");
		if(x.type === "password"){
			x.type = "text";
		}else{
			x.type = "password";
		}
	}
	
	function adminLogin(){
           if(document.getElementById("username").value==""){
               alert("please type username");
               return false;
           }
         if(document.getElementById("password").value==""){
               alert("please type password");
               return false;
           }
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				if(xmlhttp.responseText==1){
					alert("Login success"); 
					window.location.href="dashboard.php";
				}
               else if(xmlhttp.responseText==2){
					alert("Login success"); 
					window.location.href="teacher.php";
				}else {
					alert("Please type your username or password correctly");
				}
//				$('#loginmodal').modal('hide');
//				document.getElementById("username").value ="";   
//				document.getElementById("password").value ="";
			}
		};
		xmlhttp.open("GET","query/login_admin_query.php?admin_username="+document.getElementById("username").value + "&admin_pass="+document.getElementById("password").value,true);
		xmlhttp.send();
	}
</script>
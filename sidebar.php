<?php
include("headerlink.php");
include("db.php");
session_start();
?>
<style>
.c-header-icon i{
      font-size:25px;
    }
.header-icons-group{
        border:none;
    }
    .c-header-icon i {
  color:black;
}
.c-header-icon:hover i {
  color:black;
}
 .l-sidebar .logo .logo__txt{
    font-size:20px;
}
 
 tr, th ,td{
        text-align: center;
    }

</style>
<?php
if(isset($_SESSION["teacher_id"])){
  $teacher_id = " where teacher_id='".$_SESSION["teacher_id"]."'";
}
else {
  $teacher_id="";
}
echo $query66="SELECT * FROM `teacher` INNER JOIN course on teacher.course_id=course.course_id" .$teacher_id;
$result66=mysqli_query($con,$query66);
$row66=mysqli_fetch_array($result66);
if(isset($_SESSION["admin_id"])){
    $perm="Admin";
    $admin='<a href="admin.php" class="admin"> <li class="c-menu__item has-submenu" data-toggle="tooltip" title="Admin">
            <div class="c-menu__item__inner"><i class="fa fa-font"></i>
              <div class="c-menu-item__title"><span class="admintext">Admin</span></div>
            </div>
          </li></a>';
    $dashboard=' <a href="dashboard.php" class="dashboard"> <li class="c-menu__item has-submenu" data-toggle="tooltip" title="Dashboard">   
            <div class="c-menu__item__inner"><i class="fa fa-pie-chart"></i>
              <div class="c-menu-item__title"><span>Dashboard</span></div>
            </div>  
          </li></a>';
  
}
elseif(isset($_SESSION["teacher_id"])){
    $perm="Teacher ".$row66["course_name"]." ";
    $admin="";
    $dashboard="";
    
}
?>
<div class="sidebar-is-reduced">
  <header class="l-header">
    <div class="l-header__inner clearfix">
      <div class="c-header-icon js-hamburger">
        <div class="hamburger-toggle">
            <span class="bar-top"></span><span class="bar-mid"></span><span class="bar-bot"></span></div>
      </div>
        
        <div style="margin-left:600px"><h2><?php echo $perm; ?></h2></div>
      <div class="header-icons-group">
        <div class="c-header-icon logout">
<!--           <div style="margin-right:17px;"><a onclick="deleteAll()"><i class="fa fa-trash-o"></i></a></div>-->
           <div class="Divadd" style="margin-right:17px" ><a onclick="addData()"><i class= "fa fa-plus"></i></a></div>
            <div style="margin-right:57px"><a onclick="logoutConfirm();return false" ><i class="fa fa-power-off"></i></a></div>
           
         </div>
      </div>

    </div>
  </header>
  <div class="l-sidebar">
    <div class="logo">
      <div class="logo__txt"><span class="a"><?php echo $_SESSION["username"]; ?></span></div>
    </div>
    <div class="l-sidebar__content">
      <nav class="c-menu js-menu">
        <ul class="u-list">
<!--
         <a href="admin.php" class="admin"> <li class="c-menu__item has-submenu" data-toggle="tooltip" title="Admin">
            <div class="c-menu__item__inner"><i class="fa fa-font"></i>
              <div class="c-menu-item__title"><span class="admintext">Admin</span></div>
            </div>
          </li></a>
-->
             <?php 
             echo $dashboard; 
             ?>
             <?php echo $admin; ?>
              
             <a href="teacher.php" class="teacher"> <li class="c-menu__item has-submenu" data-toggle="tooltip" title="Teacher">
            <div class="c-menu__item__inner"><i class="fa fa-tumblr"></i>
              <div class="c-menu-item__title"><span class="admintext">Teacher</span></div>
            </div>
          </li></a>
             <a href="user.php" class="user"> <li class="c-menu__item has-submenu" data-toggle="tooltip" title="User">
            <div class="c-menu__item__inner"><i class="fa fa-user"></i>
              <div class="c-menu-item__title"><span class="admintext">User</span></div>
            </div>
          </li></a>
            <a href="course.php" class="course"> <li class="c-menu__item has-submenu" data-toggle="tooltip" title="course">
            <div class="c-menu__item__inner"><i class="fa fa-language"></i>
              <div class="c-menu-item__title"><span class="admintext">Course</span></div>
            </div>
          </li></a> 
                  <a href="subject.php" class="subject"> <li class="c-menu__item has-submenu" data-toggle="tooltip" title="Subject">
            <div class="c-menu__item__inner"><i class="fa fa-book"></i>
              <div class="c-menu-item__title"><span>Subject</span></div>
            </div>
          </li></a>
            <a href="tutorial.php" class="tutorial"> <li class="c-menu__item has-submenu" data-toggle="tooltip" title="Subtitle">
            <div class="c-menu__item__inner"><i class="fa fa-sticky-note-o"></i>
              <div class="c-menu-item__title"><span>Subtitle</span></div>
            </div>
          </li></a>
          
            <a href="Question.php" class="question"> <li class="c-menu__item has-submenu" data-toggle="tooltip" title="Question">
            <div class="c-menu__item__inner"><i class="fa fa-quora"></i>
              <div class="c-menu-item__title"><span>Question</span></div>
            </div>
          </li></a>
            <a href="history.php" class="history"> <li class="c-menu__item has-submenu" data-toggle="tooltip" title="History">
            <div class="c-menu__item__inner"><i class="fa fa-history"></i>
              <div class="c-menu-item__title"><span>History</span></div>
            </div>
          </li></a>

        </ul>
      </nav>
    </div>
  </div>
       
    </div>
<script>
function logoutConfirm(){
    var conf = confirm('Are you sure want to logout?');
   if(conf)
      window.location.href="logout.php";
}
var Dashboard = function () {
	var global = {
		tooltipOptions: {
			placement: "right"
		},
		menuClass: ".c-menu"
	};

	var menuChangeActive = function menuChangeActive(el) {
		var hasSubmenu = $(el).hasClass("has-submenu");
		$(global.menuClass + " .is-active").addClass("is-active");
		$(el).addClass("is-active");

		// if (hasSubmenu) {
		// 	$(el).find("ul").slideDown();
		// }
	};

	var sidebarChangeWidth = function sidebarChangeWidth() {
		var $menuItemsTitle = $("li .menu-item__title");

		$("body").toggleClass("sidebar-is-reduced sidebar-is-expanded");
		$(".hamburger-toggle").toggleClass("is-opened");

		if ($("body").hasClass("sidebar-is-expanded")) {
			$('[data-toggle="tooltip"]').tooltip("destroy");
		} else {
			$('[data-toggle="tooltip"]').tooltip(global.tooltipOptions);
		}
	};

	return {
		init: function init() {
			$(".js-hamburger").on("click", sidebarChangeWidth);

			$(".js-menu li").on("click", function (e) {
				menuChangeActive(e.currentTarget);
			});

			$('[data-toggle="tooltip"]').tooltip(global.tooltipOptions);
		}
	};
}();

Dashboard.init();
//# sourceURL=pen.js
</script>
<?php 
		
		include("includes/header.php");
		include("../conn.php");
		include("includes/sidebar.php"); 
		
		

?>
<div class="content-main">
<div class="container-fluid">
<div class="row"><div class="col-sm-12 col-md-12">
<h3>Dashboard</h3><hr /><p>Hello <b>admin</b>, Welcome to <b>CBQS Admin Panel.</b>
 You can use this interface to manage the rest of your account.</p><hr /><div class="row dashboard-stats">
  <div class="col-lg-4 col-sm-6"><section class="panel panel-box"><div class="panel-left panel-item dash-st-1"><i class="fa fa-rocket text-large stat-icon">
  </i></div><div class="panel-right panel-item bg-reverse"><p class="size-h1 no-margin"><?php 
																							$res = mysqli_query($conn,"SELECT * FROM subjects");
																							$n_r = mysqli_num_rows($res);																						
																							echo "$n_r"; 
																							?>
																						</p><p class="text-muted no-margin"><span>Offered Courses</span></p>
  </div></section></div><div class="col-lg-4 col-sm-6"><section class="panel panel-box"><div class="panel-left panel-item dash-st-2">
  <i class="fa fa-users text-large stat-icon"></i></div><div class="panel-right panel-item bg-reverse"><p class="size-h1 no-margin"><?php 
																							$reslt = mysqli_query($conn,"SELECT * FROM students");
																							$n_row = mysqli_num_rows($reslt);
  echo "$n_row"; ?></p>
  <p class="text-muted no-margin"><span>Active Students</span></p></div></section></div><div class="col-lg-4 col-sm-6"><section class="panel panel-box">
  <div class="panel-left panel-item dash-st-3"><i class="fa fa-graduation-cap text-large stat-icon"></i></div><div class="panel-right panel-item bg-reverse">
  <p class="size-h1 no-margin"><?php
										$result = mysqli_query($conn,"SELECT * FROM exams");
										$num_rows = mysqli_num_rows($result); 
										echo "$num_rows"; ?>
										</p><p class="text-muted no-margin"><span>Published Exams</span></p></div></section></div></div><hr />
  
  <div class="row">
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"><div class="header-panel-dashboard color-1"><div class="pannel-box"><a href="#"><h2>Users</h2>
  </a><div class="info-holder">
  <a class="info-ico" data-placement="left" data-toggle="tooltip" data-original-title="This is the area where you can manage the users section where you can see the list of users, creation of new user etc." href="#">
  <i class="fa fa-info-circle"></i></a></div></div>
  <ul class="panel-box-Menu"><li><a href="users.php">Users List</a></li>
  <li>  <a href="new_user.php">New User</a></li>
  </ul></div>
  </div><div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"><div class="header-panel-dashboard color-2"><div class="pannel-box"><a href="#"><h2>Questions</h2>
  </a><div class="info-holder">
  <a class="info-ico" data-placement="left" data-toggle="tooltip" data-original-title="This is the area where you can manage the Questions." href="#">
  <i class="fa fa-info-circle"></i></a></div></div>
  <ul class="panel-box-Menu">
  <li><a href="questions.php">Questions List</a></li>
  <li class="subnav-dash"><a href="subjects.php">Question Bank</a></li>
  
  </ul></div></div><div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
  <div class="header-panel-dashboard color-3"><div class="pannel-box"><a href="#"><h2>Courses</h2></a><div class="info-holder">
  <a class="info-ico" data-placement="left" data-toggle="tooltip" data-original-title="This is the area where you can manage the Courses." href="#">
  <i class="fa fa-info-circle"></i></a></div></div><ul class="panel-box-Menu"><li><a href="courses.php">Course List</a></li>
  <li><a href="new_course.php">New Course</a></li>
  
  </ul></div></div>
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"><div class="header-panel-dashboard color-4"><div class="pannel-box"><a href="#">
  <h2>Reports</h2></a><div class="info-holder">
  <a class="info-ico" data-placement="left" data-toggle="tooltip" data-original-title="This is the area where you can manage Reports." href="#">
  <i class="fa fa-info-circle"></i></a></div></div><ul class="panel-box-Menu"><li><a href="result.php">Exam Report</a></li><li>
  <a href="result.php">Student Report</a></li></ul></div></div>
  
  </div>
  
  </div></div></div></div></div>
<?php include("includes/footer.php"); ?>
  </div>
  </body>
  </html>
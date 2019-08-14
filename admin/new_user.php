<?php 
		include("includes/header.php");
		include("includes/sidebar.php"); 
		include("../conn.php");
		$query = "SELECT * FROM subjects"; //You don't need a ; like you do in SQL
		$result = mysqli_query($conn,$query);
		$sql = "SELECT * FROM classes"; //You don't need a ; like you do in SQL
		$reslt = mysqli_query($conn,$sql);
		
		if(isset($_POST['SubmitButton'])){ //check if form was submitted	
		if($_POST['role']=="student"){
		$sql = "INSERT INTO students (name, regno, pass, course) VALUES ('$_POST[full_name]', '$_POST[regno]', '$_POST[password]', '$_POST[courses]')";
		mysqli_query($conn, $sql);
		$values = $_POST['subjects'];
		foreach ($values as $names)
		{
        $sql = "INSERT INTO ssubject (student, subject) VALUES ('$_POST[regno]', '$names')";
		 mysqli_query($conn, $sql);
		}		
		}
		if($_POST['role']!="student"){
			$sql = "INSERT INTO user (name, regno, pass, role) VALUES ('$_POST[full_name]', '$_POST[regno]', '$_POST[password]', '$_POST[role]')";
			mysqli_query($conn, $sql);
		 
		 
		}
		echo '<script>window.location.href="users.php";</script>';
		}  		
		
		
?>
<div class="content-main"><div class="container-fluid"><div class="row"><div class="col-sm-12 col-md-12">
<h3>New User</h3>
<p>You can create a user by filling the fields in form below.</p><hr />
<div class="row q-data"><div class="col-sm-12 col-md-12 col-lg-12">
<div class="portlet-body"><div class="row"><div class="col-sm-12 col-md-12 col-lg-12">
<form class="form-horizontal" id="new_user"  action="new_user.php" accept-charset="UTF-8" method="post">
<div class="form-body">
<div class="form-group">
<label class="col-sm-3 control-label" for="user_full_name">Full Name</label>
<div class="col-sm-6">
<input placeholder="Full Name" class="form-control" required="required" maxlength="30" size="50" type="text" name="full_name" id="user_full_name" />
<div class="help-block with-errors"></div>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label" for="user_username">Registration No.</label>
<div class="col-sm-6">
<input placeholder="Registration No." class="form-control" required="required" maxlength="30" size="50" type="text"name="regno" id="user_username" />
<div class="help-block with-errors"></div>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label" for="user_email">Password</label>
<div class="col-sm-6">
<input placeholder="Password" class="form-control" required="required" type="password" name="password" id="user_password" />
<div class="help-block with-errors"></div>
</div>
</div>
<div class="form-group course-update">
<label class="col-sm-3 control-label" for="user_role">Role</label>
<div class="col-sm-6">
<select required="required" class="form-control" name="role" onchange="getval(this);">
<option  value="student">Student</option>
<option value="teacher">Teacher</option>
<option value="admin">Admin</option>
</select>
<script>
function getval(sel)
{
    if(sel.value!="student") {
		document.getElementById("abc1").style.display = 'none';
		document.getElementById("abc2").style.display = 'none';
}
if(sel.value=="student")
{
document.getElementById("abc1").style.display = '';
		document.getElementById("abc2").style.display = '';	
}
	}
</script>
<div class="help-block with-errors"></div>
</div>
</div>
<div class="form-group course-update-remove" id="abc1">
<label class="col-sm-3 control-label">Courses</label>
<div class="col-sm-6">
<select name="courses" id="user_batch_course_ids_" class=" form-control" style="overflow:hidden" required >
<?php
					while($row = mysqli_fetch_array($reslt)){   //Creates a loop to loop through results
							echo "<option value=" . $row['class'] . ">" . $row['class'] . "</option>"; 
						}
				?>
</select>
</div>
</div>
<div class="form-group course-update-remove" id="abc2">
<label class="col-sm-3 control-label">Subjects</label>
<div class="col-sm-6">
    <link href="assets/css/jquery.css" rel="stylesheet" type="text/css">
<select name="subjects[]" class=" form-control" multiple="multiple" class="4colactive">
       <?php
					while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
							echo "<option value=" . $row['subject'] .">" . $row['subject'] . "</option>"; 
						}
				?>
    </select>
<script src="assets/js/jquery.js"></script>
<script>
$('select[multiple]').multiselect({
    columns: 3,
    placeholder: 'Select options'
});
</script>
</div>
</div>
</div>
<hr />
<div class="row">
<div class="col-md-9">
<div class="btn-row">
<input type="submit" name="SubmitButton"  class="btn green vx-cust-btn btn-rgt" />
<a class="btn default vx-cust-btn" href="/en/admin/users">Back</a><br><br>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php include("includes/footer.php"); ?>
</div>
</body>
</html>
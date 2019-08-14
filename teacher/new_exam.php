<?php 
		include("includes/header.php");
		include("includes/sidebar.php"); 
		include("../conn.php");
		$id=$_SESSION['id'];
		$query = "SELECT * FROM subjects"; //You don't need a ; like you do in SQL
		$result = mysqli_query($conn,$query);
		$query = "SELECT * FROM classes"; //You don't need a ; like you do in SQL
		$reslt = mysqli_query($conn,$query);
		if(isset($_POST['SubmitButton'])){
		$name=$_POST['name'];
		$subject=$_POST['subject'];
		$clas=$_POST['clas'];
		$time=$_POST['time'];
		//echo '<script>alert("'.$time.'")</script>';
		$ins=$_POST['instruction'];
		$sql = "INSERT INTO exams (tid, name, subject, class,ttime, ins) VALUES ('$id','$name', '$subject', '$clas','$time', '$ins')";
		mysqli_query($conn, $sql);
		echo '<script>window.location.href="assign_question.php";</script>';
		}	
		
?>
<div class="content-main" >
<div class="container-fluid">
<div class="row">
<div class="col-sm-12 col-md-12">
<h3>New Exam</h3><p>Exam creation are in three steps, in which assign students and  questions  are in different steps.</p><hr />
<div class="row q-data"><div class="col-sm-12 col-md-12 col-lg-9"><div class="portlet-body"><div class="row">
<div class="col-sm-12 col-md-12 col-lg-12"><div class="row"><div class="col-md-6 text-right"></div></div>
<div class="form-body">
<div class="step-nav">

<form class="form-horizontal" id="new_exam"  action="" accept-charset="UTF-8" method="post">
<ul class="nav nav-wizard nav-wizard-backnav">
<li class="active"><a href="#">Create Exam</a></li>
<li class="not-active"><a href="#">Assign Questions</a></li>
</ul><div class="tab-content" id="myTabContent"><div class="tab-pane fade active in" id="step1">
<div class="form-body"><br />
<div class="form-group">
<label class="col-md-3 control-label">Name <span class="mandatory-fld">*</span></label>
<div class="col-md-3">
<input class="form-control" placeholder="Name" required="required" maxlength="50" size="50" type="text" name="name" id="exam_name" /></div>

<label class="col-md-2 control-label">Time <span class="mandatory-fld">*</span></label>
<div class="col-md-3">
<select name="time" id=""  required  class="chosen-select form-control" >
<option disabled selected value="">- Select Subject -</option>
<option value="10">10 Mint</option>
<option value="20">20 Mint</option>
<option value="30">30 Mint</option>
</select>
</div>

</div><br>
<div class="form-group">
<label class="col-md-3 control-label">Subject <span class="mandatory-fld">*</span></label>
<div class="col-md-3">
<input name="exam[batch_course_ids][]" type="hidden" value="" />
<select name="subject" id="exam_batch_course_ids_"  required  class="chosen-select form-control" >
<option disabled selected value="">- Select Subject -</option>
<?php
					while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
							echo "<option value=" . $row['subject'] .">" . $row['subject'] . "</option>"; 
						}
?>
</select>
</div>
<label class="col-md-2 control-label">Course <span class="mandatory-fld">*</span></label>
<div class="col-md-3"><input name="exam[batch_course_ids][]" type="hidden" value="" />
<select name="clas" id="exam_batch_course_ids_"  required  class="chosen-select form-control" >
<option disabled selected value="">- Select Course -</option>
<?php
					while($row = mysqli_fetch_array($reslt)){   //Creates a loop to loop through results
							echo "<option value=" . $row['class'] .">" . $row['class'] . "</option>"; 
						}
?>
</select></div></div><br>
<div class="form-group"><label class="col-md-3 control-label">Instructions <span class="mandatory-fld">*</span></label>
<div class="col-md-8">
<textarea class="form-control exam-instruction" required id="instructions" rows="2" cols="" max="50" min="10" placeholder="Instructions" name="instruction">
</textarea></div>
</div><br>
<div class="row"><div class="col-md-12"><div class="btn-row">
<input  type="submit" value="Next" name="SubmitButton" class="btn green  vx-cust-btn btn-rgt"  ></div>
<a class="btn default vx-cust-btn" href="exams.php">Back</a>
</div>
</div>
</div></div></div></div></form></div></div></div></div></div>


</div>


</div></div></div>
</div>




</div>


</div>

<?php include("includes/footer.php"); ?>
</div>

</body></html>
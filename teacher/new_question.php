<?php 
		include("includes/header.php");
		include("includes/sidebar.php"); 
		include("../conn.php");
		$query = "SELECT * FROM subjects"; //You don't need a ; like you do in SQL
		$result = mysqli_query($conn,$query);
  		if(isset($_POST['SubmitButton'])){ 
		$sql = "INSERT INTO questions (subject, marks, question, opt1, opt2, opt3, opt4, ans, hint) VALUES ('$_POST[subject]', '$_POST[marks]', '$_POST[question]', '$_POST[opt1]', '$_POST[opt2]', '$_POST[opt3]', '$_POST[opt4]', '$_POST[ans]', '$_POST[hint]')";
		mysqli_query($conn, $sql);
		echo '<script>window.location.href="questions.php";</script>';
		}	
?>
<div class="content-main">
<div class="container-fluid">
<div class="row">
<div class="col-sm-12 col-md-12">
<h3>New Question</h3>
<p>This form helps you to create a question and find it easily from a pool name as a subject name.</p><hr />
<div class="row q-data">
<div class="col-sm-12 col-md-12">
<div class="portlet-body">
<form class="form-horizontal" id="new_question"  action="" accept-charset="UTF-8" method="post">
<div class="row">
<div class="col-md-12">
<div class="row">
<div class="col-md-5">
<div class="form-group">
<div class="col-md-5">
<label class="name-tag control-label" >Subjects</label></div>
<div class="col-md-6">
<select class="form-control" required name="subject" >
<option disabled selected value="">- Select -</option>
<?php
					while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
							echo "<option value=" . $row['subject'] .">" . $row['subject'] . "</option>"; 
						}
				?>
</select>
</div></div></div>
<div class="col-md-5">
<div class="form-group">
<div class="col-md-2">
<label class="name-tag control-label" for="question_mark">Marks</label>
</div>
<div class="col-md-8">
<input placeholder="Mark" class="form-control small text-wide-150" required="required" step="1" min="1" max="5" type="number" name="marks" id="question_mark" />
</div></div><br />
</div></div></div></div>
<div class="row">
<div class="col-md-2">
<label class="name-tag" for="question_question_languages_attributes_0_description">Description</label>
<a data-target="#editor-help-modal" data-toggle="modal" class="q-type-icon" href="#">
<i class="fa fa-exclamation-circle blue fa-1x" data-placement="right" data-toggle="tooltip" data-original-title="Question Here"></i></a>
</div>
<div class="col-md-9">
<textarea rows="10" cols="80" class="form-control" id="question-description" name="question">
</textarea>
</div>
</div>
<br />
<div class="row">
<div class="col-md-12">
<div class="row">
<div class="col-md-2">
<label class="name-tag control-label" for="question_exam_mode_id">Answer Options</label></div>
<div class="col-md-5">
<div class="form-group">
<div class="col-md-9">
<textarea placeholder="Answer Option 1" cols="40" class="form-control ckbasic ans-fill" required="required" name="opt1" >
</textarea>
</div></div>
</div>
<div class="col-md-5">
<div class="form-group ">
<div class="col-md-9">
<textarea placeholder="Answer Option 2" cols="40" class="form-control ckbasic ans-fill" required="required" name="opt2" >
</textarea></div></div><br />
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-5">
<div class="form-group">
<div class="col-md-9">
<textarea placeholder="Answer Option 3" cols="40" class="form-control ckbasic ans-fill" required="required" name="opt3" >
</textarea>
</div></div>
</div>
<div class="col-md-5">
<div class="form-group ">
<div class="col-md-9">
<textarea placeholder="Answer Option 4" cols="40" class="form-control ckbasic ans-fill" required="required" name="opt4">
</textarea></div></div><br />
</div>
</div>
<br />
<div class="row">
<div class="col-md-2">
<label class="name-tag">Correct Answer</label>
</div><div class="col-md-8">
<textarea placeholder="ans" rows="3" class="form-control" name="ans">
</textarea>
</div>
</div>
<br />
<div class="row">
<div class="col-md-2">
<label class="name-tag">Hint</label>
</div><div class="col-md-8">
<textarea placeholder="Hint" rows="3" class="form-control" name="hint">
</textarea>
</div>
</div>
<br />
<div class="row">
<div class="col-md-10">
<div class="btn-row">
<input type="submit" name="SubmitButton" value="Create" class="btn green question-submit-btn vx-cust-btn btn-rgt" data-disable-with="Create" />
<a class="btn default vx-cust-btn" href="questions.php">Back</a>
</div></div></div><br/><br/>
</form></div></div></div></div></div></div></div></div>

<?php include("includes/footer.php"); ?>

</div></body></html>
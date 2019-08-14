<?php include("includes/header.php"); 
		include("includes/sidebar.php"); 
		$sid=$_SESSION['idhotel'];
		$show=0;
		include("../conn.php");
		if(isset($_POST['SubmitButton'])){
			$show=1;
		$class=$_POST['clas'];
		$subj=$_POST['subj'];
		$std=$_POST['std'];
		$query = "SELECT * FROM results WHERE class='$class' OR subject='$subj' OR sid='$std'"; //You don't need a ; like you do in SQL
		$result = mysqli_query($conn,$query);
		}
		$query = "SELECT * FROM classes"; 
		$reslt = mysqli_query($conn,$query);
		
		$qry = "SELECT * FROM subjects"; 
		$res = mysqli_query($conn,$qry);
		
		$q = "SELECT * FROM students"; 
		$re = mysqli_query($conn,$q);
		
		?>
<div class="content-main"><div class="container-fluid"><div class="row"><div class="col-sm-12 col-md-12">
<h3>Exam Results</h3><hr/>
<form class="form-horizontal" id="new_exam"  action="" accept-charset="UTF-8" method="post">
<div class="col-md-3">
<select name="clas" id="exam_batch_course_ids_"   class="chosen-select form-control" >
<option selected value="">- Select Course -</option>
<?php
					while($row = mysqli_fetch_array($reslt)){   //Creates a loop to loop through results
							echo "<option value=" . $row['class'] .">" . $row['class'] . "</option>"; 
						}
?>
</select></div>
<div class="col-md-3">
<select name="subj" id="exam_batch_subj_ids_"   class="chosen-select form-control" >
<option  selected value="0">- Select Subject -</option>
<?php
					while($r = mysqli_fetch_array($res)){   //Creates a loop to loop through results
							echo "<option value=" . $r['subject'] .">" . $r['subject'] . "</option>"; 
						}
?>
</select></div>
<div class="col-md-3">
<select name="std" id="exam_batch_std_ids_"   class="chosen-select form-control" >
<option  selected value="0">- Select Student -</option>
<?php
					while($r = mysqli_fetch_array($re)){   //Creates a loop to loop through results
							echo "<option value=" . $r['name'] .">" . $r['name'] . "</option>"; 
						}
?>
</select></div>
<div class="row">
<div class="col-md-12"><div class="btn-row">
<input  type="submit" value="Next" name="SubmitButton" class="btn green  vx-cust-btn btn-rgt"  ></div>
</div>
</div>
</form>
<div class="row q-data"><div class="col-sm-12 col-md-12 col-lg-12"><div class="portlet-body">
<div class="row"><div class="col-sm-12 col-md-12 col-lg-12">
<div class="row">
<div class="col-md-12">
<div class="table-responsive"><table class="table table-hover sortable"><thead><tr><th>Student ID</th><th>Exam Name</th><th>Subject</th>
<th>Marks</th><th>Percentage</th><th>Status</th></tr></thead>
<tbody>
<?php               if($show==1)
					while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
							echo "<tr><td>" . $row['sid'] . "</td>
							<td>" . $row['tname'] . "</td><td>" . $row['subject'] . "</td><td>" . $row['marks'] . "</td>
							<td>" . $row['per'] . "</td><td>" . $row['status'] . "</td></tr>";
						}
				?>
</tbody></table></div>
<div class="text-right"></div></div></div></div></div></div></div></div></div></div></div></div></div>

<?php include("includes/footer.php"); ?>
</div>
</body></html>
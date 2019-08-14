<?php 
		include("includes/header.php");
		include("includes/sidebar.php"); 
		include("../conn.php");
		$id=$_GET["q"];
		$result = mysqli_query($conn,"SELECT  id,name,subject,class,ins FROM exams WHERE id=$id;");
		$row = mysqli_fetch_row($result);
		$eid=$row[0];	
		$subject=$row[2];
		$name=$row[1];
		$class=$row[3];
		$ins=$row[4];
		$query = "SELECT * FROM squestions WHERE eid='$eid'"; 
		$reslt = mysqli_query($conn,$query);
		$mark=0;
			$query = "SELECT * FROM squestions WHERE eid='$eid'"; 
		   $rest = mysqli_query($conn,$query);
		   while($r = mysqli_fetch_array($rest)){   //Creates a loop to loop through results
					       $id=$r['qid'];
							$rslt = mysqli_query($conn,"SELECT  marks FROM questions WHERE id=$id;");
							$rows = mysqli_fetch_row($rslt);	
							$mark=$mark+(int)$rows[0];
							
						}	
?>
<div class="content-main"><div class="container-fluid"><div class="row"><div class="col-sm-12 col-md-12">
<h3 class="text-break">Preview Exam</h3><hr />
<p>Here you can see the basic details of an exam, including questions, students details.</p>
<div class="row q-data"><div class="col-sm-12 col-md-12 col-lg-12"><div class="portlet-body">
<div class="row"><div class="col-sm-12 col-md-12 col-lg-12"><div class="row"><div class="col-md-12">
<ul class="nav nav-tabs nav-justified vx-tab-accordion" id="preview">
<li class="active"><a data-toggle="tab" href="#overview">Overview</a></li>
<li><a data-toggle="tab" href="#questions">Questions</a></li>
<div class="tab-content tab-content-cust">
<div class="tab-pane fade in active overview-styles" id="overview">
<div class="row overview-mob"><div class="col-sm-6">
<div class="row"><div class="col-xs-6 font-bold">Name :</div><div class="col-xs-6"><?php echo $name; ?></div></div>
<div class="row"><div class="col-xs-6 font-bold">Duration :</div><div class="col-xs-6">00:10:00</div></div>
<div class="row"><div class="col-xs-6 font-bold">Total mark :</div><div class="col-xs-6"><?php echo $mark;
																								
																							?>
 </div></div>
<div class="row"><div class="col-xs-6 font-bold">Batch Courses :</div><div class="col-xs-6"><?php echo $class; ?><br /></div></div>
</div>
<div class="col-sm-6">
<div class="row"><div class="col-xs-6 font-bold">Code :</div><div class="col-xs-6"><?php echo $eid; ?></div></div>
<div class="row"><div class="col-xs-6 font-bold">Subject :</div><div class="col-xs-6"><?php echo $subject; ?></div></div>
<div class="row"><div class="col-xs-6 font-bold">Percentage :</div><div class="col-xs-6">50%</div></div>
</div>
</div>
<div class="row"><div class="col-xs-3 font-bold">Instructions :</div>
<div class="col-xs-9"><p><?php echo $ins; ?></p></div>

</div>
</div>
<div class="tab-pane fade" id="questions">
<div class="row"><div class="col-md-12"><div class="table-responsive">
<table class="table table-hover">
<thead><tr><th>Question</th><th>Subject</th><th>Marks</th><th>Hint</th></tr></thead>
<tbody>
<?php
while($row = mysqli_fetch_array($reslt)){   //Creates a loop to loop through results
					$qid=$row['qid'];
							$result = mysqli_query($conn,"SELECT  id,subject,marks,question,hint FROM questions WHERE id=$qid;");
							$row = mysqli_fetch_row($result);
							echo "<tr><td hidden>" . $row[0] . "</td>
							<td>" . $row[3] . "</td>
							<td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[4] . "</td></tr>"; 						
						}
?>
</tbody>
</table>
</div></div></div></div>

</div></div></div></div></div></div></div></div></div>
<div class="row"><div class="col-md-12">
<div class="btn-row">
<a href="exams.php" class="btn default vx-cust-btn" >Back</a>
</div></div></div>
</div></div></div></div>
<?php include("includes/footer.php"); ?>
</div>
</div></body></html>
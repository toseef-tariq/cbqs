<?php 
		include("includes/header.php");
		include("includes/sidebar.php"); 
		include("../conn.php");
		$id=$_SESSION['id'];
		$class=$_SESSION['class'];
		$query = "SELECT * FROM exams where class='$class'"; //You don't need a ; like you do in SQL
		$result = mysqli_query($conn,$query);	
?>
<div class="content-main"><div class="container-fluid">
<div class="row">
<div class="col-sm-12 col-md-12">
<h3>Exams</h3><p>Exam is an assessment intended to measure a student&#39;s knowledge, skill, aptitude or in many other topics. Below is the list of the exams created in this account.</p>
<div class="row q-data">
<div class="col-sm-12 col-md-12 col-lg-12">
<div class="portlet-body">
<hr />
<div class="row">
<div class="col-sm-12 col-md-12 col-lg-12">
<div class="row"><div class="col-md-12">
<div class="table-responsive">
<table class="table table-hover sortable">
<thead><tr>
<th>Name</th>
<th>Subject</th>
<th>Time</th>
<th>Actions</th>
</tr></thead>
<tbody>
<?php
					while($row = mysqli_fetch_array($result)){
						$tid=$row['id'];
						$sql = "SELECT tid FROM results where tid='$tid'"; //You don't need a ; like you do in SQL
						 $res = mysqli_query($conn,$sql);
						 $rex = mysqli_fetch_row($res);
						    if($row['id']!=$rex[0])
							{
							echo "<tr><td hidden>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $row['subject'] . "</td><td>" . $row['class'] . "</td><td><div class='field-actions'><div class='btn-group'>
							<form action='preview_exam.php' method='GET'>
							<button  onclick='myFunction()' name='q' value=" .$row['id'] . " type='submit' class='btn btn-success'  type='button'>Attempt</button></td></form></div></div>
							</td></tr>";  //$row['index'] the index here is a field name
							}
					
					}
				?>

</tbody>


</table></div><div class="text-right"></div></div></div></div></div></div></div>
<div class="row"><div class="col-md-12">
<div class="btn-row">
<a href="dashboard.php" class="btn default vx-cust-btn" >Back</a>
</div></div></div>
</div></div></div></div></div></div>

<?php include("includes/footer.php"); ?></div>

<script> 
	</script>

</body></html>
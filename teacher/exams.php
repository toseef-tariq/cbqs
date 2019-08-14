<?php 
		include("includes/header.php");
		include("includes/sidebar.php"); 
		include("../conn.php");
		$id=$_SESSION['id'];
		$query = "SELECT * FROM exams WHERE tid='$id'"; 
		$result = mysqli_query($conn,$query);	
		if(isset($_POST['delete_id'])){ 
		$id = $_POST['delete_id'];
		$query = "delete from exams where ID = $id";		
		mysqli_query($conn, $query);
		 echo '<script>window.location.href="exams.php";</script>';
		}
?>
<div class="content-main"><div class="container-fluid">
<div class="row">
<div class="col-sm-12 col-md-12">
<h3>Exams</h3><p>Exam is an assessment intended to measure a student&#39;s knowledge, skill, aptitude or in many other topics. Below is the list of the exams created in this account.</p>
<div class="row q-data">
<div class="col-sm-12 col-md-12 col-lg-12">
<div class="portlet-body">
<hr />
<div class="new-link"><a class="btn btn-success" href="new_exam.php"><i class="fa fa-plus add" data-toggle="tooltip"></i>New Exam</a></div>
<div class="row">
<div class="col-sm-12 col-md-12 col-lg-12">
<div class="row"><div class="col-md-12">
<div class="table-responsive">
<table class="table table-hover sortable">
<thead><tr>
<th>Exam Name</th>
<th>Subject</th>
<th>Course</th>
<th>Actions</th>
</tr></thead>
<tbody>
<?php
					while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
							echo "<tr><td hidden>" . $row['id'] . "</td>
							<td><a href='preview_exam.php?q=" . $row['id'] . "'>" . $row['name'] . "</a></td>
							<td>" . $row['subject'] . "</td><td>" . $row['class'] . "</td>
							<td><div class='field-actions'><div class='btn-group'>
							<form action='exams.php' method='post'>
							<button   name='delete_id' value=" .$row['id'] . " type='submit' class='btn btn-danger'  type='button'>Delete</button></div></div></td></form></tr>";  //$row['index'] the index here is a field name
						}
				?>

</tbody>


</table></div><div class="text-right"></div></div></div></div></div></div></div></div>
<div class="row"><div class="col-md-12">
<div class="btn-row">
<a href="dashboard.php" class="btn default vx-cust-btn" >Back</a>
</div></div></div>
</div></div></div></div></div>

<?php include("includes/footer.php"); ?></div>



</body></html>
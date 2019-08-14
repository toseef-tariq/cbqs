<?php 
		include("includes/header.php");
		include("includes/sidebar.php"); 
		include("../conn.php");
		$query = "SELECT * FROM subjects"; //You don't need a ; like you do in SQL
		$result = mysqli_query($conn,$query);
		if(isset($_POST['delete_id'])){ 
		$id = $_POST['delete_id'];
		$query = "delete from subjects where ID = $id";		
		mysqli_query($conn, $query);
		 echo '<script>window.location.href="subjects.php";</script>';;
		}
?>
<div class="content-main"><div class="container-fluid"><div class="row"><div class="col-sm-12 col-md-12">
<h3>Subjects</h3>
<p>Subjects are the parts into which learning can be divided. Each lesson related to a subject only.</p>
<hr />
<div class="row q-data"><div class="col-sm-12 col-md-12 col-lg-12">
<div class="portlet-body">
<div class="row"><div class="col-md-12 text-right"><div class="new-link">
<a class="btn btn-success" href="new_subject.php"><i class="fa fa-plus add" data-toggle="tooltip"></i>New Subject</a></div>
<ul class="pagination"></ul></div></div><div class="row"><div class="col-sm-12 col-md-12 col-lg-12"><div class="row">
<div class="col-md-12"><div class="table-responsive"><table class="table table-hover">
<thead>
<tr><th>ID</th><th>Name</th><th>Created At</th><th>Actions</th></tr></thead>
<tbody>
<?php
					while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
							echo "<tr><td>" . $row['id'] . "</td><td>" . $row['subject'] . "</td><td>" . $row['date'] . "</td><td><div class='field-actions'><div class='btn-group'>
							<form action='subjects.php' method='post'>
							<button   name='delete_id' value=" .$row['id'] . " type='submit' class='btn btn-danger'  type='button'>Delete</button></div></div></td></form></tr>";  //$row['index'] the index here is a field name
						}
				?>
</tbody>
</table>
</div>
<div class="row">
<div class="col-md-12 text-right">
</div></div></div></div></div></div></div></div></div></div></div></div></div></div>
<?php include("includes/footer.php"); ?>
</div>
</body></html>
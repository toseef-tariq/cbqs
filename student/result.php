<?php include("includes/header.php"); 
		include("includes/sidebar.php"); 
		$sid=$_SESSION['idhotel'];
		include("../conn.php");
		$query = "SELECT * FROM results WHERE sid='$sid'"; //You don't need a ; like you do in SQL
		$result = mysqli_query($conn,$query);
		?>
<div class="content-main"><div class="container-fluid"><div class="row"><div class="col-sm-12 col-md-12">
<h3>Exam Results</h3><hr/>
<div class="row q-data"><div class="col-sm-12 col-md-12 col-lg-12"><div class="portlet-body">
<div class="row"><div class="col-sm-12 col-md-12 col-lg-12"><div class="row"><div class="col-md-12">
<div class="table-responsive"><table class="table table-hover sortable"><thead><tr><th>Exam Name</th><th>Subject</th>
<th>Marks</th><th>Percentage</th><th>Status</th></tr></thead>
<tbody>
<?php
					while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
							echo "<tr><td hidden>" . $row['id'] . "</td>
							<td>" . $row['tname'] . "</td><td>" . $row['subject'] . "</td><td>" . $row['marks'] . "</td>
							<td>" . $row['per'] . "</td><td>" . $row['status'] . "</td></tr>";
						}
				?>
</tbody></table></div>
<div class="text-right"></div></div></div></div></div></div></div></div></div></div></div></div></div>

<?php include("includes/footer.php"); ?>
</div>
</body></html>
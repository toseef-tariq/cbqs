<?php   
		
			
		include("../conn.php");
		$result = mysqli_query($conn,"SELECT  MAX(id),subject FROM exams");
		$row = mysqli_fetch_row($result);
		$eid=$row[0];	
  		 if(isset($_POST['Submit'])){
			 $values = $_POST['question_ids'];
			 
			foreach ($values as $qid)
			{   
				$sql = "INSERT INTO squestions (eid, qid) VALUES ('$eid', '$qid')";
				$result = mysqli_query($conn,$sql);
				echo $qid;
				}
			//echo '<script>window.location.href="exams.php";</script>';
		 }

?>
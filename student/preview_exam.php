<?php   
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
		echo "<input  hidden id='demo' value='" . $id . "' />" ;
		session_start();
		$_SESSION["min"] = 10;
		$_SESSION["sec"] = 00;	
		$_SESSION['fresh']=0;
		$mark=0;
			$query = "SELECT * FROM squestions WHERE eid='$eid'"; 
		   $rest = mysqli_query($conn,$query);
		   while($row = mysqli_fetch_array($rest)){   //Creates a loop to loop through results
					       $qid=$row['qid'];
							$reslt = mysqli_query($conn,"SELECT  marks FROM questions WHERE id=$qid;");
							$rows = mysqli_fetch_row($reslt);	
							$mark=$mark+(int)$rows[0];
							
						}
						
?>
<!DOCTYPE html>
<html>
	<head>
		<title>CBQS</title>
		<meta charset="utf-8"> 
		<meta content="IE=edge" http-equiv="X-UA-Compatible" />
		<meta content="VirtualX is fully automated system which can significantly help your organization to improve the efficiency when it comes to conducting online examinations." name="description" />
		<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
		<meta content="telephone=no" name="format-detection" />
		<meta content="date=no" name="format-detection" />
		<meta content="address=no" name="format-detection" />
		<meta content="email=no" name="format-detection" />
		<link rel="shortcut icon" type="image/x-icon" href="assets/images/fav.ico" id="favicon" />
		<link rel="stylesheet" media="all" href="assets/css/style.css" />
		<script src="assets/js/demo.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<meta name="action-cable-url" content="/cable" />
	</head>
<body>
<div class="content-main"><div class="container-fluid"><div class="row"><div class="col-sm-12 col-md-12">

<div class="row q-data"><div class="col-sm-12 col-md-12 col-lg-12"><div class="portlet-body">
<div class="row"><div class="col-sm-12 col-md-12 col-lg-12">

<div class="row"><div class="col-md-12">

<div class="tab-content tab-content-cust">
<h3 class="text-break">Start Exam</h3>
<p>Here you can see the basic details of an exam. Read instructions carefully. Best of Luck!</p>
<p><b>Note: </b>Once you Clicked on start then you can not Refresh or Close the page during exam time.</p>
<hr />
<div class="tab-pane fade in active overview-styles" id="overview">
<div class="row overview-mob"><div class="col-sm-6">
<div class="row"><div class="col-xs-6 font-bold">Name :</div><div class="col-xs-6"><?php echo $name; ?></div></div>
<div class="row"><div class="col-xs-6 font-bold">Duration :</div><div class="col-xs-6">00:10:00</div></div>
<div class="row"><div class="col-xs-6 font-bold">Total mark :</div><div class="col-xs-6"><?php echo $mark; 
																							$_SESSION['total']=$mark;
																							?></div></div>
<div class="row"><div class="col-xs-6 font-bold">Batch Courses :</div><div class="col-xs-6"><?php echo $class; ?><br /></div></div>
</div>
<div class="col-sm-6">
<div class="row"><div class="col-xs-6 font-bold">Code :</div><div class="col-xs-6"><?php echo $eid; ?></div></div>
<div class="row"><div class="col-xs-6 font-bold">Subject :</div><div class="col-xs-6"><?php echo $subject; ?></div></div>
<div class="row"><div class="col-xs-6 font-bold">Percentage :</div><div class="col-xs-6">50%</div></div>
<div class="row"><div class="col-xs-6 font-bold">Created By :</div><div class="col-xs-6">CBQS</div></div>
</div>
</div>
<div class="row"><div class="col-xs-3 font-bold">Instructions :</div>
<div class="col-xs-9"><p><?php echo $ins; ?></p></div>

</div>
</div>

</div></div></div>
<br><button onClick="myFunction();" class="btn btn-success" name="start">Start</button>
</div></div></div></div></div></div>

</div></div></div>
<script>function myFunction() {
	var a="test.php?q=";
	var b=document.getElementById("demo").value;
	var a=a+b;
	window.open(a, "myWindow", "width=1200,height=600");
	window.location.href="dashboard.php";
	}
</script>

</body></html>
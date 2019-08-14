<?php
session_start();
include("../conn.php");
if(isset($_POST['submitButton'])){
$values = $_POST['flower'];
$marks=$_POST['marks'];
$tid=$_POST['tid'];
$tname=$_POST['tname'];
$tq=$_POST['tq'];
$subject=$_POST['subject'];
$per=0;
$sid=$_SESSION['idhotel'];
$class=$_SESSION['class'];
$total=$_SESSION['total'];
$gmarks=0; 
//echo $tid,$tname,$tq,$subject,$sid,$class,$total,$gmarks;
for($i=0;$i<$tq;$i++)
{
		$x=$i+1;
		echo "" .$x." ";
		$a="radio".$x."";
		$ans=$_POST[$a];
		echo "ans " .$ans." <br> ";
		echo "value " .$values[$i]."<br> ";
		if($ans==$values[$i])
		{			
			$gmarks=$gmarks+$marks[$i];		
		}
		
}
$per=((int)$gmarks/(int)$total)*100;
if($gmarks==0)
	$per="0";
if($per>49)
	$status="Pass";
else
	$status="Fail";
//echo $tid, $sid, $subject, $gmarks, $per, $status;
$sql = "UPDATE results SET marks='$gmarks', per='$per', status='$status' WHERE tid='$tid' AND subject='$subject' AND sid='$sid'";
mysqli_query($conn, $sql);
echo("Error description: " . mysqli_error($conn));
}
echo '<script>window.close();</script>';
		
		
?>
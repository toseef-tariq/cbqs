<?php
include('conn.php');
$email = $_POST['email'];
$password = $_POST['password'];
$result = mysqli_query($conn,"SELECT *  FROM user WHERE regno = '$email' and pass = '$password'") or die('Error');
$count=mysqli_num_rows($result);
if($count==1){
	while($row = mysqli_fetch_array($result)) {
     $ids=$row['name'];
	 $role=$row['role'];
	 $id=$row['id'];
}
	session_start();
if(isset($_SESSION['idhotel'])){
session_unset();
header("location:login.html");
}
else{
  
	$_SESSION["idhotel"] =$ids;
	$_SESSION["id"] =$id;
	if($role=="admin")
			header("location:admin/dashboard.php");
	if($role=="teacher")
	header("location:teacher/dashboard.php");
		
}
}
else 
{
	
	$result = mysqli_query($conn,"SELECT *  FROM students WHERE regno = '$email' and pass = '$password'") or die('Error');
	$count=mysqli_num_rows($result);
	if($count==1){
	while($row = mysqli_fetch_array($result)) {
     $id=$row['name'];
	 $class=$row['course'];
	  $ids=$row['id'];
}
	session_start();
if(isset($_SESSION['idhotel'])){
session_unset();
header("location:login.html");
}
else{
	session_start();
	$_SESSION["idhotel"] =$id;
	$_SESSION["id"] =$id;
	$_SESSION["class"] =$class;
		header("location:student/dashboard.php");
		
}
}
else
	header("location:login.html");
}
?>
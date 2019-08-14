<?php
session_start();
$min=$_SESSION['min'];
$sec=$_SESSION['sec'];
$sid=$_SESSION['idhotel'];
$class=$_SESSION['class'];
$total=$_SESSION['total'];
$_SESSION['min']=0;
$_SESSION['sec']=0;
		include("../conn.php");		
		$id=$_GET["q"];
		$result = mysqli_query($conn,"SELECT  id,name,subject,class,ins,ttime FROM exams WHERE id=$id;");
		$row = mysqli_fetch_row($result);
		$eid=$row[0];	
		$subject=$row[2];
		$tname=$row[1];
		$class=$row[3];
		$time=(int)$row[5];
		$time=$time*100;
		$fresh=1;
		//echo '<script>alert("'.$time.'");</script>';
		$ins=$row[4];
		$query = "SELECT * FROM squestions WHERE eid='$eid'"; 
		$reslt = mysqli_query($conn,$query);
		if($_SESSION['fresh']==0)
		{
		$sql = "INSERT INTO results (tid, tname, sid, marks, class, subject, per, status ) VALUES ('$eid', '$tname', '$sid', '0','$class', '$subject', '0','Fail')";
		mysqli_query($conn, $sql);
		}
		$_SESSION['fresh']=1;
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CBQS</title>
	    <link rel="shortcut icon" href="/image/favicon.ico"/>
	    <link href="http://www.pskills.org/lib/style/bootstrap.min.css" rel="stylesheet">
	    <link href="http://www.pskills.org/style/mystyle.css" rel="stylesheet" type="text/css" />
	    <link href="http://www.pskills.org/style/onlinetests.css" rel="stylesheet" type="text/css" />
   	    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"/>
        <style>
            .logoimg {
                margin-top: 13px;
            }
        </style>
    </head>  
    <body onload="setTimeForSubmit();" onload="noBack();"  onpageshow="if (event.persisted) noBack();" >  
        <div class="wrapper">


            <form action ="value.php" method="post" name="forma" id="myForm" style="margin-bottom: 0px"> 
                <div class="col-md-12 col-sm-12" id="onlinetest">
                    <div class="panel panel-default">
                        <div class="panel-heading " style="background-color:#9BBB59;padding:10px;">
                            <i><?php echo $tname; echo '<input value="'.$time.'" id="timeout" hidden>';?></i> 
							<div class="time-reaming">
                        <span class="testTitle">Time Remaining: </span><span  id="timer"><?php echo $min; echo":"; echo $sec; ?></span></div>
                        </div>
                        <div class="panel-body">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
<?php 
$i=0;
$ans=array();
while($row = mysqli_fetch_array($reslt)){   //Creates a loop to loop through results
					$qid=$row['qid'];
					$i++;
							$result = mysqli_query($conn,"SELECT  question,opt1,opt2,opt3,opt4,ans,hint,marks FROM questions WHERE id=$qid;");
							$row = mysqli_fetch_row($result);
							$ans[$i]=$row[5];
							echo '<input hidden name="tid" value="'.$id .'">';
							echo '<input hidden name="tname" value="'.$tname .'">';
							echo '<input hidden name="marks[]" value="'.$row[7] .'">';
							echo '<input hidden name="subject" value="'.$subject .'">';							
							echo '<input hidden name="tq" value="'.$i .'">';
							echo '<input hidden name="tq" value="'.$i .'">';
							echo '<select  name="flower[]"  hidden><option value="'. $ans[$i] .'">"'. $ans[$i] .'"</option></select>';
							echo'						
							
                  
                                
                                <div class="panel panel-default" id="ques1">
                                    <div class="panel-heading online-test" role="tab" id="">
                                        <h4 class="panel-title">
                                            <a><b>Q '.$i.' :</b> <span style="font-size:11.0pt;line-height:115%;
font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:
Calibri;mso-fareast-theme-font:minor-latin;mso-hansi-theme-font:minor-latin;
mso-bidi-font-family:&quot;Times New Roman&quot;;mso-bidi-theme-font:minor-bidi;
mso-ansi-language:EN-US;mso-fareast-language:EN-US;mso-bidi-language:AR-SA">' . $row[0] . ' <b> Hint: </b> ' . $row[6] . '</span> </a>
                                        </h4>
                                    </div>
                                    <div class="panel-collapse">
                                        <div class="panel-body online-test-options">
                                            <div class="col-lg-12">
                                                <div class="input-group">
                                                    <input required type="radio" name="radio'.$i .'" value="' . $row[1] . '">' . $row[1] . '</div><!-- /input-group -->
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="input-group">
                                                    <input required type="radio" name="radio'.$i .'" value="' . $row[2] . '">' . $row[2] . '</div><!-- /input-group -->
                                            </div>
                                            
                                            <div class="col-lg-12">
                                                <div class="input-group">
                                                    <input required type="radio" name="radio'.$i .'" value="' . $row[3] . '">' . $row[3] . '</div><!-- /input-group -->
                                            </div>
                                            
                                            
                                            <div class="col-lg-12">
                                                <div class="input-group">
                                                    <input  required type="radio" name="radio'.$i .'" value="' . $row[4] . '">' . $row[4] . '</div><!-- /input-group -->
                                            </div>
                                        </div>
										
                                    </div>
                                </div> ';
                                						}
?>
                            
                               
								
                                <button type="submit" name="submitButton" class="btn btn-primary online-test-btn">Submit  Answer</button>
                            </div>
                        </div>
                    </div>
                </div>
  
            </form>
        </div>
		</div></div>
		<script type="text/javascript">

startTimer();
function startTimer() {
  var presentTime = document.getElementById('timer').innerHTML;
  var timeout=document.getElementById('timeout').value;
  var timeArray = presentTime.split(/[:]+/);
  var m = timeArray[0];
  var s = checkSecond((timeArray[1] - 1));
  if(s==00){m=m-1}
  if(m==00){document.getElementById("myForm").submit();}
  
  document.getElementById('timer').innerHTML =
    m + ":" + s;
  setTimeout(startTimer, timeout);
}

function checkSecond(sec) {
  if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
  if (sec < 0) {sec = "59"};
  return sec;
}

</script>

    </body>
</html>    
<?php
include("includes/session.php");

$data=json_decode(file_get_contents("php://input"));

$jobid=$data->jobid;
$job_title=$data->job_title;
$rid=$data->rid;
$recruiter=$data->recruiter;
$appli_name=$row['fname']." ".$row['lname'];


$check="SELECT * FROM application_table WHERE eid='$login_id' AND job_id='$jobid' ";

$result=mysqli_query($db,$check);

$count=mysqli_num_rows($result);

if($count>=1){
	echo "Already Applied for this job..!! ";
}
else{

	$query="INSERT INTO `application_table`(`appli_no`, `job_id`, `rid`, `eid`, `job_title`, `applicant_name`, `recruiter_name`, `status`, `time`) VALUES (NULL,'$jobid','$rid','$login_id','$job_title','$appli_name','$recruiter','Applied',CURRENT_TIMESTAMP)";
	$result=mysqli_query($db,$query);

	if($result){
		echo"Successfully Applied..!! ";
	}
	else{
		echo"Please try again..!";
	}
}


?>
<?php
include ("includes/session.php");

$data = json_decode(file_get_contents("php://input"));

	$rid= $login_id;
	$recruiter= $data->recruiter;
	$title= $data->title;
	$desc = $data->desc;
	$skills= $data->skills;
	$salary = $data->salary;
	$location = $data->location;
	$cont_per = $data->cont_per;
	$cont_email= $data->cont_email;
	$cont_no = $data->cont_no;
	$last_date = $data->last_date;
	$inter_date = $data->interv_date;

	$query= "INSERT INTO `jobs_table` (`jobid`, `rid`, `recruiter`, `job_title`, `job_desc`, `skills`, `salary`, `location`, `contact_person`, `contact_no`, `contact_email`, `closing_date`, `interview_date`, `post_time`) VALUES (NULL, '$rid', '$recruiter', '$title', '$desc', '$skills', '$salary', '$location', '$cont_per', '$cont_no', '$cont_email', '$last_date', '$inter_date', CURRENT_TIMESTAMP)";

	$result= mysqli_query($db,$query);

	if(!$result){
		echo "no";
	}
	else{
		echo "yes";
	}

?>
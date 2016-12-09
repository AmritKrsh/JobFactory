<?php
include('includes/session.php');
$data=json_decode(file_get_contents("php://input"));

$jobid=$data->job_id;

$del_query="DELETE from jobs_table WHERE jobid=$jobid";

$result=mysqli_query($db,$del_query);

if($result){
	echo "yes";
}
else{
	echo "no";
}
?>
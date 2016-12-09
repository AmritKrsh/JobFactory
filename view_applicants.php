<?php

include("includes/session.php");

$data = json_decode(file_get_contents("php://input"));

$jobid=$data->jobid;

$query ="SELECT * from application_table WHERE `job_id`='$jobid' ";

$result=mysqli_query($db,$query);

$names =array();

while($row= mysqli_fetch_assoc($result)){
	$names[]=$row;
}

print json_encode($names);


?>
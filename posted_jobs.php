<?php
include("includes/session.php");

$jobs= "SELECT * FROM jobs_table WHERE rid=$login_id ORDER BY jobid DESC";

$result= mysqli_query($db,$jobs);

$jobs= array();

while($jobs_row = mysqli_fetch_array($result))
{
	$jobs[]=$jobs_row;

}

print json_encode($jobs);

?>

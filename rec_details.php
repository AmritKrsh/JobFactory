<?php
include("includes/session.php");

$query= "SELECT * FROM recruiter_table WHERE uid='$login_id' ";

$result=mysqli_query($db,$query);

$data= array();

while($row=mysqli_fetch_array($result)){
	$data[]=$row;
}

print json_encode($data);

?>
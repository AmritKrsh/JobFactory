<?php 
include("includes/session.php");
$query_received = "SELECT * FROM msg_table WHERE receiver='$login_id' ORDER BY `time` DESC";
$query_sent = "SELECT * FROM msg_table WHERE sender= '$login_id'";

$result_received= mysqli_query($db, $query_received);

$inbox = array();

while($row = mysqli_fetch_assoc($result_received)){
	$inbox[]=$row;
}


print json_encode($inbox);
//inbox table over


?>
<?php
include("includes/session.php");

$query="SELECT * FROM employee_table WHERE uid='$user_id' ";

$details= mysqli_fetch_assoc(mysqli_query($db,$query));

print json_encode($details);

?>
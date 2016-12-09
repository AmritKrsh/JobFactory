<?php  
include("includes/session.php");
//getting the list of applied jobs here

$query_applied_jobs = "SELECT * FROM application_table WHERE eid='$login_id' ORDER BY `time` DESC";
$applied_jobs = mysqli_query($db,$query_applied_jobs);

$data = array();

while ($row = mysqli_fetch_array($applied_jobs)) {
  $data[] = $row;
}
    $json_response = json_encode($data);
    echo $json_response;
?>


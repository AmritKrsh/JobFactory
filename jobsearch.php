<?php
include('includes/config.php');

$data=json_decode(file_get_contents("php://input"));
$search_term=$data->keyword;

	$jobs="SELECT * FROM jobs_table WHERE skills  COLLATE UTF8_GENERAL_CI like '%$search_term%' or skills  COLLATE UTF8_GENERAL_CI like '%$search_term%' or skills  COLLATE UTF8_GENERAL_CI like '%$search_term%' or skills  COLLATE UTF8_GENERAL_CI like '%$search_term%' or skills  COLLATE UTF8_GENERAL_CI like '%$search_term%' or location COLLATE UTF8_GENERAL_CI like '%$search_term%' or recruiter COLLATE UTF8_GENERAL_CI like '%$search_term%'  LIMIT 3";

	$result=mysqli_query($db,$jobs);

	$search_results=array();

	while($row=mysqli_fetch_array($result)){
		$search_results[]=$row;
	}


print json_encode($search_results);

?>


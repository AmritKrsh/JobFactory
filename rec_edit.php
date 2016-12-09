<?php 
include("includes/session.php");

$data= json_decode(file_get_contents("php://input"));

$desc=$data->desc;
$headq=$data->location;
$website=$data->website;
$email=$data->email;
$city=$data->city;
$state=$data->state;
$country=$data->country;
$zip=$data->zip;
$phone=$data->phone;


	$update_query = "UPDATE recruiter_table SET `description`='$desc', `headquater`='$headq', `website`='$website',
					 `email`='$email', `city`='$city', `state`='$state',`country`='$country',`zip`='$zip', `phone`='$phone'
					 WHERE `uid`='$login_id'";

	$result=mysqli_query($db,$update_query);

	if(!$result){
		echo "Unable to Update Details now..!! try later.";
		
		}
	else{
		echo"Details Updated" ;
	}

?>

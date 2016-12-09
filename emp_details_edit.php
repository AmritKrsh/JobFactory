<?php

include("includes/session.php");
$data= json_decode(file_get_contents("php://input"));

		$title= $data->title;
		$desc= $data->desc;

		$email=$data->email;
		$phone=$data->phone;

		//Address Details
		$city=$data->city;
		$state=$data->state;
		$country=$data->country;
		$zip=$data->zip;

		//Education Details
		$quali1=$data->quali1;
		$institute1=$data->institute1;
		$year1=$data->year1;
		$quali2=$data->quali2;
		$institute2=$data->institute2;
		$year2=$data->year2;
		$quali3=$data->quali3;
		$institute3=$data->institute3;
		$year3=$data->year3;
		$marks1=$data->marks1;
		$marks2=$data->marks2;
		$marks3=$data->marks3;

		//skills
		$skill1=$data->skill1;
		$skill2=$data->skill2;
		$skill3=$data->skill3;
		$skill4=$data->skill4;
		$skill5=$data->skill5;
		$skill1_val=$data->skill1_val;
		$skill2_val=$data->skill2_val;
		$skill3_val=$data->skill3_val;
		$skill4_val=$data->skill4_val;
		$skill5_val=$data->skill5_val;

		//other
		$job_exp=$data->job_exp;
		$training=$data->training;


		//update query
		$sql = "UPDATE `employee_table` SET `title`='$title',`description`='$desc',
						`email`='$email',`phone`='$phone',
						`city`='$city',`state`='$state',`country`='$country',`zip`='$zip',
						`quali1`='$quali1',`institute1`='$institute1',`year1`='$year1',`marks1`='$marks1',
						`quali2`='$quali2',`institute2`='$institute2',`year2`='$year2',`marks2`='$marks2',
						`quali3`='$quali3',`institute3`='$institute3',`year3`='$year3',`marks3`='$marks3',
						`skill1`='$skill1',`skill1_val`='$skill1_val',
						`skill2`='$skill2',`skill2_val`='$skill2_val',
						`skill3`='$skill3',`skill3_val`='$skill3_val',
						`skill4`='$skill4',`skill4_val`='$skill4_val',
						`skill5`='$skill5',`skill5_val`='$skill5_val',
						`job_exp`='$job_exp',`training`='$training'

						 WHERE `uid`='$user_id'";

		 $retval = mysqli_query($db, $sql);

	    if(!$retval){
	        echo"Unable to Update Now. Please try again !!";	   		
	      }
	    else{
	        echo "profile updated";
	      }
	    
?>
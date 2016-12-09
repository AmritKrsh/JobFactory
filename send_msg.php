<?php

include("includes/session.php");

$data=json_decode(file_get_contents("php://input"));

 if($user_type=='Employee'){
 	$sender_name=$row['fname'];
 }
 else{
 	$sender_name=$row['name'];
 }
$sender_id=$login_id;

$sender_email=$row['email'];
$to=$data->to;
$to_name=$data->to_name;
$to_email=$data->to_email;
$msg_subj=$data->msg_sub;
$msg_cont=$data->msg_cont;

$send_query="INSERT INTO `msg_table`(`msg_id`, `sender`, `sender_name`, `receiver`, `receiver_name`, `subj`, `content`, `time`, `senderEmail`, `receiverEmail`) VALUES (NULL,'$sender_id','$sender_name','$to','$to_name','$msg_subj','$msg_cont',CURRENT_TIMESTAMP,'$sender_email','$to_email')";

$retval=mysqli_query($db,$send_query);

if($retval){
	echo "Your msg has been sent..!!";
}
else{
	echo "Unable to send msg..!! try again";
}

 ?>
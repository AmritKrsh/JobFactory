<?php
include("includes/session.php");

$skill1=$row['skill1'];
$skill2=$row['skill2'];
$skill3=$row['skill3'];
$skill4=$row['skill4'];
$skill5=$row['skill5'];
$s1=$skill1;
$s2=$skill2;
$s3=$skill3;
$s4=$skill4;
$s5=$skill5;


$jobs="SELECT * FROM jobs_table WHERE skills  COLLATE UTF8_GENERAL_CI like '%$s1%' or skills  COLLATE UTF8_GENERAL_CI like '%$s2%' or skills  COLLATE UTF8_GENERAL_CI like '%$s3%' or skills  COLLATE UTF8_GENERAL_CI like '%$s4%' or skills  COLLATE UTF8_GENERAL_CI like '%$s5%' LIMIT 5";

$result=mysqli_query($db,$jobs);
                  
$data = array();

while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;
}
    print json_encode($data);
     
?>
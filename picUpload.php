<?php

$target_dir = "img/employee/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
					echo " <script> alert('Profile Pic Updated') </script>";
                } 
                else {
                    echo " <script> alert('Sorry, there was an error uploading your file.') </script>";
                    }
?>
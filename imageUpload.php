<?php
$imagePath= basename($_FILES["fileToUpload"]["name"]);

if(isset($_POST['btnUpload'])){

	echo $imagePath;
}

?>
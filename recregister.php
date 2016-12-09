<?php
include ("includes/session.php");
$sql=  "SELECT * from user_table where uid='$user_id'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result);

    if($row['completed']=="YES"){
      header("Location: recruiter.php");
    }


if(isset($_POST["btn_cmplt"])){

   $target_dir = "img/recruiter/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    $imageloc="img/recruiter/".basename( $_FILES["fileToUpload"]["name"]);



    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo"<script>alert('file is not image')</script>";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "<script> alert('Sorry, your image file is too large.') </script>";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "JPG" && $imageFileType != "png" && $imageFileType != "PNG" && $imageFileType != "jpeg"
    && $imageFileType != "JPEG" && $imageFileType != "gif" ) {
        echo "<script> alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.) </script>";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<script>alert('Sorry, your file was not uploaded.')</script>";

    
    }

  $name= $_POST['name'];
  $desc = $_POST['desc'];
  $headq = $_POST['loc'];
  $website = $_POST['website'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $city = $_POST['city'];
  $state =$_POST['state'];
  $country = $_POST['country'];
  $zip = $_POST['zip'];

  $insert_query="INSERT INTO recruiter_table (`uid`,`name`,`description`,`headquater`,`website`,`email`,
                                              `city`,`state`,`country`,`zip`,`phone`,`image`) 
                                      VALUES ('$user_id','$name','$desc','$headq','$website','$user_email',
                                              '$city','$state','$country','$zip','$phone','$imageloc') ";

  $result=mysqli_query($db,$insert_query);

  if(!$result){
    echo"<script>alert('Unable to Complete Now. Please try again !!')</script>";
  }
  else{

      //Uploading file to the server
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

            } 
      else {
            echo " <script> alert('Sorry, there was an error uploading your file.') </script>";
            }


      $query="UPDATE user_table SET `completed`='YES'  WHERE `uid`='$user_id' ";
      mysqli_query($db,$query);

      echo"<script>alert('Registration Completed !!')</script>";
      include("route2.php");
    
  }

}

?>

<!DOCTYPE html>
<html>
  <head>
    <?php include("includes/header.php"); 

    ?>  
  </head>
  <body>
  <div class="container-fluid">
    <h1> Job Factory</h1>
  </div>
  
  <!-- Navbar code-->
  <nav class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
     
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-pencil"></a>
      </div>

     
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav"  style="font-size:18px">
          <li><a href="index.php">Home<span class="sr-only">(current)</span></a></li>
          <li><a href="about.php">About</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Jobs <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Govt. Jobs</a></li>
              <li><a href="#">IT Jobs</a></li>
              <li class="divider"></li>
              <li><a href="#">Jobs By Location</a></li>
              <li><a href="#">Job By Skills</a></li>
            </ul>
          </li>
          <li class="active"><a href="register.php">Register</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right"  style="font-size:18px">
              <li class="dropdown">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><img src="img/recruiter/profile.jpg" class="img-circle special-img" height="35px" width="35px"><?php echo"$user_uname"; ?><b class="caret"></b></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                </ul>
              </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- /.Navbar code-->
 
<div class="container">
  <div class="row">
    
    <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
      
    </div>
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
      <div class="panel panel-default">
        <div class="panel-body">
          <h3 align='center' class="blue">Welcome <?php echo"$user_uname"; ?> !! Complete Your Details</h3>
          <hr class="style1">
          <!--Register Form-->
          <form method="POST" role="form" enctype="multipart/form-data">

            <div class=" form-group col-xs-12 col-sm-9 col-md-9 col-lg-9">
                <label>Company Name:</label>
                <input id="title" type="text" class="form-control" name="name" value="" placeholder="Company Name">
                <label>Description:</label>
                <textarea class="form-control" id="desc" name="desc" rows="6" placeholder="Description about Company and it's work" required></textarea>
            </div>

            <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <label>Location:</label>
                <input id="location" type="text" class="form-control" name="loc" value="" placeholder="Company Headquater" required>
            </div>

            <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <label>Website:</label>
                <input id="website" type="text" class="form-control" name="website" value="" placeholder="Website" required>
            </div>

            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h4 class="blue">Contact Details</h4>
            </div>
            <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <label>Email:</label>
                <input id="email" type="email" class="form-control" name="email" value="<?php echo $user_email ; ?>" placeholder="Email Id" Disabled>
            </div>

            <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <label>Contact No:</label>
                <input id="phone" type="text" class="form-control" name="phone" value="" placeholder="Contact No." required>
            </div>

            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h4 class="blue">Address Details</h4>
            </div> 

            <div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <label>Zip:</label>
                <input id="zip" type="text" class="form-control" name="zip" value="" placeholder="Zip Code" required>
            </div>

            <div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <label>City:</label>
                <input id="city" type="text" class="form-control" name="city" value="" placeholder="City" required>
            </div>

            <div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <label>State:</label>
                <input id="state" type="text" class="form-control" name="state" value="" placeholder="State" required>
            </div>

            <div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <label>Country:</label>
                <input id="country" type="text" class="form-control" name="country" value="" placeholder="Country" required>
            </div>
            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <label for="picture">Choose Profile Picture</label>
                <input type="file" name="fileToUpload" id="fileToUpload">
            </div>
                    
            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <button type="submit" name='btn_cmplt' class="btn btn-primary">Complete Details</button>
            </div>

          </form>

          <!--/.Register Form-->
        </div>
      </div>  
     </div>
    <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
      
    </div>
  </div>
</div>
<br>


<!--Footer-->

<?php include 'includes/footer.php'; ?>

<!--/.Footer-->

  </body>
</html>
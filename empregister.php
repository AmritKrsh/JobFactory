<?php
include ("includes/session.php");

$sql=  "SELECT * from user_table where uid='$user_id'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result);

    if($row['completed']=="YES"){
      header("Location: employee.php");
    }



if(isset($_POST["btn_complt"])){


    $target_dir = "img/employee/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    $imageloc="img/employee/".basename( $_FILES["fileToUpload"]["name"]);



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


    $title= $_POST['title'];
    $desc= $_POST['desc'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $dob=$_POST['dob'];
    $email=$_POST['emailid'];
    $phone=$_POST['phone'];

    //Address Details
    $city=$_POST['city'];
    $state=$_POST['state'];
    $country=$_POST['country'];
    $zip=$_POST['zip'];

    //Education Details
    $quali1=$_POST['quali1'];
    $institute1=$_POST['institute1'];
    $year1=$_POST['year1'];
    $quali2=$_POST['quali2'];
    $institute2=$_POST['institute2'];
    $year2=$_POST['year2'];
    $quali3=$_POST['quali3'];
    $institute3=$_POST['institute3'];
    $year3=$_POST['year3'];
    $marks1=$_POST['marks1'];
    $marks2=$_POST['marks2'];
    $marks3=$_POST['marks3'];

    //skills
    $skill1=$_POST['skill1'];
    $skill2=$_POST['skill2'];
    $skill3=$_POST['skill3'];
    $skill4=$_POST['skill4'];
    $skill5=$_POST['skill5'];
    $skill1_val=$_POST['skill1_val'];
    $skill2_val=$_POST['skill2_val'];
    $skill3_val=$_POST['skill3_val'];
    $skill4_val=$_POST['skill4_val'];
    $skill5_val=$_POST['skill5_val'];

    //other
    $job_exp=$_POST['job_exp'];
    $training=$_POST['training'];


    //insert query
    $insert_sql="INSERT INTO employee_table (`uid`, `fname`, `lname`, `title`, `description`, `dob`, `email`, `phone`, `city`, `state`, `country`, `zip`, `quali1`, `institute1`, `year1`, `marks1`, `quali2`, `institute2`, `year2`, `marks2`, `quali3`, `institute3`, `year3`, `marks3`, `skill1`, `skill1_val`, `skill2`, `skill2_val`, `skill3`, `skill3_val`, `skill4`, `skill4_val`, `skill5`, `skill5_val`, `job_exp`, `training`, `image`, `last_updated`) VALUES ('$user_id', '$fname', '$lname', '$title', '$desc', '$dob', '$user_email', '$phone', '$city', '$state', '$country', '$zip', '$quali1', '$institute1', '$year1', '$marks1', '$quali2', '$institute2', '$year2', '$marks2', '$quali3', '$institute3', '$year3', '$marks3', '$skill1', '$skill1_val', '$skill2', '$skill2_val', '$skill3', '$skill3_val', '$skill4', '$skill4_val', '$skill5', '$skill5_val', '$job_exp', '$training', '$imageloc', CURRENT_TIMESTAMP) ";

    

    if(!mysqli_query($db,$insert_sql)){
      echo"<script>alert('Unable to Complete Now. Please try again !!')</script>";
    }
    else{

          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

            } 
         else {
                echo " <script> alert('Sorry, there was an error uploading your file.') </script>";
              }

          $query="UPDATE user_table SET `completed`='YES'  WHERE `uid`='$user_id' ";
          mysqli_query($db,$query);

          echo"<script>alert('Registration Completed !!')</script>";
          include("route.php");

    }
    
  
}

?>

<!DOCTYPE html>
<html>
  <head>

    <!--including header file -->
    <?php include("includes/header.php"); ?>  

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
        <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-pencil"></span></a>
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

                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><img src="img/employee/profile.jpg" class="img-circle special-img" height="35px" width="35px"><?php echo"$user_uname"; ?><b class="caret"></b></a>
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
  <h3 align='center'>Welcome <?php echo"$user_uname"; ?> !! Complete Your Details</h3>
      <hr class="style1">
  <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
    
  </div>
  <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
<!--Register Form-->
    <form method="POST" role="form" enctype="multipart/form-data">
    
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <h3 class="blue"><span class="glyphicon glyphicon-user"></span> Personal Details</h3>
        </div>
        <div class=" form-group col-xs-12 col-sm-9 col-md-9 col-lg-9">
          <label>Title:</label>
          <input id="title" type="text" class="form-control" name="title" value="" placeholder="Write Job Title" required>
          <label>Description:</label>
          <textarea class="form-control" id="desc" name="desc" rows="6" placeholder="Write Description about you and your profession" required></textarea>
        </div>
        <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
          <label>First Name:</label>
          <input id="fname" type="text" class="form-control" name="fname" value="" placeholder="First Name" required>
        </div>
        <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
          <label>last Name:</label>
          <input id="lname" type="text" class="form-control" name="lname" value="" placeholder="Last Name" required>
        </div>
        <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
          <label>Date of Birth:</label>
          <input id="dob" type="text" class="form-control" name="dob" value="" placeholder="Dob format yyyy-mm-dd" required>
        </div>
        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
          <label>Email:</label>
          <input id="email" type="email" class="form-control" name="emailid" value="<?php echo $user_email ; ?>" placeholder="Email Id" disabled>
        </div>
        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
          <label>Contact No:</label>
          <input id="phone" type="text" class="form-control" name="phone" value="" placeholder="Contact No." required>
        </div>
          <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h4>Address Details</h4>
          </div>
          <div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <input id="city" type="text" class="form-control" name="city" value="" placeholder="City" required>
          </div>
          <div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <input id="state" type="text" class="form-control" name="state" value="" placeholder="State" required>
          </div>
          <div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <input id="country" type="text" class="form-control" name="country" value="" placeholder="Country" required>
          </div>
          <div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <input id="zip" type="text" class="form-control" name="zip" value="" placeholder="Zip Code" required>
          
          </div>

          
        
        <!-- Education Details-->
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <hr>
            <h3 class="blue"><span class="glyphicon glyphicon-education"></span> Education Details </h3>
        </div>
        
        <div class="form-group form-inline form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <label>1:</label>
          <input id="quali1" type="text" class="form-control" name="quali1" value="" placeholder="Degree" required>
          <input id="institute1" type="text" class="form-control" name="institute1" value="" placeholder="Institute Name" required>
          <input id="year1" type="text" class="form-control" name="year1" value="" placeholder="Year of Passing" required>
          <input id="marks1" type="text" class="form-control" name="marks1" value="" placeholder="Marks" required>
        </div>
        <div class="form-group form-inline form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <label>2:</label>
          <input id="quali2" type="text" class="form-control" name="quali2" value="" placeholder="Degree" required>
          <input id="institute2" type="text" class="form-control" name="institute2" value="" placeholder="Institute Name" required>
          <input id="year2" type="text" class="form-control" name="year2" value="" placeholder="Year of Passing" required>
          <input id="marks2" type="text" class="form-control" name="marks2" value="" placeholder="Marks" required>
        </div>
        <div class="form-group form-inline form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <label>3:</label>
          <input id="quali3" type="text" class="form-control" name="quali3" value="" placeholder="Degree">
          <input id="institute3" type="text" class="form-control" name="institute3" value="" placeholder="Institute Name">
          <input id="year3" type="text" class="form-control" name="year3" value="" placeholder="Year of Passing">
          <input id="marks3" type="text" class="form-control" name="marks3" value="" placeholder="Marks">
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <hr>
          <h3 class="blue"><span class="glyphicon glyphicon-book"></span> Skills</h3>
        </div>
        <div class="form-group form-inline form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <label>1.</label>
          <input id="skill1" type="text" class="form-control" name="skill1" value="" placeholder="skill 1">
          <select class="form-control" name="skill1_val" required >
                      <option></option>
                      <option>Beginner</option>
                      <option>Intermediate</option>
                      <option>Expert</option>
                  </select>
                 </div>
                 <div class="form-group form-inline form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <label>2.</label>
          <input id="skill2" type="text" class="form-control" name="skill2" value="" placeholder="skill 2">
          <select class="form-control" name="skill2_val" required >
                      <option></option>
                      <option>Beginner</option>
                      <option>Intermediate</option>
                      <option>Expert</option>
                  </select>
         </div>
         <div class="form-group form-inline form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <label>3.</label>
          <input id="skill3" type="text" class="form-control" name="skill3" value="" placeholder="skill 3">
          <select class="form-control" name="skill3_val">
                      <option></option>
                      <option>Beginner</option>
                      <option>Intermediate</option>
                      <option>Expert</option>
                  </select>
                 </div>
         <div class="form-group form-inline form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <label>4.</label>
          <input id="skill4" type="text" class="form-control" name="skill4" value="" placeholder="skill 4">
          <select class="form-control" name="skill4_val">
                      <option></option>
                      <option>Beginner</option>
                      <option>Intermediate</option>
                      <option>Expert</option>
                  </select>
        </div>
        <div class="form-group form-inline form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <label>5.</label>
          <input id="skill5" type="text" class="form-control" name="skill5" value="" placeholder="skill 5">
          <select class="form-control" name="skill5_val">
                      <option></option>
                      <option>Beginner</option>
                      <option>Intermediate</option>
                      <option>Expert</option>
                  </select>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <hr>
          <h3 class="blue"><span class="glyphicon glyphicon-briefcase"></span> Work Experience</h3>
        </div>
        <div class="form-group form-horizontal form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <input id="job_exp" type="text" class="form-control" name="job_exp" value="" placeholder="Write about job Experience">
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <hr>
          <h3 class="blue"><span class="glyphicon glyphicon-eye-open"></span> Training Detail</h3>
        </div>
        <div class="form-group form-horizontal form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <input id="training" type="text" class="form-control" name="training" value="" placeholder="Write about training details">
        </div>
        
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <label for="picture">Choose Profile Picture</label>
            <input type="file" name="fileToUpload" id="fileToUpload">
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <button type="submit" name="btn_complt" class="btn btn-primary">Complete Details</button>
        </div>
  </form>
  <!--/.Register Form-->
    </div>
  </div>
</div>
<br>


<!--Footer-->

<?php include 'includes/footer.php'; ?>

<!--/.Footer-->

  </body>
</html>

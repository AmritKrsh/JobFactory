<?php

  if(isset($_POST["btn_signup"])){
    session_start();

    $email = $_POST['email'];
    $uname = $_POST['uname'];
    $pass  = $_POST['pass'];
    $category = $_POST['category'];

    //checking for existing email

    $dupSql = "SELECT * FROM user_table where email= '$email'";
    $dupRow = mysqli_query($db, $dupSql);

    if (mysqli_num_rows($dupRow) > 0){
      echo"<script>alert('email already registered')</script>";
    }
    else{
      //inserting into table

      $sql = " INSERT INTO `user_table` (`uid`, `uname`, `pass`, `email`, `type`, `time`,`completed`,`verified`) VALUES (NULL, '$uname', '$pass', '$email', '$category', CURRENT_TIMESTAMP,'NO','YES');";
      $retval = mysqli_query($db, $sql);
      

      if(!$retval){
          echo"<script>alert('Unable to Register Now. Please try again !!')</script>";
        }
      else{

          $sql = "SELECT * FROM user_table WHERE uname = '$uname' and pass = '$pass'";
          $result = mysqli_query($db,$sql);
          $row = mysqli_fetch_array($result);


          $_SESSION['id'] = $row['uid'];
          $_SESSION['login_user'] = $row['uname'];
          $_SESSION['email']=$row['email'];
          $_SESSION['type']=$row['type'];
          $type_check=$row['type'];

          //checking user type and redirecting to the required complete register page

          if($type_check=="Employee"){
            header("location: empregister.php");
          }
          elseif($type_check=="Recruiter"){
            header("location: recregister.php");
          }
        }
    }
}

?>
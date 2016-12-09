<?php
   session_start();
   if(isset($_POST["btn_login"])) {
      // username and password sent from form 
      
      $myusername = $_POST['uname'];
      $mypassword = $_POST['pass']; 
      
      $sql = "SELECT * FROM user_table WHERE uname = '$myusername' and pass = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result);
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
        
		      $_SESSION['login_user'] = $myusername;
          $_SESSION['id'] = $row['uid'];
          $_SESSION['email']=$row['email'];
          $_SESSION['type']=$row['type'];
          $type_check=$row['type'];
          $completed=$row['completed'];

          if($type_check=="Employee"){

            if($completed=='YES'){
                header("location: employee.php");
            }
            else{
                header("location: empregister.php");
            }
            
          }
          elseif($type_check=="Recruiter"){
            if($completed=='YES'){
                header("location: recruiter.php");
            }
            else{
                header("location: recregister.php");
            }
          }
          
      }
      else {
        echo"<script>alert('Username or password didnot match')</script>";
      }
   }
?>
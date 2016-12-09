<?php 

    include("includes/config.php");
    include("reg.php");
    include("login.php");

?>


<!DOCTYPE html>
<html>
  <head>
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
        <!--<a class="navbar-brand" href="#">Brand</a>-->
      </div>

     
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right"  style="font-size:18px">
          <li class="active"><a href="#">Home<span class="sr-only">(current)</span></a></li>
          <li><a href="#">About</a></li>
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
          <li><a href="#" data-toggle="modal" data-target="#regModal">Register</a></li>
          <li><a href="" data-toggle="modal" data-target="#loginModal">Login</a></li>
        </ul>
       
      </div>
    </div>
  </nav>

  <!-- /.Navbar code-->
  
<!-- Modal for login-->
<div id="loginModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        
      
        <form class="navbar-form" role="form" method="POST">

                          <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                              <input id="uname" type="text" class="form-control" name="uname" value="" placeholder="User Name">                                        
                          </div>

                          <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                              <input id="password" type="password" class="form-control" name="pass" value="" placeholder="Password">                                        
                          </div>
                          &nbsp;&nbsp;&nbsp;&nbsp;
                          <div class="input-group">
                            <button type="submit" name="btn_login" class="btn btn-primary">Login</button>&nbsp;&nbsp;
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          </div>
          </form>
    </div>

  </div>
</div>
<!-- /.Modal for login-->

<!-- Modal for Register-->
<div id="regModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <h3 align='center'> Create Your Account </h3>
        <hr class="style1">
        <form method="POST" data-toggle='validator' role="form">
          <div class="form-group">
                  <input type="email" class="form-control" name="email" placeholder="Valid Email Id" required>
          </div>
          <div class="form-group">
                  <input type="text" class="form-control" name="uname" placeholder="User Name" required="" ">
          </div>
          <div class="form-group">
                  <input type="password" data-minlength="6" class="form-control" name="pass" placeholder="Password" required>
                  <div class="help-block">Minimum of 6 characters</div>
          </div>
          <div class="form-group">
                 <select class="form-control" name="category" required >
                    <option></option>
                    <option>Employee</option>
                    <option>Recruiter</option>
                 </select>
          </div>
          <div align="center">
            <button type="submit" name="btn_signup" class="btn btn-info">Create Account</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">&nbsp;&nbsp;&nbsp;Close&nbsp;&nbsp;&nbsp;</button>
          </div>
        </form>
      </div>
    </div>

  </div>
</div>
<!-- /.Modal for Register-->

<!--Search Box-->

<div class="container-fluid" align="center" ng-app="search_app" ng-controller="searchController">

  <br><br>
  <div class="col-xs-10 col-sm-12 col-md-6 col-lg-6 col-xs-offset-1 col-sm-offset-3 col-lg-offset-3 col-lg-offset-3">
    <form role="search">
          <div class="input-group">
              <input type="text" class="form-control input-lg" placeholder="Search Jobs (Skills, Location, Company)" name="keyword" id="srch-term" ng-model="keyword" >
                <div class="input-group-btn">
                    <button class="btn btn-success btn-lg" name="btn_search" ng-click='searchResults()'><i class="glyphicon glyphicon-search"></i></button>
                </div>
          </div>
    </form>
    <br>
    <br>
    <br>
</div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xs-offset-3 col-sm-offset-3 col-lg-offset-3 col-lg-offset-3" align="left" ng-repeat="rows in result">
        <ul>
        <li>
          <h4 class='blue'>{{rows.job_title}}</h4>
          <h4>{{rows.recruiter}}</h4>
          <label>Location:&nbsp; </label>{{rows.location}} <br>
          <label>Skills Required:&nbsp; </label>{{rows.skills}} <br>
          <p>{{rows.desc}}</p>
          <hr class='style3'>
        </li>
      </ul>
    </div>


<script>
  var search_app = angular.module('search_app', []);


  search_app.controller('searchController',function ($scope, $http) {

    $scope.result='';

    $scope.searchResults= function(){
      
      $http.post('jobsearch.php',{'keyword':$scope.keyword})
          .success(function(data){
            if (data==''){
              $scope.result=data;
              alert('no result found');
            }

            else{
              $scope.result=data;
            }
          })
    }

          

  });

</script>
</div>



<!-- Bottom Slider-->
<div class="container" align="center" >
  <h3> Top Recruiters</h3>
  <hr class="style1">
  <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <div id="carousel-id" class="carousel slide" data-ride="carousel">
      
      <div class="carousel-inner">
        <div class="item active">
          <img src="img/logo/comp1.png">
        </div>
        <div class="item">
          <img src="img/logo/comp2.jpg"> 
        </div>
        <div class="item">
          <img src="img/logo/comp3.jpg">  
        </div>
        <div class="item">
          <img src="img/logo/comp4.jpg">  
        </div>
      </div>
    </div>
  </div>

  <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <div id="carousel-id" class="carousel slide" data-ride="carousel">
      
      <div class="carousel-inner">
        <div class="item">
          <img src="img/logo/comp1.png">
        </div>
        <div class="item active">
          <img src="img/logo/comp2.jpg"> 
        </div>
        <div class="item">
          <img src="img/logo/comp3.jpg">  
        </div>
        <div class="item">
          <img src="img/logo/comp4.jpg">  
        </div>
      </div>
    </div>
    
  </div>

  <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <div id="carousel-id" class="carousel slide" data-ride="carousel">
      
      <div class="carousel-inner">
        <div class="item">
          <img src="img/logo/comp1.png">
        </div>
        <div class="item">
          <img src="img/logo/comp2.jpg"> 
        </div>
        <div class="item active">
          <img src="img/logo/comp3.jpg">  
        </div>
        <div class="item">
          <img src="img/logo/comp4.jpg">  
        </div>
      </div>
    </div>
  </div>

  <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <div id="carousel-id" class="carousel slide" data-ride="carousel">
      
      <div class="carousel-inner">
        <div class="item">
          <img src="img/logo/comp1.png">
        </div>
        <div class="item">
          <img src="img/logo/comp2.jpg"> 
        </div>
        <div class="item">
          <img src="img/logo/comp3.jpg">  
        </div>
        <div class="item active">
          <img src="img/logo/comp4.jpg">  
        </div>
      </div>
    </div>
  </div>

</div>
<br><br>

<!--Footer-->

<?php include 'includes/footer.php'; ?>

<!--/.Footer-->

  </body>
</html>

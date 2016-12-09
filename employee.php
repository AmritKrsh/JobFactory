<?php
include("includes/session.php");

$pro_image=$row['image'];

?>
<!DOCTYPE html>
<html>
  <head>
    <?php 
    include("includes/header.php"); 
    ?> 

  </head>

  <body ng-app="emp_app" ng-controller="empController">
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
	        <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-home"></a>
	      </div>

	     
	      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	        <ul class="nav navbar-nav"  style="font-size:18px">
	          <li class="active"><a href="#">Home<span class="sr-only">(current)</span></a></li>
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
	        </ul>
	        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
		        <form class="navbar-form" role="search">
			        <div class="input-group">
			            <input type="text" class="form-control" placeholder="Search Jobs" name="srch-term" id="srch-term">
			            <div class="input-group-btn">
			                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
			            </div>
			        </div>
		        </form>
		       </div>

	        <ul class="nav navbar-nav navbar-right"  style="font-size:18px">
		          <li class="dropdown">

		            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><img src="{{emp_details.image}}" class="img-circle special-img" height="35px" width="35px"><?php echo"$login_user"; ?><b class="caret"></b></a>
		            <ul class="dropdown-menu" role="menu">
		              <li><a href="#"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
		              <li><a href="#"><span class="glyphicon glyphicon-envelope"></span> Inbox</a></li>
		              <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
		            </ul>
		          </li>
	        </ul>
	       
	      </div>
	    </div>
	  </nav>
	 <!--/.navbar code-->

<div class="container" >
<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
	<div class="well">
		<style>
		#img_container {
		    position:relative;
		    display:inline-block;
		    text-align:center;
		    /* background:url('http://jsfiddle.net/img/initializing.png') no-repeat;
		    width:186px;
		    height:157px;*/
		}

		.btnhover {
		    position:absolute;
		    bottom:1px;
		    right:1px;
		    width:40px;
		    height:30px;
		}
		</style>
		<div id="img_container">
			<img src=<?php echo"$pro_image"; ?> class="img-responsive" alt="Image" >
			<a href="#" data-toggle="modal" data-target="#changepicModal"><img class="btnhover" src="img/changepic.png"></a>
		</div>
			<h3 clsss="blue">{{emp_details.fname}} {{emp_details.lname}}</h3>
			<h4>{{emp_details.title}}</h4>
			<p><i>"{{emp_details.description}}"</i></p>
		<div id="changepicModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">
			    <!-- Modal content-->
			    <div class="modal-content">
				    <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Change Profile Pic</h4>
					</div>
					<div class="modal-body">
						<table>
							<tr align="cneter">
								<td><input type="file" name="fileToUpload" required=""></td>
								<td><button action="picUpload.php" class="btn btn-primary">Update Pic</button></td>
							</tr>
						</table>
					</div>
			    </div>
			  </div>
		</div>
	</div> <!-- well close-->
</div><!--container close-->

<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">

	<div class="panel nav-tabs">
                     <div class="panel-heading">
                        <ul class="nav nav-tabs">
                          <li class="active"><a href="#sectionA" data-toggle="tab">Profile</a></li>
                          <li><a href="#sectionB" data-toggle="tab">Recomended Jobs</a></li>
                          <li><a href="#sectionC" data-toggle="tab">Applied Job</a></li>
                          <li><a href="#sectionD" data-toggle="tab">Inbox</a></li>
                          <li><a href="#sectionE" data-toggle="tab">Edit Profile</a></li>
                        </ul>
                     </div>
	                <div class="panel-body">
	                  <div class="tab-content" id="myTabContent">
		                  
	                  		<!-- Section for profile-->
		                  <div id="sectionA" class="tab-pane fade  in active">
		                  		<h3 class="blue"><span class="glyphicon glyphicon-user"></span> Personal Details</h3>
		                  	  <div class="row">
		                  		<div class="col-md-5" style="font-size:17px">
		                  			<b>first Name :</b> {{emp_details.fname}}<br>
		                  			<b>Username  :</b> <?php echo" $user_uname"; ?><br>
		                  			<b>DOB :</b> {{emp_details.dob}}<br>
		                  			<b>City :</b> {{emp_details.city}}<br>
		                  			<b>Country :</b> {{emp_details.country}}
		                  		</div>
		                  		<div class="col-md-5" style="font-size:17px">
		                  			<b>last Name :</b> {{emp_details.lname}}<br>
		                  			<b>Email Id :</b> {{emp_details.email}}<br>
		                  			<b>Contact No :</b> {{emp_details.phone}}<br>
		                  			<b>State :</b> {{emp_details.state}}<br>
		                  			<b>Zip :</b> {{emp_details.zip}}
		                  		</div>
		                  	   </div>
		                  		<hr>
		                  		<h3 class="blue"><span class="glyphicon glyphicon-education"></span> Education</h3>
		                  		<div class="row">
		                  		 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		                  		 	<table class="table table-striped table-hover">
		                  				<thead th bgcolor= "#cceeff">
		                  					<tr>
		                  						<th>Deegree</th>
		                  						<th>Institute</th>
		                  						<th>Year</th>
		                  						<th>Marks</th>
		                  					</tr>
		                  				</thead>
		                  				<tbody>
		                  					<tr>
		                  						<td>{{emp_details.quali1}}</td>
		                  						<td>{{emp_details.institute1}}</td>
		                  						<td>{{emp_details.year1}}</td>
		                  						<td>{{emp_details.marks1}}</td>
		                  					</tr>
		                  					<tr>
		                  						<td>{{emp_details.quali2}}</td>
		                  						<td>{{emp_details.institute2}}</td>
		                  						<td>{{emp_details.year2}}</td>
		                  						<td>{{emp_details.marks2}}</td>
		                  					</tr>
		                  					<tr>
		                  						<td>{{emp_details.quali3}}</td>
		                  						<td>{{emp_details.institute3}}</td>
		                  						<td>{{emp_details.year3}}</td>
		                  						<td>{{emp_details.marks3}}</td>
		                  					</tr>
		                  				</tbody>
		                  			</table>
		                  		 </div>
		                  		</div>
		                  		<hr>
		                  		<h3 class="blue"><span class="glyphicon glyphicon-book"></span> Skills</h3>
		                  		<div class="row">
			                  		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			                  			<ul>
											<li>{{emp_details.skill1}} 
												<div class="progress">
	 												 <div class="progress-bar {{colorFinder(emp_details.skill1_val)}} progress-bar-striped active" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: {{widthFinder(emp_details.skill1_val)}};">
	   												{{emp_details.skill1_val}}
	 											    </div>
												</div>
											</li>

											<li>{{emp_details.skill2}}
											<div class="progress">
	 												 <div class="progress-bar {{colorFinder(emp_details.skill2_val)}} progress-bar-striped active" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: {{widthFinder(emp_details.skill2_val)}};">
	   												{{emp_details.skill2_val}}
	 											    </div>
												</div>
											</li>
											<li>{{emp_details.skill3}}
											<div class="progress">
	 												 <div class="progress-bar {{colorFinder(emp_details.skill3_val)}} progress-bar-striped active" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: {{widthFinder(emp_details.skill3_val)}} ;">
	   												{{emp_details.skill3_val}}
	 											    </div>
												</div>
											</li>
											<li>{{emp_details.skill4}}
											<div class="progress">
	 												 <div class="progress-bar {{colorFinder(emp_details.skill4_val)}} progress-bar-striped active" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: {{widthFinder(emp_details.skill4_val)}} ;">
	   												{{emp_details.skill4_val}}
	 											    </div>
												</div>
											</li>
											<li>{{emp_details.skill5}}
											<div class="progress">
	 												 <div class="progress-bar {{colorFinder(emp_details.skill5_val)}} progress-bar-striped active" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: {{widthFinder(emp_details.skill5_val)}}  ;">
	   												{{emp_details.skill5_val}}
	 											    </div>
												</div>
											</li>
										</ul>
		                  			
			                  		</div>
		                  		</div>
		                  		<hr>
		                  		<h3 class="blue"><span class="glyphicon glyphicon-briefcase"></span> Work Experience</h3>
		                  		<div class="row">
		                  			<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
		                  				<ul>
		                  					<li>{{emp_details.job_exp}}</li>
		                  				</ul>
		                  			</div>
		                  		</div>
		                  		<hr>
		                  		<h3 class="blue"><span class="glyphicon glyphicon-eye-open"></span> Training</h3>
		                  		<div class="row">
		                  			<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
		                  				<ul>
		                  					<li>{{emp_details.training}}</li>
		                  				</ul>
		                  			</div>
		                  		</div>
		                  </div>
		                   <!-- /.Section for profile-->
		                   
		                 
		                   <!-- Section for recomended jobs-->
		                  <div id="sectionB" class="tab-pane fade">
		                  		<div class="input-group">
						            <input type="text" class="form-control" ng-model="searchFilter1" placeholder="Search Jobs (Search by Skills, Job title, Company Name, Location)" name="srch_jobs" id="srch_jobs">
						            <div class="input-group-btn">
						                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
						            </div>
					        	</div> <br>
					        	
		                  		<div ng-repeat="rows in recomended_jobs | filter:searchFilter1">
		                  			<h3 class="blue">{{rows.job_title}}</h3>
		                  			<h4><b>Company: </b>{{rows.recruiter}}</h4>
		                  			<h4><b>Skills: </b>{{rows.skills}}</h4>
		                  			<p>{{rows.job_desc}}</p>
		                  			<table class="table table-striped table-hover">
									 	<thead th bgcolor= "#cceeff">
									 		<th>Location</th>
									 		<th>Salary</th>
									 		<th>Contact Person</th>
									 		<th>Email</th>
									 		<th>Phone No.</th>
									 		<th>Last Date</th>
									 		<th></th>
									 	</thead>
									 	<tbody>
									 		<tr>
									 			<td>{{rows.location}}</td>
									 			<td>{{rows.salary}}</td>
									 			<td>{{rows.contact_person}}</td>
									 			<td>{{rows.contact_email}}</td>
									 			<td>{{rows.contact_no}}</td>
									 			<td>{{rows.closing_date}}</td>
									 			<td><button class="btn btn-sm btn-info" data-toggle="modal" href="#modal-apply-{{$index}}">Apply</button></td>
									 		</tr>
									 	</tbody>
									 </table>
									 <hr class="style3">

									 <!-- Modal for apply job-->
									 <div class="modal fade" id="modal-apply-{{$index}}">
									 	<div class="modal-dialog">
									 		<div class="modal-content">
									 			<div class="modal-header">
									 				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									 				<h4 class="modal-title">{{rows.job_title}}</h4>
									 			</div>
									 			<div class="modal-body">
									 				<label>Why We Should Hire you ?? </label>

									 				<textarea class="form-control" id="why" name="why" rows="6" placeholder="Write Why you should be hired" ng-model="why" required></textarea>
									 			</div>
									 			<div class="modal-footer">
									 				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									 				<button type="button" class="btn btn-primary" ng-click="applyJob(rows.jobid,rows.job_title,rows.rid,rows.recruiter)">Apply</button>
									 			</div>
									 		</div>
									 	</div>
									 </div>

									 <!-- /.Modal for apply job-->
		                  		</div>
		                  		
		                  </div>
		                   <!-- /.Section for recomended jobs-->


		                  <!-- Section for Applied jobs-->
		                  <div id="sectionC" class="tab-pane fade">
		                    <div class="input-group">
					            <input type="text" class="form-control" ng-model="searchFilter2" placeholder="Search Application by Job Id, Job title, Company Name, Application Status" name="srch-term" id="srch-term">
					            <div class="input-group-btn">
					                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
					            </div>
					        </div> <br>
			                  <table class="table table-striped table-hover">
			                  	<thead th bgcolor= "#cceeff">
			                  		<tr>
			                  			<th>Job Id</th>
			                  			<th>Job Title</th>
			                  			<th>Company Name</th>
			                  			<th>Status</th>
			                  			<th>Date Applied</th>
			                  			
			                  		</tr>
			                  	</thead>
			                  	<tbody>
			                  		<tr ng-repeat="row in applied_jobs | filter:searchFilter2">
			                  			<td>{{row.appli_no}}</td>
			                  			<td>{{row.job_title}}</td>
			                  			<td>{{row.recruiter_name}}</td>
			                  			<td>{{row.status}}</td>
			                  			<td>{{row.time}}</td>
			                  			
			                  		</tr>
			                  	</tbody>
			                  	
			                  </table>
			               </div>
		                  <!-- /.Section for Applied jobs-->

		                   <!-- Section for inbox-->
		                  <div id="sectionD" class="tab-pane fade">

		                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		                  	
		                  </div>
		                  		
		                  <table class="table table-responsive table-hover table-striped">
			                  	<thead  th bgcolor=" #bf80ff"> 
			                  		<th>From</th>
			                  		<th>Subject</th>
			                  		<th>Mssage</th>
			                  		<th>Time</th>
			                  		<th></th>
			                  	</thead>
			                
			                  	<tbody ng-repeat="rows in inbox">
			                  		<tr>
			                  			<td>{{rows.sender_name}}</td>
			                  			<td>{{rows.subj}}</td>
			                  			<td>{{rows.content.slice(0,15)}}..</td>
			                  			<td>{{rows.time.slice(0,16)}}</td>
			                  			<td><a data-toggle="modal" href="#modal-msg-{{$index}}"><span class="glyphicon glyphicon-eye-open"></span>/<span class="glyphicon glyphicon-share-alt"></span></a></td>
			                  		</tr>
			                  		
			                  	</tbody>

			                  	</table>

			                  	<!-- Modal for read msg and reply-->
			                  	<div ng-repeat="rows in inbox">
									<div class="modal fade" id="modal-msg-{{$index}}">
										<div class="modal-dialog">
											<div class="modal-content">

												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4 class="modal-title blue">Message</h4>
												</div>

												<div class="modal-body">
												
													<label>From   : </label>{{rows.sender_name}} (<a>{{rows.senderEmail}}</a>)<br>
													<label>Subject : </label> {{rows.subj}}<br>
													<p>{{rows.content}}</p>
													<span align="left" class="glyphicon glyphicon-time"> {{rows.time.slice(0,16)}}</span>
													<br><br>
													
												</div>
												<div class="modal-footer">

												<form method="POST" name="sendMsg">
													
													<div class=" form-group col-xs-12 col-sm-12 col-md-12 col-lg-12" align="left">
														<label>Reply</label>
													</div>
													<div class="form-group col-xs-8 col-sm-8 col-md-8 col-lg-8">
														<input type="text" class="form-control" name="subj" placeholder="Subject" ng-model="msg_subj" required>
													</div>
													<div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
														<h4 class="green"><span  ng-show="sendMsg.subj.$valid" class="glyphicon  glyphicon-ok"></span></h4>
														<h4 class="red"><span  ng-show="!sendMsg.subj.$valid" class="glyphicon  glyphicon-exclamation-sign"></span></h4>
													</div>
														
													<div class="form-group col-xs-10 col-sm-10 col-md-10 col-lg-10">
														<textarea class="form-control" id="cont" name="cont" rows="6" placeholder="Write your msg here" ng-model="msg_cont" required></textarea>
													</div>
													<div class="form-group col-xs-2 col-sm-2 col-md-2 col-lg-2">
														<h4 class="green"><span  ng-show="sendMsg.cont.$valid" class="glyphicon  glyphicon-ok"></span></h4>
														<h4 class="red"><span  ng-show="!sendMsg.cont.$valid" class="glyphicon  glyphicon-exclamation-sign"></span></h4>
													</div>
					
														

													<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12" align="left">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
														<button type="button" class="btn btn-primary" ng-click="sendMsg.$valid &&   sendReply(rows.sender,rows.sender_name,rows.senderEmail,msg_subj,msg_cont)">Reply</button>
													</div>
														
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!--/. Modal for read msg and reply-->

		                  </div>
		                   <!-- /.Section for inbox-->

		                  <!-- Section for edit profile-->
		                  <div id="sectionE" class="tab-pane fade">
		                  		<?php include("edit_form.php"); ?>
		                  </div>
		                  <!-- /.Section for edit profile-->

		              </div>

		            </div>
	           </div>
</div>
</div>

<!--Footer-->

<?php include 'includes/footer.php'; ?>

<!--/.Footer-->
	</body>
</html>
<script>
	var emp_app = angular.module('emp_app', []);


	emp_app.controller('empController',function ($scope, $http) {
			

		$scope.options=["Beginner","Intermediate","Expert"];
		//at starting of app
		$http.get('emp_details.php')
			.success(function(data){
				$scope.emp_details=data;
				$scope.getRecomendedJobs();
				$scope.getAppliedJobs();
				$scope.inboxData();

				$scope.title=data.title;
				$scope.desc=data.description;
				$scope.fname=data.fname;
				$scope.lname=data.lname;
				$scope.email=data.email;
				$scope.phone=data.phone;
				$scope.city=data.city;
				$scope.state=data.state;
				$scope.country=data.country;
				$scope.zip=data.zip;

				$scope.quali1=data.quali1;
				$scope.institute1=data.institute1;
				$scope.year1=data.year1;
				$scope.marks1=data.marks1;

				$scope.quali2=data.quali2;
				$scope.institute2=data.institute2;
				$scope.year2=data.year2;
				$scope.marks2=data.marks2;

				$scope.quali3=data.quali3;
				$scope.institute3=data.institute3;
				$scope.year3=data.year3;
				$scope.marks3=data.marks3;

				$scope.skill1=data.skill1;
				$scope.skill1_val=data.skill1_val;

				$scope.skill2=data.skill2;
				$scope.skill2_val=data.skill2_val;

				$scope.skill3=data.skill3;
				$scope.skill3_val=data.skill3_val;

				$scope.skill4=data.skill4;
				$scope.skill4_val=data.skill4_val;

				$scope.skill5=data.skill5;
				$scope.skill5_val=data.skill5_val;

				$scope.job_exp=data.job_exp;
				$scope.training= data.training;

			})

		//getting employee details

		$scope.getDetails=function(){

			$http.get('emp_details.php')
			.success(function(data){
				$scope.emp_details=data;

				$scope.title=data.title;
				$scope.desc=data.description;
				$scope.fname=data.fname;
				$scope.lname=data.lname;
				$scope.email=data.email;
				$scope.phone=data.phone;
				$scope.city=data.city;
				$scope.state=data.state;
				$scope.country=data.country;
				$scope.zip=data.zip;

				$scope.quali1=data.quali1;
				$scope.institute1=data.institute1;
				$scope.year1=data.year1;
				$scope.marks1=data.marks1;

				$scope.quali2=data.quali2;
				$scope.institute2=data.institute2;
				$scope.year2=data.year2;
				$scope.marks2=data.marks2;

				$scope.quali3=data.quali3;
				$scope.institute3=data.institute3;
				$scope.year3=data.year3;
				$scope.marks3=data.marks3;

				$scope.skill1=data.skill1;
				$scope.skill1_val=data.skill1_val;

				$scope.skill2=data.skill2;
				$scope.skill2_val=data.skill2_val;

				$scope.skill3=data.skill3;
				$scope.skill3_val=data.skill3_val;

				$scope.skill4=data.skill4;
				$scope.skill4_val=data.skill4_val;

				$scope.skill5=data.skill5;
				$scope.skill5_val=data.skill5_val;

				$scope.job_exp=data.job_exp;
				$scope.training= data.training;
			})
		}

		//function to edit profile details
		//$scope.editProfile=function(){
		//	$http.post()
		//}

		//function to find width of progress bar
		$scope.widthFinder=function(skill){
			$width='';
			if (skill=="Beginner")
				$width='25%';

			else if (skill=="Intermediate")
				$width='50%';

			else if (skill="Expert")
				$width='95%';

			else
				$width='5%';

			return $width;
		}



		//function to find color of progressbar
		$scope.colorFinder=function(skill){

			$color='';

			if (skill=="Beginner")
				$color="progress-bar-warning";

			else if (skill=="Intermediate")
				$color="progress-bar-info";

			else if (skill="Expert")
				$color="progress-bar-success";

			else
				$color="progress-bar-danger";

			return $color;
		}

		//function to get recomended jobs
		$scope.getRecomendedJobs=function(){
			$http.get("recomendedjobs.php")
			.success(function(data){
				$scope.recomended_jobs = data;
			})
			.error(function() {
				$scope.recomended_jobs = "error in fetching data";
			});
		}

		//function to apply job
		$scope.applyJob=function(jobid,job_title,rid,recruiter){
			$http.post('apply_job.php',{'jobid':jobid,'job_title':job_title,'rid':rid,'recruiter':recruiter})
			.success(function(data){
				alert(data);

				$scope.getAppliedJobs();
			})
		}

		//function to fetch applied jobs details
		$scope.getAppliedJobs=function(){
			$http.get("appliedjobs.php")
			.success(function(data){
				$scope.applied_jobs = data;
			})
			.error(function() {
				$scope.applied_jobs = "error in fetching data";
			});
		}

		//function for fetching inbox
		$scope.inboxData=function(){
			$http.get('inbox.php')
			.success(function(inbox){
				$scope.inbox=inbox;
			})
		}

		//function  for sending msg
		$scope.sendReply=function(sender,sender_name,sender_email,msg_subj,msg_cont){
			$to=sender;
			$to_email=sender_email;
			$to_name=sender_name;
			$msg_subj=msg_subj;
			$msg_cont=msg_cont;
			$http.post('send_msg.php',{'msg_sub':$msg_subj, 'msg_cont':$msg_cont,'to':$to,'to_email':$to_email,'to_name':$to_name})
			.success(function(data){
				alert(data);
			})
		}

		$scope.editDetails= function(){
			$http.post('emp_details_edit.php',{'title':$scope.title,'desc':$scope.desc,'email':$scope.email,'phone':$scope.phone,'city':$scope.city,'state':$scope.state,'country':$scope.country,'zip':$scope.zip,'quali1':$scope.quali1,'institute1':$scope.institute1,'year1':$scope.year1,'marks1':$scope.marks1,'quali2':$scope.quali2,'institute2':$scope.institute2,'year2':$scope.year2,'marks2':$scope.marks2,'quali3':$scope.quali3,'institute3':$scope.institute3,'year3':$scope.year3,'marks3':$scope.marks3,'skill1':$scope.skill1,'skill1_val':$scope.skill1_val,'skill2':$scope.skill2,'skill2_val':$scope.skill2_val,'skill3':$scope.skill3,'skill3_val':$scope.skill3_val,'skill4':$scope.skill4,'skill4_val':$scope.skill4_val,'skill5':$scope.skill5,'skill5_val':$scope.skill5_val,'job_exp':$scope.job_exp,'training':$scope.training})
			.success(function(data){
				alert(data);

				//refreshing updated details
				$scope.getDetails();
				$scope.getRecomendedJobs();
			})
		}

	});

</script>
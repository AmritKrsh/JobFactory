<?php
include("includes/session.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <?php 
    include("includes/header.php"); 
    ?> 


  </head>
  <body ng-app="recApp" ng-controller="recController">
  <div class="container-fluid" style="background-color: #f2f2f2">
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
	            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Employees<span class="caret"></span></a>
	            <ul class="dropdown-menu" role="menu">
	              <li><a href="#">By Location</a></li>
	              <li><a href="#">By Skills</a></li>
	              <li><a href="#">By Experience</a></li>

	            </ul>
	          </li>
	        </ul>
	        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
		        <form class="navbar-form" role="search">
			        <div class="input-group">
			            <input type="text" class="form-control" placeholder="Search Employees" name="srch-term" id="srch-term">
			            <div class="input-group-btn">
			                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
			            </div>
			        </div>
		        </form>
		    </div>
		     <ul class="nav navbar-nav navbar-right"  style="font-size:18px" ng-repeat="rec in data">
		          <li class="dropdown">

		            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><img src="{{rec.image}}" class="img-circle special-img" height="35px" width="35px">{{rec.name}}<b class="caret"></b></a>
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

<div class="container">
 <div class="panel panel-default">
 	<div class="panel-body" ng-repeat="rec in data">
 		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
		 	<img class="img-responsive img-thumbnail" height="400px" width="300px" src={{rec.image}}>
		 </div>
		 <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
		 	<h2>{{rec.name}}</h2>
		 	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		 		<h4><span class="glyphicon glyphicon-globe">&nbsp;</span><a href="http://{{rec.website}}" target="_blank">{{rec.website}}</a></h4>
		 	</div>
		 	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		 		<h4><span class="glyphicon glyphicon-map-marker">&nbsp;</span>{{rec.city}},{{rec.state}} - {{rec.zip}},{{rec.country}} </h4>
		 	</div>
		 	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		 		<p>{{rec.description}}</p>
		 	</div>
		 	
		 	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
		 		<h4><span class="glyphicon glyphicon-envelope">&nbsp;</span>{{rec.email}}</h4>
		 	</div>
		 	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
		 		<h4><span class="glyphicon glyphicon-phone">&nbsp;</span>{{rec.phone}}<h4>
		 	</div>
		 	 
		 </div>
 	</div>
 </div>
</div>
<div class="container">
		<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
			<hr class="style2">
			<div class="panel nav-tabs">
		            <div class="panel-heading">
		                <ul class="nav nav-tabs">
		                    <li class="active"><a href="#sectionA" data-toggle="tab">Post jobs</a></li>
		                    <li><a href="#sectionB" data-toggle="tab">Posted Jobs</a></li>
		                    <li><a href="#sectionC" data-toggle="tab">Inbox</a></li>
		                    <li><a href="#sectionD" data-toggle="tab">Edit Profile</a></li>
		                </ul>
		            </div>
			        <div class="panel-body">
			            <div class="tab-content" id="myTabContent">
			            	<div id="sectionA" class="tab-pane fade in active">
			            			
			            			<!-- job post success alert box-->
				            		<div class="alert alert-success" ng-show='alertValuePost'>
				            			<strong>Job Posted Successfully!</strong> post another job ...
				            		</div>
			            			
			            			<!-- Delete job post alert box-->
			            			<div class="alert alert-danger" ng-show='alertvalueDelete'>
			            				<strong>Post Deleted..!!</strong>
			            			</div>

			            		<h2>Post New Job</h1>

			            		<!-- Job Post form-->
			            		<form method="POST" name="postJob">
			            			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
				            			<input class="form-control" type="text" name="title" placeholder="Job Title" ng-model="job_title" required>
			            			</div>
			            			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
			            				<label> Job Description</label>
			            				<textarea class="form-control" name="job_desc" ng-model="job_desc" required></textarea>
			            			</div>
			            			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
			            				<input class="form-control" type="text" name="skills" placeholder="Required Skills (seperate skills by comma)" ng-model="skills" required>
			            			</div>
			            			<div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
			            				<input class="form-control" type="text" name="salary" placeholder="Salary" ng-model="salary" required>
			            			</div>
			            			<div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
			            				<input class="form-control" type="text" name="location" placeholder="Job location" ng-model="job_loc" required>
			            			</div>

			            			<div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
			            				<input class="form-control" type="text" name="closing_date" placeholder="Last Date (YYYY-MM-DD)" ng-model="closing_date" required>
			            			</div>
			            			<div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
			            				<input class="form-control" type="text" name="interview_date" placeholder="Interview Date (YYYY-MM-DD)" ng-model="interview_date" required>
			            			</div>

			            			<div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
			            				<input class="form-control" type="text" name="contact_person" placeholder="Contact Person Name" ng-model="contact_person" required>
			            			</div>
			            			<div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
			            				<input class="form-control" type="email" name="contact_email" placeholder="Contact Email" ng-model="contact_email" required>
			            			</div>
			            			<div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
			            				<input class="form-control" type="text" name="contact_number" placeholder="Contact Number" ng-model="contact_number" required> 
			            			</div>
			            			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
			            				<button type="submit" name="btn_post" class="btn btn-primary" ng-click="postJob.$valid && jobPost()">Post Job</button>
			            			</div>
			            			
			            		<br><br>
			            		</form>
			            		
			            		<!--/.Job Post form-->
			            		
			            	<h2>Recent Job Posts</h2>
			            	<hr>
			            			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" ng-repeat="rows in jobsData| limitTo: 2">
						                <h4 class="blue">{{rows.job_title}}</h4>
								    	<p style="font-size:16px"><b>Required Skills: </b> {{rows.skills}} </p>
								    	<p  style=\"font-size:16px\">{{rows.job_desc}}</p>
								    	<table class="table table-striped table-hover">
										 	<thead th bgcolor= "#cceeff" >
										 		<th>Location</th>
										 		<th>Salary</th>
										 		<th>Contact Person</th>
										 		<th>Email</th>
										 		<th>Closing Date</th>
										 		<th>Interview Date</th>
										 		<th></th>
										 	</thead>
										 	<tbody>
										 		<tr>
										 			<td>{{rows.location}}</td>
										 			<td>{{rows.salary}}</td>
										 			<td>{{rows.contact_person}}</td>
										 			<td>{{rows.contact_email}}</td>
										 			<td>{{rows.closing_date}}</td>
										 			<td>{{rows.interview_date}}</td>
										 			<td>
										 			<a data-toggle="modal" href='#edit-post-model-{{$index}}'><span class="glyphicon glyphicon-pencil"></span></a>
										 			&nbsp;&nbsp;&nbsp;
										 			<a href=""><span class="glyphicon glyphicon-trash" ng-click='deletePost(rows.jobid)'> </span></a>

										 			</td>


										 		</tr>
										 	</tbody>

										 </table>
										
										<hr class=\"style3\">

										<!-- Modal for edit post-->
										<div class="modal fade" id="edit-post-model-{{$index}}">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<h4 class="modal-title blue">{{rows.job_title}}</h4>
													</div>
													<div class="modal-body">
														
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
														<button type="button" class="btn btn-primary">Update</button>
													</div>
												</div>
											</div>
										</div>
										<!--/. Modal for edit post-->

				                	</div>  
			            	</div>


			            	<!--section for All posted jobs-->

			            	<div id="sectionB" class="tab-pane fade">
			            		<div class="input-group">
									  <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
									  <input type="text" class="form-control" placeholder="Search Posted Jobs" aria-describedby="basic-addon1" ng-model="jobFilter">
								</div>
								<br>

				                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" ng-repeat="rows in jobsData| filter:jobFilter">


					                <h4 class="blue">{{rows.job_title}}</h4>
							    	<p style="font-size:16px"><b>Required Skills: </b> {{rows.skills}} </p>
							    	<p  style=\"font-size:16px\">{{rows.job_desc}}</p>
							    	<table class="table table-striped table-hover">
									 	<thead th bgcolor= "#cceeff" >
									 		<th>Location</th>
									 		<th>Salary</th>
									 		<th>Contact Person</th>
									 		<th>Email</th>
									 		<th>Closing Date</th>
									 		<th>Interview Date</th>
									 		<th></th>
									 	</thead>
									 	<tbody>
									 		<tr>
									 			<td>{{rows.location}}</td>
									 			<td>{{rows.salary}}</td>
									 			<td>{{rows.contact_person}}</td>
									 			<td>{{rows.contact_email}}</td>
									 			<td>{{rows.closing_date}}</td>
									 			<td>{{rows.interview_date}}</td>
									 			<td>
									 				<a data-toggle="modal" href='#view-applicants-model-{{$index}}' ng-click='viewApplicant(rows.jobid)'><span class="glyphicon glyphicon-list"></span>
									 				</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										 			<!--<a data-toggle="modal" href='#edit-post-model-{{$index}}'><span class="glyphicon glyphicon-pencil"></span></a>
										 			&nbsp;&nbsp;&nbsp; -->
											 		<a href=""><span class="glyphicon glyphicon-trash" ng-click='deletePost(rows.jobid)'> </span></a>
									 			</td>
									 		</tr>
									 	</tbody>

									 </table>
									
									<hr class=\"style3\">

									<!-- Modal for edit post-->
									<div class="modal fade" id="edit-post-model-{{$index}}">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4 class="modal-title blue">{{rows.job_title}}</h4>
												</div>
												<div class="modal-body">
													
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>
									<!--/. Modal for edit post-->

									<!-- Modal for view applicant-->
									<div class="modal fade" id="view-applicants-model-{{$index}}">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4 class="modal-title blue">{{rows.job_title}}</h4>
												</div>
												<div class="modal-body">
												<table class=" table table-responsive table-hover">
													<thead th-color="">
														<th>Applicant Name</th>
														<th>Status</th>
														<th>Time</th>
													</thead>

													<tbody>
														<tr ng-repeat="rows in applicants">
																<td>{{rows.applicant_name}}</td>
																<td>{{rows.status}}</td>
																<td>{{rows.time}}</td>
														</tr>
													</tbody>
													
												</table>
													
												</div>
												<div class="modal-footer">
													
													<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>
									<!--/. Modal for view applicant-->


				                </div>  	
								
							</div>
							<!-- /.section for All posted jobs-->


			                <!-- Section for inbox-->
			                <div id="sectionC" class="tab-pane fade">
			                  	<table class="table table-responsive table-hover table-striped">
			                  	<thead>
			                  		<th>Sender</th>
			                  		<th>Subject</th>
			                  		<th>Mssage</th>
			                  		<th>Time</th>
			                  		<th></th>
			                  	</thead>
			                  	<tbody>
			                  		<tr ng-repeat="rows in inbox">
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
			                <div id="sectionD" class="tab-pane fade">


			                	<!-- Edit profile form-->
			                	<form method="POST" role="form" name="editProfile">
									<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<h4 class="blue">Edit Details</h4>
									</div>
									<div class=" form-group col-xs-12 col-sm-9 col-md-9 col-lg-9">
											<label>Company Name:</label>
											<input type="text" ng-model="id" hidden>
											<input id="title" type="text" class="form-control" name="name" placeholder="Company Name" disabled ng-model="name">
											<label>Description:</label>
											<textarea class="form-control" id="desc" name="desc" rows="6" placeholder="Description about Company and it's work" ng-model="desc" required></textarea>
									</div>

									<div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<label>Location:</label>
										<input id="location" type="text" class="form-control" name="loc" placeholder="Company Headquater" ng-model="location" required>
									</div>

									<div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<label>Website:</label>
										<input id="website" type="text" class="form-control" name="website" placeholder="Website" ng-model="website" required>
									</div>

									<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<h4 class="blue">Contact Details</h4>
									</div>

									<div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<label>Email:</label>
										<input id="email" type="email" class="form-control" name="email" placeholder="Email Id" ng-model="email" required>
									</div>

									<div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<label>Contact No:</label>
										<input id="phone" type="text" class="form-control" name="phone" value="<?php echo"$phone"; ?>" placeholder="Contact No." ng-model="phone" required>
									</div>

									<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<h4 class="blue">Address Details</h4>
									</div>	

									<div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
										<label>Zip:</label>
										<input id="zip" type="text" class="form-control" name="zip" placeholder="Zip Code" ng-model="zip" required>
									
									</div>

									<div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
										<label>City:</label>
										<input id="city" type="text" class="form-control" name="city" placeholder="City" ng-model="city" required>
									</div>
									<div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
										<label>State:</label>
										<input id="state" type="text" class="form-control" name="state" placeholder="State" ng-model="state" required>
									</div>
									<div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
										<label>Country:</label>
										<input id="country" type="text" class="form-control" name="country" placeholder="Country" ng-model="country" required>
									</div>
									
									<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<button type="submit" name='btn_edit' class="btn btn-primary" ng-click="editProfile.$valid && editDetails()">Update Details</button>
									</div>
								</form>
								<!-- /.Edit profile form-->	

			                </div>
			                <!-- /.Section for edit profile-->

			            </div>
			        </div>
			</div>
		</div>
<script>
	var app = angular.module('recApp',[]);

	app.controller('recController', function($scope,$http){


		$scope.alertValuePost=0;
		$scope.alertvalueDelete=0;
		//getting recruiter details 
		$http.get('rec_details.php')
		.success(function(data){
			$scope.data=data;
			$scope.id=data[0].uid;
			$scope.name=data[0].name;
			$scope.desc=data[0].description;
			$scope.location=data[0].headquater;
			$scope.website=data[0].website;
			$scope.email=data[0].email;
			$scope.phone=data[0].phone;
			$scope.zip=data[0].zip;
			$scope.city=data[0].city;
			$scope.state=data[0].state;
			$scope.country=data[0].country;

			//display posted jobs
			$scope.displayJobs();

			//display inbox content
			$scope.inboxData();

		})
		.error(function(data){
			$scope.data="error in fetchig data";
		});


	//posting edited details to rec_edit.php

	$scope.editDetails= function(){
		$http.post('rec_edit.php',{'name':$scope.name, 'desc':$scope.desc,'location':$scope.location,'website':$scope.website,'email':$scope.email,'phone':$scope.phone,'zip':$scope.zip,'city':$scope.city,'state':$scope.state,'country':$scope.country})
		.success(function(data,status,headers,config){
			alert(data);
			$scope.displayData();
		})
	}

	//function to post jobs

	$scope.jobPost= function(){
		$http.post('post_job.php',{'recruiter':$scope.name, 'title':$scope.job_title,'desc':$scope.job_desc,'location':$scope.job_loc,'salary':$scope.salary,'skills':$scope.skills,'cont_per':$scope.contact_person,'cont_email':$scope.contact_email,'cont_no':$scope.contact_number,'last_date':$scope.closing_date,'interv_date':$scope.interview_date})
		.success(function(data){
			

			if (data=='yes'){
				//refresh posted jobs list
				$scope.displayJobs();

				//clear the feilds
				$scope.clearFields();
				$scope.alertValuePost=1;
				$scope.alertvalueDelete=0;
			}
				
		})
	}

	//function to delete post
	$scope.deletePost=function(job_id){
		$http.post("delete_post.php",{'job_id':job_id})
		.success(function(data){
			if (data=='yes')
				//refresh posted jobs
				$scope.displayJobs();
				$scope.alertValuePost=0;
				$scope.alertvalueDelete=1;
		})
	}


	//function to display recruiter details
	$scope.displayData=function(){
		$http.get("rec_details.php")
		.success(function(data){
			$scope.data=data;
			$scope.id=data[0].uid;
			$scope.name=data[0].name;
			$scope.desc=data[0].description;
			$scope.location=data[0].headquater;
			$scope.website=data[0].website;
			$scope.email=data[0].email;
			$scope.phone=data[0].phone;
			$scope.zip=data[0].zip;
			$scope.city=data[0].city;
			$scope.state=data[0].state;
			$scope.country=data[0].country;
		})
	}

	//function to display the posted jobs details
	$scope.displayJobs=function(){
		$http.get('posted_jobs.php')
		.success(function(jobsData){
			$scope.jobsData=jobsData;

		})
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

	//function for clearing the job post form
	$scope.clearFields= function(){
		$scope.job_title='';
		$scope.job_desc='';
		$scope.job_loc='';
		$scope.salary='';
		$scope.skills='';
		$scope.contact_person='';
		$scope.contact_email='';
		$scope.contact_number='';
		$scope.closing_date='';
		$scope.interview_date='';

	}


	$scope.viewApplicant= function(jobid){

		$http.post('view_applicants.php',{'jobid':jobid})
		.success(function(data){
			$scope.applicants=data;

		})

	}

	/*$scope.setApplicants=function(){
		$http.get('view_applicants.php')
		.success(function(data){
			$scope.applicants=data;
			alert(data);
		})
	}
	*/

	});

</script>
		
	
</div>

<!--Footer-->

<?php include 'includes/footer.php'; ?>

<!--/.Footer-->

 </body>
</html>
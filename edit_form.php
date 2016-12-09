	<form method="POST" role="form" name="editForm">
				<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<h3>Personal Details</h3>
				</div>
				<div class=" form-group col-xs-12 col-sm-9 col-md-9 col-lg-9">
					<label>Title:</label>
					<input id="title" type="text" class="form-control" name="title" placeholder="Write Job Title" ng-model="title" required>
					
					<label>Description:</label>
					<textarea class="form-control" id="desc" name="desc" rows="6" placeholder="Write Description about you and your profession" ng-model="desc" required></textarea>
				</div>
				
				<div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
					<label>First Name:</label>
					<input id="fname" type="text" class="form-control" name="fname" placeholder="First Name" ng-model="fname"   Disabled required>
				</div>
				<div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
					<label>last Name:</label>
					<input id="lname" type="text" class="form-control" name="lname" placeholder="Last Name" ng-model="lname"  Disabled required>
				</div>
				<div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
					<label>Email:</label>
					<input id="email" type="email" class="form-control" name="email" placeholder="Email Id" ng-model="email" required>
				</div>
				<div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
					<label>Contact No:</label>
					<input id="phone" type="text" class="form-control" name="phone" placeholder="Contact No." ng-model="phone" required>
				</div>
					<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<h4>Address Details</h4>
					</div>
					<div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<input id="city" type="text" class="form-control" name="city" placeholder="City" ng-model="city" required>
					</div>
					<div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<input id="state" type="text" class="form-control" name="state" placeholder="State" ng-model="state" required>
					</div>
					<div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<input id="country" type="text" class="form-control" name="country" placeholder="Country" ng-model="country" required>
					</div>
					<div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<input id="zip" type="text" class="form-control" name="zip" placeholder="Zip Code" ng-model="zip" required>
					
					</div>

					
				
				<!-- Education Details-->
				<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<hr>
						<h3> Education Details </h3>
				</div>
				
				<div class="form-group form-inline form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<label>1:</label>
					<input id="quali1" type="text" class="form-control" name="quali1" placeholder="Degree" ng-model="quali1" required>
					<input id="institute1" type="text" class="form-control" name="institute1" placeholder="Institute Name" ng-model="institute1" required>
					<input id="year1" type="text" class="form-control" name="year1" placeholder="Year of Passing" ng-model="year1" required>
					<input id="marks1" type="text" class="form-control" name="marks1" placeholder="Marks" ng-model="marks1" required>
				</div>
				<div class="form-group form-inline form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<label>2:</label>
					<input id="quali2" type="text" class="form-control" name="quali2" placeholder="Degree" ng-model="quali2" required>
					<input id="institute2" type="text" class="form-control" name="institute2" placeholder="Institute Name"  ng-model="institute2" required>
					<input id="year2" type="text" class="form-control" name="year2" placeholder="Year of Passing" ng-model="year2" required>
					<input id="marks2" type="text" class="form-control" name="marks2" placeholder="Marks" ng-model="marks2" required>
				</div>
				<div class="form-group form-inline form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<label>3:</label>
					<input id="quali3" type="text" class="form-control" name="quali3" placeholder="Degree" ng-model="quali3">
					<input id="institute3" type="text" class="form-control" name="institute3" placeholder="Institute Name" ng-model="institute3">
					<input id="year3" type="text" class="form-control" name="year3" placeholder="Year of Passing" ng-model="year3">
					<input id="marks3" type="text" class="form-control" name="marks3" placeholder="Marks" ng-model="marks3" required>
				</div>
				<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<hr>
					<h3>Skills</h3>
				</div>
				<div class="form-group form-inline form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<label>1.</label>
					<input id="skill1" type="text" class="form-control" name="skill1" placeholder="skill 1" ng-model="skill1">
					<select class="form-control" name="skill1_val" ng-model="skill1_val" ng-options="x for x in options" required ></select>
                 </div>
                 <div class="form-group form-inline form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                 	<label>2.</label>
					<input id="skill2" type="text" class="form-control" name="skill2" placeholder="skill 2" ng-model="skill2">
					<select class="form-control" name="skill2_val" ng-model="skill2_val" ng-options="x for x in options" required >
                 	</select>
				 </div>
				 <div class="form-group form-inline form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
				 	<label>3.</label>
					<input id="skill3" type="text" class="form-control" name="skill3" placeholder="skill 3" ng-model="skill3">
					<select class="form-control" name="skill3_val" ng-model="skill3_val" required >						
	                    <option>Beginner</option>
	                    <option>Intermediate</option>
	                    <option>Expert</option>
                 	</select>
                 </div>
				 <div class="form-group form-inline form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
				 	<label>4.</label>
					<input id="skill4" type="text" class="form-control" name="skill4" placeholder="skill 4" ng-model="skill4">
					<select class="form-control" name="skill4_val" ng-model="skill4_val" required >
	                    
	                    <option>Beginner</option>
	                    <option>Intermediate</option>
	                    <option>Expert</option>
                 	</select>
				</div>
				<div class="form-group form-inline form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<label>5.</label>
					<input id="skill5" type="text" class="form-control" name="skill5" placeholder="skill 5" ng-model="skill5">
					<select class="form-control" name="skill5_val" ng-model="skill5_val" required >
	                    
	                    <option>Beginner</option>
	                    <option>Intermediate</option>
	                    <option>Expert</option>
                 	</select>
				</div>
				<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<hr>
					<h3>Work Experience</h3>
				</div>
				<div class="form-group form-horizontal form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<input id="job_exp" type="text" class="form-control" name="job_exp" placeholder="Write about job Experience" ng-model="job_exp">
				</div>
				<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<hr>
					<h3>Training Detail</h3>
				</div>
				<div class="form-group form-horizontal form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<input id="training" type="text" class="form-control" name="training" placeholder="Write about training details" ng-model="training">
				</div>
				<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<button type="submit" name='btn_edit' class="btn btn-primary" ng-click="editForm.$valid  && editDetails()" >Update Details</button>
				</div>
	</form>
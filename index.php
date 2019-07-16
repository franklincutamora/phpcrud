<?php
 if(isset($_POST) & !empty($_POST)){
	 $fname = $database->sanitize($_POST['fname']);
	 $lname = $database->sanitize($_POST['lname']);
	 $email = $database->sanitize($_POST['email']);
	 $gender = $_POST['gender'];
	 $age = $_POST['age'];

	 $res = $database->create($fname, $lname, $email, $gender, $age);
	 if($res){
	 	echo "Successfully inserted data";
	 }else{
	 	echo "failed to insert data";
	 }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Simple CRUD Application in OOP PHP - Create</title>
	<!-- CSS libraries -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" >

	<!-- JS libraries -->
	<script src="assets/js/jquery-2.1.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container" style="margin-top: 20px; margin-bottom: 20px;">
	<div class="row">
		<button type="button" name="addButton" id="addButton" class="btn btn-success btn-xs">Add Person</button>
	</div>
</div>
<div class="container">
	<div class="row">
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Full Name</th>
					<th>E-Mail</th>
					<th>Gender</th>
					<th>Age</th>
					<th>Extras</th>
				</tr>
			</thead>
			<tbody></tbody>
		</table>
	</div>
</div>
<div id="apicrudModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post" id="entryForm">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add Person</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="firstname">Enter First Name</label>
						<input type="text" name="firstname" id="firstname" class="form-control" required />
					</div>
					<div class="form-group">
						<label for="lastname">Enter Last Name</label>
						<input type="text" name="lastname" id="lastname" class="form-control" required />
					</div>
					<div class="form-group">
			    	<label for="email">E-Mail</label>
			      <input type="email" name="email"  class="form-control" id="email" placeholder="email@domainname.com" required />
			    </div>
					<div class="form-group" class="radio">
						<label for="gender">Gender</label>
						<label><input type="radio" name="gender" value="male" checked> Male</label>
						<label><input type="radio" name="gender" value="female"> Female</label>
					</div>
					<div class="form-group">
						<label for="age">Age</>
						<select name="age" id="age" class="form-control">
							<option value="18">Select Your Age</option>
							<option value="20">20</option>
							<option value="21">21</option>
							<option value="22">22</option>
							<option value="23">23</option>
							<option value="24">24</option>
							<option value="25">25</option>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="hiddenId" id="hiddenId" />
					<input type="hidden" name="action" id="action" value="insert" />
					<input type="submit" name="buttonAction" id="buttonAction" class="btn btn-info" value="Submit" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
  </div>
</div>
<script src="assets/js/main.js"></script>
</body>
</html>
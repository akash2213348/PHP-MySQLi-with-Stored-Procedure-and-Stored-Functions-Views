<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
		<meta charset="utf-8">
		<title>PHP MySQLi</title>
		
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<script src="js/jQuery-2.1.4.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		
		<script src="js/get-users.js"></script>
		<script src="js/add-user.js"></script>
		<script src="js/delete-user.js"></script>
		<script src="js/edit-user.js"></script>
		<script src="js/update-user.js"></script>
		
		<style>
		
			#error-name, #error-age, #error-address, #error-edit-name, #error-edit-age, #error-edit-address{
				color: red;
				font-size: 80%;
			}
			
			#add-user, #user-list, #edit-user-form{
				padding: 30px;
				box-shadow: 0px 0px 10px lightgrey;
			}
			
			#edit-form{
				display: none;
			}
		</style>
		
		<script>
		
			function numberValidate(evt) {
			  	var theEvent = evt || window.event;
			  	var key = theEvent.keyCode || theEvent.which;
			  	key = String.fromCharCode( key );
			  	var regex = /[0-9]|\./;
			  	if( !regex.test(key) ) {
			    	theEvent.returnValue = false;
			    	if(theEvent.preventDefault) theEvent.preventDefault();
			  	}
			}

			function removeErrorTemplate(formInputId){
				document.getElementById("error-"+formInputId).innerHTML = "";
			}
		
			function validateUserForm(){
				
				var user_name, user_age, user_address, nameError, ageError, addressError;
				
				var error = 0;
				
				user_name 	 = document.getElementById("name").value;
				user_age 	 = document.getElementById("age").value;
				user_address = document.getElementById("address").value;
				
				nameError 	 = "";
				ageError 	 = "";
				addressError = "";
				
				if(user_name === ""){
					nameError = "Please fill the field. ";
					error = 1;
				}
				
				if(user_age === ""){
					ageError = "Please fill the field. ";
					error = 1;
				}
				
				if(user_address === ""){
					addressError = "Please fill the field. ";
					error = 1;
				}
				
				if(error === 1){
					
					document.getElementById("error-name").innerHTML 	= nameError;
					document.getElementById("error-age").innerHTML 		= ageError;
					document.getElementById("error-address").innerHTML  = addressError;

				}
				if(error === 0){
					addNewUser(user_name, user_age, user_address);
				}
				
				return false;
			
			}

		</script>
		
	</head>
	
	<body onload="doSomething()">
	
		<div class="row">
			
			<div class="col-md-4"></div>
			
			<div class="col-md-4">
			
				<h3><b>Add New User</b></h3><br>
				<form id="add-user" onsubmit="return validateUserForm();">
				
					<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control" onfocus="removeErrorTemplate(this.id)" autocomplete="off" id="name" placeholder="Your name" />
						<div id="error-name"></div>
					</div>
				
					<div class="form-group">
						<label>Age</label>
						<input type="text" class="form-control" onkeypress="numberValidate(event)" onfocus="removeErrorTemplate(this.id)" autocomplete="off" id="age" placeholder="Your age" />
						<div id="error-age"></div>
					</div>
				
					<div class="form-group">
						<label>Address</label>
						<textarea class="form-control" onfocus="removeErrorTemplate(this.id)" id="address" placeholder="Your address"></textarea>
						<div id="error-address"></div>
					</div>
					
					<button type="submit" class="btn btn-success">Submit</button>
				
				</form>
				
			</div>
			
			<div class="col-md-4"></div>
			
		</div>
		
		<br><br>
		
		<div class="row">
		
			<div class="col-md-4"></div>
			
			<div class="col-md-4">
			
				<table class="table table-striped" id="user-list">
					<thead>
						<tr>
							<th>Delete</th>
							<th>Edit</th>
							<th>Name</th>
							<th>Age</th>
							<th>Address</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><button>Delete</button></td>
							<td><button>Edit</button></td>
							<td>loading...</td>
							<td>loading...</td>
							<td>loading...</td>
						</tr>
					</tbody>
				</table>
			
			</div>
			
			<div class="col-md-4">
				
				<span id="edit-form">

					<h3><b>Edit User</b></h3><br>
					<form id="edit-user-form">
					
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" onfocus="removeErrorTemplate(this.id)" autocomplete="off" id="edit-name" placeholder="Your name" />
							<div id="error-edit-name"></div>
						</div>
					
						<div class="form-group">
							<label>Age</label>
							<input type="text" class="form-control" onkeypress="numberValidate(event)" onfocus="removeErrorTemplate(this.id)" autocomplete="off" id="edit-age" placeholder="Your age" />
							<div id="error-edit-age"></div>
						</div>
					
						<div class="form-group">
							<label>Address</label>
							<textarea class="form-control" onfocus="removeErrorTemplate(this.id)" id="edit-address" placeholder="Your address"></textarea>
							<div id="error-edit-address"></div>
						</div>
						
						<button class="btn btn-warning">Update</button>
					
					</form>

				</span>
				
			</div>
		
		</div>
	
		<script>
		
			function doSomething(){
				
				getUserList();
				
			}
		
		</script>
	
	</body>
</html>
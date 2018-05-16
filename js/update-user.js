function updateUser(user_id){
	
	var user_name, user_age, user_address, nameError, ageError, addressError;
	var error = 0;
				
	user_name 	 = document.getElementById("edit-name").value;
	user_age 	 = document.getElementById("edit-age").value;
	user_address = document.getElementById("edit-address").value;
			
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
				
		document.getElementById("error-edit-name").innerHTML 	 = nameError;
		document.getElementById("error-edit-age").innerHTML 	 = ageError;
		document.getElementById("error-edit-address").innerHTML  = addressError;

	}
	if(error === 0){
		
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
				if (this.readyState === 4 && this.status === 200) {
					
					if(this.responseText==="1"){
						alert("User has been updated");
						document.getElementById("edit-form").style.display = "none";
						getUserList();
					}else{
						alert("Internal error");
					}
									
				}
		};
		xmlhttp.open("POST", "actions/update-user", true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("user_id="+user_id+"&user_name="+user_name+"&age="+user_age+"&address="+user_address);

		return false;

	}
				
	return false;
				
}
function addNewUser(user_name, age, address){

	var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState === 4 && this.status === 200) {
				
				if(this.responseText==="1"){
					alert("New user has been successfully added!!!");
					getUserList();
				}else{
					alert("Internal error");
				}
								
			}
	};
	xmlhttp.open("POST", "actions/add-user", true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("user_name="+user_name+"&age="+age+"&address="+address);
				
}
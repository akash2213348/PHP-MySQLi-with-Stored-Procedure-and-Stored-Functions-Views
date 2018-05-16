function deleteUser(id){

	var confirmBox = confirm("Are you sure?");

	if(confirmBox){

		var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState === 4 && this.status === 200) {
					
					if(this.responseText==="1"){
						alert("User has been deleted.");
						getUserList();
					}else{
						alert("Internal error");
					}
									
				}
		};
		xmlhttp.open("POST", "actions/delete-user", true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("id="+id);

	}
	else{
		return false;
	}

}
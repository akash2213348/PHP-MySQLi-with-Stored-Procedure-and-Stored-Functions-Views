function getUserList(){
				
	var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState === 4 && this.status === 200) {
				document.getElementById("user-list").getElementsByTagName("tbody")[0].innerHTML = this.responseText;
			}
	};
	xmlhttp.open("POST", "actions/user", true);
	xmlhttp.send();
				
}
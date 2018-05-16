function editUser(id){

	document.getElementById("edit-form").style.display = 'block';
	document.getElementById("edit-user-form").getElementsByTagName("button")[0].setAttribute('onclick','updateUser('+id+')');

	var userRow = document.getElementById("user_row-"+id);
	document.getElementById("edit-name").value = userRow.getElementsByTagName("td")[2].innerHTML;
	document.getElementById("edit-age").value = userRow.getElementsByTagName("td")[3].innerHTML;
	document.getElementById("edit-address").value = userRow.getElementsByTagName("td")[4].innerHTML;
				
}
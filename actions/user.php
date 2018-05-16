<?php

require_once("classes/connection.php");
require_once("classes/user.php");

$connection = new HostConnection;
$createConnection = $connection->getConnection();

if($createConnection->connect_error){
	return null;
}
else{
	$users = new User;
	$list = $users->getUserList($createConnection);
	
	
	
	for($i=0;$i<count($list);$i++){
		echo '<tr id="user_row-'.$list[$i]["id"].'">';
			echo '<td><button onclick="deleteUser('.$list[$i]["id"].')">Delete</button></td>';
			echo '<td><button onclick="editUser('.$list[$i]["id"].')">Edit</button></td>';
			echo "<td>".$list[$i]["name"]."</td>";
			echo "<td>".$list[$i]["age"]."</td>";
			echo "<td>".$list[$i]["address"]."</td>";
		echo "</tr>";
	}
	
	$connection->closeConnection($createConnection);
	
}

?>
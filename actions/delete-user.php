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
	$deleteUser = $users->deleteUser($createConnection, $_POST["id"]);
	
	echo $deleteUser;
	
	$connection->closeConnection($createConnection);
	
}

?>
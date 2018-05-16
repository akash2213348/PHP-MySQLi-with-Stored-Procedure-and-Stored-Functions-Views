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
	$updateUser = $users->updateUser($createConnection, $_POST["user_id"], $_POST["user_name"], $_POST["age"], $_POST["address"]);
	
	echo $updateUser;
	
	$connection->closeConnection($createConnection);
	
}

?>
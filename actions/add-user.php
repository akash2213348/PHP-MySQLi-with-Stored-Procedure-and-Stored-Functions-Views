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
	$addUser = $users->addNewUser($createConnection, $_POST["user_name"], $_POST["age"], $_POST["address"]);
	
	echo $addUser;
	
	$connection->closeConnection($createConnection);
	
}

?>
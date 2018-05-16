<?php
	
	class User{
		
		function getUserList($connection){
			
			$users = array();
						
			$getUsers = "CALL GetAllUsers()";
			$result = $connection->query($getUsers);
			
			if($result->num_rows>0){
				
				while($row = $result->fetch_assoc()){
					
					$obj = array(
								"id" => $row["id"],
								"name" => $row["name"],
								"age" => $row["age"],
								"address" => $row["address"]
							);
					
					array_push($users, $obj);
					
				}
				
			}
			else{
				
				$obj = array(
							"id" => 0,
							"name" => "No Data",
							"age" => 0,
							"address" => "No Address"
						);
				
				array_push($users, $obj);
				
			}
			
			return $users;
			
		}

		function addNewUser($connection, $name, $age, $address){

			$added = 0;

			$add_user = "SELECT addNewUser('$name', $age, '$address') as is_added";
			$result = $connection->query($add_user);
			
			while($row = $result->fetch_assoc()){
					
				$added = $row["is_added"];
					
			}
						
			return $added;

		}

		function deleteUser($connection, $id){

			$deleted = 0;

			$delete_user = "SELECT deleteUser($id) as is_deleted";
			$result = $connection->query($delete_user);
			
			while($row = $result->fetch_assoc()){
					
				$deleted = $row["is_deleted"];
					
			}
						
			return $deleted;

		}

		function updateUser($connection, $id, $name, $age, $address){

			$updated = 0;
			
			$updated_user = "SELECT updateUser($id,'$name', $age, '$address') as is_updated";
			$result = $connection->query($updated_user);
			
			while($row = $result->fetch_assoc()){
					
				$updated = $row["is_updated"];
					
			}
						
			return $updated;

		}
		
	}

?>
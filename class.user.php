<?php
class user{
	//Class to do all stuffs related to user information retrieval
	public function login($username, $password)
	{
		# logggin the user
		global $db;
		$username = $db->real_escape_string($username);
		$password = $db->real_escape_string($password);

		$query = $db->query("SELECT id, password FROM users WHERE username = \"$username\"") or trigger_error("Error loggin in $db->error");
		if($query->num_rows>0){
			//get the userId
			$user_data = $query->fetch_assoc();

			//verify the hash
			if(password_verify($password, $user_data['password'])){
				//setting up the cookies
				if(!session_id()){
					session_start();
				}
				$userId  = $user_data['id'];
				$_SESSION['loggedUser'] = $userId;

				return $userId;
			}else{
				return false;
			}


			
		}else{
			return false;
		}
	}
	public function checkLogin()
	{
		# verifies if the user is loggedIn
		if(!session_id()){
			session_start();
		}

		return $_SESSION['loggedUser']??false;
	}
	
}
$User = new user();
?>
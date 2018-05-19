<?php
	class admin{
		public $data = array();
		function admin(){
			//COnstruct should check the sessoin and try to login
			if(!session_id())
				session_start();

			$uname = $_SESSION['username']??"";
			$pwd = $_SESSION['password']??"";

			if($uname && $pwd)
			{

				//Here the credentials are set
				if($this->authenticate($uname, $pwd)){
					//correct login
				}else{
					header("location:login", true, 302);
				}
			}else{
				//Session is not set
				header("location:login", true, 302);
			}

		}
		function authenticate($username, $password){
			global $db;
			$query = $db->query("SELECT * FROM admin WHERE username = \"$username\" AND password = \"$password\" LIMIT 1 ") or die("Error with login $db->error");
			if($query->num_rows>0){
				//Here the user exists
				$this->data = $query->fetch_assoc();
				return true;
			}else{
				return false;
			}
		}
		// public show_papers(){
		//   //Shows all papers for display
		//   global $db;
		//   $query = $db->query("SELECT * FROM ")
		// }
	}

?>
<?php
	include_once "conn.php";
	function get_levels(){
		global $db;
		$query = $db->query("SELECT * FROM levels");
		var_dump($query);
		$levels = array();
		while ($data = $query->fetch_assoc()) {
			$levels[] = $data;
		}
		return $levels;
	}
	function get_subjects($level = ""){
		global $db;
		$sql = "SELECT * FROM subjects WHERE level LIKE \"%$level\" ";

		$query = $db->query($sql);
		$subjects = array();
		while ($data = $query->fetch_assoc()) {
			$subjects[] = $data;
		}
		return $subjects;
	}
	function page_level(){
		//function to get the level of page
		$request_uri = trim($_SERVER['REQUEST_URI'], "/");
		$level = count(explode("/", $request_uri));
		return $level;
	}
	function get_file($filename){
		//function to return file string in # page levels
		$plevel = page_level();

		$file = "";
		for($n=0; $n<$plevel; $n++){
			$file .= "../";
		}
		$file .= "$filename";
		return $file; 
	}
	function level_papers($level){
		//Getting papers based on their levels
		global $db;

		$level = strtoupper($level);

		$sql = "SELECT * FROM papers JOIN subjects ON papers.subject = subjects.id JOIN subject_levels ON subject_levels.subject = subjects.id WHERE subject_levels.level = \"$level\" ";
		$query = $db->query($sql) or die("error getting papers $db->error");
		$papers = array();
		while ($data = $query->fetch_assoc()) {
			$papers[] = $data;
		}

		return $papers;
	}
?>
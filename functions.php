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
?>
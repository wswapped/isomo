<?php
	include "../functions.php";
	$request = $_POST;	

	$ret = array(1, 3, 4, 5);

	$action = $request['action']??"";
	if($action == 'get_papers'){
		$query = $db->query("SELECT * FROM papers") or die($db->error);
		$papers =  array();

		while ($data = $query->fetch_array()) {
			$papers[] = $data;
		}
		echo json_encode($papers);;
	}else if($action = 'level_papers'){
		//papers in a certain level
		$level = $request['level']??"";
		if($level){
			$papers = level_papers($level);
		echo json_encode($papers);
	}else{
		echo json_encode("Please provide level to check papers");
	}
		
	}else{
		//Action is not recognized
		echo "404 Action is not recognized";
	}
?>
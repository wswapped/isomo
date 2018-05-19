<?php
	include_once "conn.php";
	function get_levels(){
		global $db;
		$query = $db->query("SELECT * FROM levels");
		$levels = array();
		while ($data = $query->fetch_assoc()) {
			$levels[] = $data;
		}
		return $levels;
	}
	function get_subjects($level = ""){
		global $db;
		$sql = "SELECT * FROM subjects JOIN subject_levels as l ON l.subject = subjects.id WHERE level LIKE \"%$level\" ";

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
	function page_parts(){
		$cpage = trim($_SERVER['REQUEST_URI'], "/");
		$cpage = trim($cpage, "/");
		return explode("/", $cpage);
	}
	function level_papers($level){
		//Getting papers based on their levels
		global $db;

		$level = strtoupper($level);

		$sql = "SELECT papers.* FROM papers JOIN subjects ON papers.subject = subjects.id JOIN subject_levels ON subject_levels.subject = subjects.id WHERE subject_levels.level = \"$level\" ORDER BY date DESC ";
		$query = $db->query($sql) or die("error getting papers $db->error");
		$papers = array();
		while ($data = $query->fetch_assoc()) {
			$papers[] = $data;
		}

		return $papers;
	}
	function get_paper_types(){
		//function return types possible for papers
		global $db;

		$query = $db->query("SELECT * FROM subject_type");
		$types = array();

		while ($data = $query->fetch_assoc()) {
			$data['pname'] = ucwords(str_ireplace("_", " ", $data['name'])); //print name
			$types[] = $data;
		}
		return $types;
	}
	function category_papers($category){
		//returns the papers in a category
		global $db;

		$sql = "SELECT papers.*, subjects.name as subjectname FROM papers JOIN subjects ON papers.subject = subjects.id JOIN subject_type ON subjects.type = subject_type.id WHERE subject_type.name = \"$category\" ";
		
		$query = $db->query($sql) or die("Cant get cat papers $db->error");

		$papers = array();
		while ($data = $query->fetch_assoc()) {
			$papers[] = $data;
		}
		return $papers;
	}

	function addAnswerPaper($questionId, $answerContent){
		//adds a paper answer to the question
		global $db;

		//saving answer into file
		$filename = "answers/".time().".html";
		$file = fopen("../".$filename, "w+"); //opened in the admin
		fwrite($file, $answerContent);

		$sql = "INSERT INTO answers(paperId, file) VALUES (\"$questionId\", \"$filename\")";

		$query = $db->query($sql) or trigger_error($db->error);
		return true;
	}
	function n_total_papers(){
		//returns the total number of papers
		global $db;
		$query = $db->query("SELECT COUNT(*) as num FROM papers WHERE archived  = 'no' ") or trigger_error("Can't count papers $db->error");
		$data = $query->fetch_assoc();
		return $data['num'];
	}
	function n_total_users(){
		//returns the total number of users
		global $db;
		$query = $db->query("SELECT COUNT(*) as num FROM users WHERE archived  = 'no' ") or trigger_error("Can't count papers $db->error");
		$data = $query->fetch_assoc();
		return $data['num'];
	}
	function stripURL($text){
		return strtolower(str_ireplace(" ", "_", $text));
	}
	function retain_input($method, $input_name){
		//check if method can be recognized
		if(strtolower($method) == 'post'){
			$value = $_POST[$input_name]??false;
		}elseif (strtolower($method) == 'get') {
			$value = $_GET[$input_name]??false;
		}else return false;

		return $value;
	}
	function get_contacts(){
		global $db;
		$query = $db->query("SELECT * FROM contacts ORDER BY date DESC") or trigger_error($db->error);
		$conts = array();
		while ($data = $query->fetch_assoc()) {
			$conts[] = $data;
		}
		return $conts;
	}
?>
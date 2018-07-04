<?php
class paper{
	//Class to do all stuffs related to paper information retrieval
	public function getDrivingPaper($lang = ''){
		//function to return driving papers
		global $db;
		$sql = "SELECT papers.*, subjects.name as subjectname, subjects.language as lang FROM papers JOIN subjects ON subjects.id = papers.subject JOIN subject_type ON subject_type.id = subjects.type WHERE subjects.language LIKE \"%$lang%\" AND subject_type.name = \"driving_exam\" ORDER BY papers.date DESC ";
		// echo "$sql";
		$query = $db->query($sql) or die("Can't get people with lang $db->error");
		$papers = $ret = array();
		while ($data = $query->fetch_assoc()) {
			$paper_data = $data;
			$paper_data['link'] = "papers/get/".stripURL($data['name']);
			$ret[] = $paper_data;
			$papers[] = array_merge($data, $paper_data);
		}
		return $ret;
	}
	public function getTrafficPapers($lang = ''){
		//function to return driving papers
		global $db;
		$sql = "SELECT papers.*, subjects.name as subjectname, subjects.language as lang FROM papers JOIN subjects ON subjects.id = papers.subject JOIN subject_type ON subject_type.id = subjects.type WHERE subjects.language LIKE \"%$lang%\" AND subject_type.name = \"driving_exam\" ";
		$sql = "SELECT papers.*, subjects.name as subjectname, subjects.language as lang FROM papers JOIN subjects ON subjects.id = papers.subject JOIN subject_type ON subject_type.id = subjects.type WHERE subjects.language LIKE \"%$lang%\" AND subject_type.name = \"traffic_rules\" ";
		// echo "$sql";
		$query = $db->query($sql) or die("Can't get people with lang $db->error");
		$papers = $ret = array();
		while ($data = $query->fetch_assoc()) {
			$paper_data = $data;
			$paper_data['link'] = "papers/get/".stripURL($data['name']);
			$ret[] = $paper_data;
			$papers[] = array_merge($data, $paper_data);
		}
		return $ret;
	}
	public function paper_details($paper_data, $type='name')
	{
		//Checking the paper and answer
		global $db;

		$column = $type == 'name'?'name':'id';

		$sql = "SELECT P.*, A.id as answerid, A.file as answer FROM papers AS P JOIN answers AS A ON P.id = A.paperId WHERE P.$column = \"$paper_data\" LIMIT 1 ";

		$query = $db->query($sql) or trigger_error("Can't see level $db->error");

		if($query->num_rows){
			$paperData =  $query->fetch_assoc();
			$paperPath = str_ireplace(" ", "_", strtolower($paperData['name']));
			$paperData['link'] = "papers/get/$paperPath";
			return $paperData;
		}else{
			return false;
		}
	}


	public function get($paperId)
	{
		//Checking the paper and answer
		global $db;

		$sql = "SELECT P.*, S.name as subjectName FROM papers AS P JOIN subjects AS S ON S.id = P.subject WHERE P.id = \"$paperId\" LIMIT 1 ";
		$query = $db->query($sql) or trigger_error("Can't see level $db->error");

		if($query->num_rows){

			//check the answer
			$answerData = $this->get_answer($paperId);

			$paperData =  $query->fetch_assoc();



			$paperData['answer'] = "papers/get/";
			$paperData['answerid'] = "papers/get";

			$paperPath = str_ireplace(" ", "_", strtolower($paperData['name']));
			$paperData['link'] = "papers/get/$paperPath";
			return $paperData;
		}else{
			return false;
		}
	}

	public function get_answer($paper_id)
	{
		//Check answer
		global $db;

		$sql = "SELECT * FROM answers WHERE paperId = \"$paper_id\" LIMIT 1 ";

		$query = $db->query($sql) or trigger_error("Can't see level $db->error");

		if($query->num_rows){
			$paperData = $level = $query->fetch_assoc();
			return $paperData;
		}else{
			return false;
		}
	}
	public function bought($userId, $answerId)
	{
		# Checks if the user bought the paper
		global $db;

		$query = $db->query("SELECT * FROM buy_requests WHERE user = \"$userId\" AND answer = \"$answerId\"") or trigger_error($db->error);
		
		if($query->num_rows){
			$data = $query->fetch_assoc();

			$status = $data['status'];

			return $status;
		}else return false;
			
	}
}
?>
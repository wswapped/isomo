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
	
}

?>
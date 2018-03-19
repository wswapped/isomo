<?php
class paper{
	//Class to do all stuffs related to paper information retrieval
	public function getDrivingPaper($lang = '', $done_date = ''){
		//function to return driving papers
		global $db;
		$query = $db->query("SELECT *, subjects.name as subjectname, subjects.language as lang FROM papers JOIN subjects ON subjects.id = papers.subject JOIN subject_type ON subject_type.id = subjects.type WHERE subjects.language LIKE \"%$lang%\" AND papers.done_date LIKE \"%$done_date%\" AND subject_type.name = \"driving_exam\" ") or die("Can't get people with lang $db->error");
		$papers = $ret = array();
		while ($data = $query->fetch_assoc()) {
			$paper_data = $data;
			$paper_data['name'] = "$data[subjectname] ".date("d/m/Y", strtotime($data['done_date']));
			$paper_data['link'] = "papers/get/".str_ireplace(" ", "_", strtolower($data['subjectname'])).$data['done_date'];
			$ret[] = $paper_data;
			$papers[] = array_merge($data, $paper_data);
		}
		return $ret;
	}
}

?>
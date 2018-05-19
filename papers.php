<!DOCTYPE html>
<html>
<head>	
	<?php
		include "functions.php";
		include_once 'class.paper.php';

		$Paper = new paper();

		$str = trim(str_ireplace("/papers/", '', $_SERVER['REQUEST_URI']), '/');
		$parts = explode("/", trim($str));

		$level = page_level();

		//Iddentify route as empty
		if(count($parts) == 1 && $parts[0] == "")
			$parts = array();

		//Identifying routes
		if($level == 1){
			$page_name = 'home';
			$title = "Papers";
		}else if($level == 2){
			//Here we could be looking for level papers
			$page_name = "level_papers";

			//pagename maybe
			$spage = $parts[0];


			//Checking if this is a paper level
			$query = $db->query("SELECT * FROM levels WHERE name = \"$spage\" LIMIT 1 ") or die("Cabt see level $db->error");
			if($query->num_rows){
				//Display the papers for this level
				$level = $query->fetch_assoc();
				$printname = $level['printname'];
				$levelname = $level['name'];
				$paper_intro = $level['short_intro'];
				$title = "$printname papers";
			}else{
				//maybe something else we're trying to access
			}
		}else if($level == 3){
			//individual paper could be being requested
			if($parts[0] == 'get'){
				$paper_pname = $parts[1]; //paper path name
				$papername = str_ireplace("_", " ", $db->real_escape_string($paper_pname));

				//checking the paper against the database
				$sql = "SELECT * FROM papers WHERE LOWER(name) = \"$papername\" ";
				$query = $db->query($sql) or trigger_error("Error getting a paper");
				if($query->num_rows){
					$paper_data = $query->fetch_assoc();
					$paper_file = $paper_data['file'];
				}
			}else{
				die();
			}
		}else if(strpos($parts[1], "driving_theory") == 0){
			// if the first part is thta, then we have to search for driving theory paper
			$page_name = 'driving_theory';

			//paper done on which date
			$paper_date = str_ireplace("driving_theory", "", $parts[1]);
			$paper_data = $Paper->getDrivingPaper('', $paper_date)[0];

			$title = $paper_data['name'];
		}

		
		
		include "modules/head.php";
	?>

</head>
<body>
	<?php
		include "modules/menu.php";

		if($level == 1){
			include "paper_home.php";
		}else{
			$spage = $parts[0];

			//Checking if this is a paper level
			$query = $db->query("SELECT * FROM levels WHERE name = \"$spage\" LIMIT 1 ") or die("Cabt see level $db->error");
			if($query->num_rows){
				//Display the papers for this level
				$level = $query->fetch_assoc();
				$printname = $level['printname'];
				$levelname = $level['name'];
				$paper_intro = $level['short_intro'];
				?>
					<div class="container">
						<div class="row">
							<div class="col-md-9">
								<h1 class="page-title"><?php echo $printname ?> papers</h1>
								<p class="text-muted"><i><?php echo $paper_intro; ?></i></p>
							</div>
							<div class="col-md-3">
							</div>
						</div>
						<div class="mt-4"></div>
						<div class="row">
							<div class="col-md-12">
								<ul class="list-group">
								<?php
									//Getting papers in level
									$papers = level_papers($spage);
									for($n=0; $n<count($papers); $n++){
										$paper = $papers[$n];
										$pname = $paper['name'];
										?>
											<li class="list-group-item"><a href="<?php echo get_file("papers/get/".str_ireplace(" ", "_", strtolower($pname))); ?>"><?php echo $pname ?></a></li>
										<?php
									}
								?>
								</ul>
							</div>
						</div>
					</div>
				<?php
			}else if($spage =='get'){

				if(!empty($paper_data)){
					//Some details
					$papername =  $paper_data['name'];
					$paper_parts = explode("_", $papername);
					$subjname = $paper_data['name'];
					$subj_level = $paper_parts[0];
					$subj_year = $paper_data['year'];
					?>
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<h1 class="page-title"><?php echo ucwords($subjname);  ?></h1>
									<div>
										<button class="btn btn-primary"><a href="<?php echo "/buy/".$paper_pname; ?>" style="color: inherit; text-decoration: inherit;">BUY</a></button>
									</div>
									<?php
										include $paper_file;
									?>
								</div>
							</div>
						</div>
					<?php
				}else{
					//Here want to display a paper
					$papername =  $parts[1];
					$paper_parts = explode("_", $papername);
					$subjname = $paper_parts[1];
					$subj_level = $paper_parts[0];
					$subj_year = $paper_parts[2];

					//Getting this paper
					$query = $db->query("SELECT * FROM papers JOIN subjects ON subjects.id = papers.subject JOIN subject_levels ON subject_levels.subject = subjects.id WHERE subjects.name = \"$subjname\" AND subject_levels.level = \"$subj_level\" AND papers.year = \"$subj_year\" LIMIT 1 ") or die("can't get a paper $db->error");
					$paper_data = $query->fetch_assoc();
					?>
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<h1 class="page-title"><?php echo ucwords($subjname)." of ".$subj_year;  ?></h1>
									<div class="embed-responsive embed-responsive-16by9">
										<iframe scrolling ='no' class="embed-responsive-item" frameborder="0" width="400" height="100%" src="<?php echo get_file($paper_data['file']); ?>"></iframe>
									</div>
								</div>
							</div>
						</div>
					<?php
				}
			}

		}
		include "modules/footer.php";
	?>
</body>
</html>
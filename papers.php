<!DOCTYPE html>
<html>
<head>	
	<?php
		include "functions.php";
		$str = trim(str_ireplace("/papers/", '', $_SERVER['REQUEST_URI']), '/');
		$parts = explode("/", trim($str));

		$level = page_level();

		//Iddentify route as empty
		if(count($parts) == 1 && $parts[0] == "")
			$parts = array();

		$title = "Papers";
		
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
										$pname = $paper['level']." $paper[name] ".$paper['year'];
										?>
											<li class="list-group-item"><?php echo $pname ?></li>
										<?php
									}
								?>
								</ul>
							</div>
						</div>
					</div>
				<?php
			}else if($spage =='get'){
				//Here want to display a paper
				?>
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<h1 class="page-title">Paper name</h1>
							</div>
						</div>
					</div>
				<?php
			}

		}
	?>
	<?php include "modules/footer.php"; ?>
</body>
</html>
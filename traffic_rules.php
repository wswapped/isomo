<!DOCTYPE html>
<html>
<head>
	<?php
		$title = "Traffic rules";
		include 'functions.php';
		include_once 'class.paper.php';
		$Paper = new paper();	
		$cpage = trim($_SERVER['REQUEST_URI'], "/");

		$page_parts = explode("/", str_ireplace("traffic_rules", "", $cpage));

		//removing empty routes
		$page_parts = array_values(array_filter($page_parts));

		if(count($page_parts) == 0){
			$page_name = "home";
		}else{
			$first_menu = $page_parts[0];
			$titles = array('en'=>"Traffic rules in English", 'fr'=>"Traffic rules in French", 'kin'=>"Amategeko y'umuhanda mu Kinyarwanda");
			if($first_menu == 'en' || $first_menu == 'fr' || $first_menu == 'kin'){
				//english
				$page_name = $first_menu;
				$title = $titles[$first_menu];
			}


		}

		$page_file = "driving_exam_$page_name.php";

		include 'modules/head.php';
	?>

</head>
<body>
	<?php include "modules/menu.php"; ?>
	<div class="container">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-body">
					<h1 class="card-title page-title">Traffic rules</h1>
					<?php if($page_name == 'home'){ ?>
						<div class="row">						
							<div class="col-md-12">
								<p class="text-muted">Choose language</p>
							</div>
							<div class="col-md-4">
								<a href="<?php echo get_file("$cpage/kin") ?>"><img class="s_small_logo" src="<?php echo get_file('img/rwandaflag.svg'); ?>"><span> Kinyarwanda</span></a>
							</div>
							<div class="col-md-4">							
								<a href="<?php echo get_file("$cpage/en") ?>"><img class="s_small_logo" src="<?php echo get_file('img/en.png'); ?>"> English</a>
							</div>
							<div class="col-md-4">
								<a href="<?php echo get_file("$cpage/fr") ?>"><img class="s_small_logo" src="<?php echo get_file('img/french.png'); ?>"> French</a>
							</div>
						</div>					
						<div class="mt-4"></div>
						<div class="row">
							<div class="col-md-12">
								<ul class="list-group">
								<?php
									$papers = $Paper->getTrafficPapers();
									for($n=0; $n<count($papers); $n++){
										$paper_data = $papers[$n];
										?>
											<li class="list-group-item dblock">
												<a href="<?php echo get_file($paper_data['link']) ?>"><?php echo $paper_data['name']; ?></a><br />
												<p class="font-italic text-small"><?php echo date("d F Y", strtotime($paper_data['date'])) ?></p>
												<?php
													if(!empty($paper_data['answers'])){
														?>
															<p class="text-success">Answers available</p>
														<?php
													}
												?>
											</li>
										<?php
									}
								?>
								</ul>
							</div>
						</div>
					<?php }else{
						//Language specified
						?>
						<div class="row">
							<div class="col-md-12">
								<ul class="list-group">
								<?php
									$papers = $Paper->getDrivingPaper($page_name);
									for($n=0; $n<count($papers); $n++){
										$paper_data = $papers[$n];
										?>
											<li class="list-group-item dblock">
												<a href="<?php echo get_file($paper_data['link']) ?>"><?php echo $paper_data['name']; ?></a><br />
												<p class="font-italic text-small"><?php echo date("d F Y", strtotime($paper_data['date'])) ?></p>
												<?php
													if(!empty($paper_data['answers'])){
														?>
															<p class="text-success">Answers available</p>
														<?php
													}
												?>
											</li>
										<?php
									}
								?>
								</ul>
							</div>
						</div>
						<?php
					} ?>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		
	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script type="text/javascript" src="<?php echo get_file('js/jquery.slim.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo get_file('js/tether.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo get_file('js/bootstrap.min.js') ?>"></script>
<script type="text/javascript" src="js/js.js"></script>
</body>
</html>
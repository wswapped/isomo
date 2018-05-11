<!DOCTYPE html>
<html>
<head>
	<?php
		$title = "Welcome ";
		include "functions.php";
		include "modules/head.php";
	?>
</head>
<body>
	<?php include "modules/menu.php"; ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="intro">
					<div class="intro-cont">
						<img class="img img-responsive img-full intro-img" src="img/paper-intro.jpg">
						<div class="intro-text">
						    <h1 class="display-3">Welcome to ISOMO Technology</h1>
						    <p class="lead">Your partner to success in your exams,  from national exams to driving tests. We have resources to help you! :)</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="card">
					<a href="<?php echo get_file('papers/p6') ?>"><img class="card-img-top intro-card-img" src="img/primary.png" alt="Primary papers"></a>		
					<div class="card-block">
				    	<h4 class="card-title">Primary 6</h4>
				    	<p class="card-text text-muted">Get papers to help prepare for Primary Leaving Exam.</p>
				    	<a href="<?php echo get_file('papers/p6') ?>" class="btn btn-primary pull-right">Get papers</a>
				  	</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<a href="<?php echo get_file('papers/s3') ?>"><img class="card-img-top intro-card-img" src="img/olevel.png" alt="Senior 3 papers"></a>
					
					<div class="card-block">
				    	<h4 class="card-title">Senior 3</h4>
				    	<p class="card-text text-muted">Want to jump into path to your career, we are here to help.</p>
				    	<a href="<?php echo get_file('papers/s3') ?>" class="btn btn-primary pull-right">Get papers</a>
				  	</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<a href="<?php echo get_file('papers/s6') ?>"><img class="card-img-top intro-card-img" src="img/final.jpg" alt="Secondary 6 papers"></a>					
					<div class="card-block">
				    	<h4 class="card-title">Senior 6</h4>
				    	<p class="card-text text-muted">Preparing to leaving secondary school get help here.</p>
				    	<a href="<?php echo get_file('papers/s6') ?>" class="btn btn-primary pull-right">Get papers</a>
				  	</div>
				</div>
			</div>			
		</div>
	</div>
	<div class="mt-5"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="card">
					<a href="<?php echo get_file('driving_theory_exams') ?>"><img class="card-img-top intro-card-img" src="img/driving.jpg" alt="Driving theory exams"></a>
					
					<div class="card-block">
				    	<h4 class="card-title">Driving theory exams</h4>
				    	<p class="card-text text-muted">Ready to take driving test, get papers to help you to pass.</p>
				    	<a href="driving_theory_exams" class="btn btn-primary pull-right">Get papers</a>
				  	</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<a href="<?php echo get_file('traffic_rules') ?>"><img class="card-img-top intro-card-img" src="img/amategeko.jpg" alt="Amategeko y'umuhanda"></a>
					
					<div class="card-block">
				    	<h4 class="card-title">Amategeko y'umuhanda</h4>
				    	<p class="card-text text-muted">Bona amategeko y'umuhanda atandukanye yagufasha mu kwiga witegura ikizami.</p>
				    	<a href="#" class="btn btn-primary pull-right">Get papers</a>
				  	</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<img class="card-img-top intro-card-img" src="img/scholarship.png" alt="Primary papers">
					<div class="card-block">
				    	<h4 class="card-title">Scholarship</h4>
				    	<p class="card-text text-muted">Access thousands of scholarships.</p>
				    	<a href="#" class="btn btn-primary pull-right">View scholarships</a>
				  	</div>
				</div>
			</div>
		</div>
	</div>
	<?php
		include_once "modules/footer.php";
	?>
</body>
</html>
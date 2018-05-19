<!DOCTYPE html>
<html>
<head>
	<?php
		$title = "Welcome ";
		include "functions.php";
		include "modules/head.php";
	?>
	<!-- <link rel="stylesheet" type="text/css" href="css/slick/slick.css"> -->
	<!-- <link rel="stylesheet" type="text/css" href="css/slick/slick-theme.css"> -->
	<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick.min.css'>
	<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick-theme.min.css'>
	<link rel='stylesheet prefetch' href='css/slick/style.css'>

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
						    <h1 class="display-4">Welcome to ISOMO Technology</h1>
						    <p class="lead">Your partner to success in your exams,  from national exams to driving tests. We have resources to help you! :)</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row cgutters">
			<div class="col-lg-4 col-sm-6 col-xs-12">
				<div class="card">
					<a href="<?php echo get_file('papers/p6') ?>"><img class="card-img-top intro-card-img" src="img/primary.png" alt="Primary papers"></a>		
					<div class="card-block">
				    	<h4 class="card-title item-title">Primary 6</h4>
				    	<p class="card-text text-muted">Get papers to help prepare for Primary Leaving Exam.</p>
				    	<a href="<?php echo get_file('papers/p6') ?>" class="btn btn-primary pull-right">Get papers</a>
				  	</div>
				</div>
			</div>
			<div class="col-lg-4 col-sm-6 col-xs-12">
				<div class="card">
					<a href="<?php echo get_file('papers/s3') ?>"><img class="card-img-top intro-card-img" src="img/olevel.png" alt="Senior 3 papers"></a>
					
					<div class="card-block">
				    	<h4 class="card-title item-title">Senior 3</h4>
				    	<p class="card-text text-muted">Want to jump into path to your career, we are here to help.</p>
				    	<a href="<?php echo get_file('papers/s3') ?>" class="btn btn-primary pull-right">Get papers</a>
				  	</div>
				</div>
			</div>
			<div class="col-lg-4 col-sm-6 col-xs-12">
				<div class="card">
					<a href="<?php echo get_file('papers/s6') ?>"><img class="card-img-top intro-card-img" src="img/final.jpg" alt="Secondary 6 papers"></a>					
					<div class="card-block">
				    	<h4 class="card-title item-title">Senior 6</h4>
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
			<div class="col-md-4 col-sm-6 col-xs-12">
				<div class="card">
					<a href="<?php echo get_file('driving_theory_exams') ?>"><img class="card-img-top intro-card-img" src="img/driving.jpg" alt="Driving theory exams"></a>
					
					<div class="card-block">
				    	<h4 class="card-title item-title">Driving theory exams</h4>
				    	<p class="card-text text-muted">Ready to take driving test, get papers to help you to pass.</p>
				    	<a href="driving_theory_exams" class="btn btn-primary pull-right">Get papers</a>
				  	</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 col-xs-12">
				<div class="card">
					<a href="<?php echo get_file('traffic_rules') ?>"><img class="card-img-top intro-card-img" src="img/amategeko.jpg" alt="Amategeko y'umuhanda"></a>
					
					<div class="card-block">
				    	<h4 class="card-title item-title">Amategeko y'umuhanda</h4>
				    	<p class="card-text text-muted">Bona amategeko y'umuhanda atandukanye yagufasha mu kwiga witegura ikizami.</p>
				    	<a href="#" class="btn btn-primary pull-right">Get papers</a>
				  	</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 col-xs-12">
				<div class="card">
					<img class="card-img-top intro-card-img" src="img/scholarship.png" alt="Primary papers">
					<div class="card-block">
				    	<h4 class="card-title item-title">Scholarship</h4>
				    	<p class="card-text text-muted">Access thousands of scholarships.</p>
				    	<a href="#" class="btn btn-primary pull-right">View scholarships</a>
				  	</div>
				</div>
			</div>
		</div>
	</div>
	<div class="mt-5"></div>
	<div class="wrapper">
		<div class="slidercont">
			<div class="sliderelem">
				<img src="img/partners/kLab_logo.png">
				<p class="card-text partner-name">KLAB</p>
			</div>
			<div class="sliderelem">
				<img src="img/partners/mtn.jpg">
				<p class="card-text partner-name">MTN</p>
			</div>
			<div class="sliderelem">
				<img src="img/partners/mvend.png">
				<p class="card-text partner-name">MVENDA</p>
			</div>
			<div class="sliderelem">
				<img src="img/partners/airtel.jpg">
				<p class="card-text partner-name">AIRTEL & TIGO</p>
			</div>
			<div class="sliderelem">
				<img src="img/partners/miniyouth.jpg">
				<p class="card-text partner-name">MINIYOUTH</p>
			</div>
			<div class="sliderelem">
				<img src="img/partners/imbuto.png">
				<p class="card-text partner-name">IMBUTO FOUNDATION</p>
			</div>
			<div class="sliderelem">
				<img src="img/partners/mitec.jpg">
				<p class="card-text partner-name">MiTEC</p>
			</div>
			<div class="sliderelem">
				<img src="img/partners/rnp.jpg">
				<p class="card-text partner-name">RWANDA NATIONAL POLICE</p>
			</div>
		</div>
	</div>
	<?php
		include_once "modules/footer.php";
	?>
	<!-- <script type="text/javascript" src="css/slick/slick.min.js"></script> -->
	<script src='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick.min.js'></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('.slidercont').slick({
				slidesToShow: 3,
				dots:true,
				centerMode: true,
				variableWidth: true,
				autoplay: true,
 	 			autoplaySpeed: 2000,
			});
		});
		// $('.slidercont').slick({
		//  	arrows: false,
		// 	// infinite: true,
		// 	// slidesToShow: 3,
		// 	// slidesToScroll: 1,
		// 	// autoplay:true
		// 	dots: true,
		// 	infinite: true,
		// 	autoplay: true,
		// 	autoplaySpeed: 6000,
		// 	speed: 800,
		// 	slidesToShow: 1,
		// 	adaptiveHeight: true
		//   });
		// $(document).ready(function(){
		//  $('.slidercont').slick({
		//  	arrows: false,
		// 	// infinite: true,
		// 	// slidesToShow: 3,
		// 	// slidesToScroll: 1,
		// 	// autoplay:true
		// 	dots: true,
		// 	infinite: true,
		// 	autoplay: true,
		// 	autoplaySpeed: 6000,
		// 	speed: 800,
		// 	slidesToShow: 1,
		// 	adaptiveHeight: true
		//   });
		// });
	</script>
</body>
</html>
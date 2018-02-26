<!DOCTYPE html>
<html>
<head>
	<?php
	include_once "functions.php"
	
	?>
	<title>About | ISOMO Technology</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="shortcut icon" href="isomo.jpg">
	<!--Google -Fonts-->
	<link href='https://fonts.googleapis.com/css?family=Sintony:400,700&subset=latin-ext' rel='stylesheet' type='text/css'>
	<!--Font-awsome-->
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

	<!-- Custom style -->
	<link rel="stylesheet" href="css/style.css">

</head>
<body>
	<?php
		include "modules/menu.php";

	?>
	<div class="container">
		<div class="page">
			<div class="row">
				<div class="col-sm-4">
					<div class="card">						
						<div class="card-block">
							<img class="about-img img-responsive" src="img/isomo-award.jpg" alt="Isomo imbuto award">
							<ul class="list-group">
								<li></li>
								<li></li>
								<li></li>
							</ul>
						</div>
					</div>
					<div class="card">
						<div class="card-block">
							<h3 class="card-title">Our Location</h3>
							<!-- <div id="map" style="min-height: 600px">
								
							</div> -->
							<iframe width="100%" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAAa1K0Q8xIXswQC7uCMrbvwYi2CcSTTiU&q=ISOMO+TECHNOLOGY+LTD" allowfullscreen>
</iframe>
						</div>
					</div>
										
				</div>
				<div class="col-sm-8">
					<div class="card">
						<div class="card-header card-title">
						    About ISOMO Technology
						</div>
						<div class="card-block">
							<p>
								ISOMO TECHNOLOGY Ltd is an innovating Company of Internet Archive registered in RDB and is intended to make a contribution to advancing education through the use of ICT. To achieve this, Isomo Technology has developed a website to serve as an online resource and guide centre with a wide range of educational information and materials for different levels of users. This is foster more meaningful use of internet not only among the youth but also for the general public. Specifically the website is making the following accessible:
							</p>
							<br>
							<ul class="list-group-flush">
								<li class="list-group-item">Past examination papers for primary, ordinary level (S.3) and Advanced level (S.6)</li>
								<li class="list-group-item">Scholarship opportunities</li>
								<li class="list-group-item">Information on short courses and training</li>
								<li class="list-group-item">Rwanda Traffic Rules and Exams past papers</li>
								<li class="list-group-item">Digital Online Library</li>
								<li class="list-group-item">Information on different publishers and respective books, disciplines and levels of education for both daily life and studies</li>
							</ul>
							<br>
							<p>
								The motivation behind this idea is to give everyone access to knowledge and improve the quality of life for people living in regions where the population has not yet reached at a high level of economic and social development. Isomo Technology is playing an important role in educational and research process by providing a wide range of materials in one place.
							</p>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script type="text/javascript" src="js/jquery.slim.min.js"></script>
<script type="text/javascript" src="js/tether.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/js.js"></script>
<script type="text/javascript">
	function initMap() {
        var isomolocation = {lat: -1.953084, lng: 30.092948};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
          center: isomolocation
        });
        var marker = new google.maps.Marker({
          position: isomolocation,
          map: map
        });
      }
</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAa1K0Q8xIXswQC7uCMrbvwYi2CcSTTiU&callback=initMap">
</script>
</body>
</html>
<!DOCTYPE html>
<html>
<head>	
	<?php
		$title = "Papers";
		include "functions.php";
		include "modules/head.php";
	?>

</head>
<body>
	<?php include "modules/menu.php"; ?>
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-9">
						<h1>Primary papers</h1>
						<p>Primary 6 leaving exam papers and their answers</p>
						<?php
							$p6 = level_papers("P6");
							var_dump($p6);
						?>
						<ul class="list"></ul>
					</div>
					<div class="col-md-3">
						
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
</body>
</html>
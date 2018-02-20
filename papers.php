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
						<p class="text-muted">Primary 6 leaving exam papers and their answers</p>
						<?php
							$p6 = level_papers("P6");
							if($p6){
								?>
									<ul class="list-group">
										<?php
											for($n=0; $n<count($p6); $n++){
												$subjname = $p6[$n]['name'];
												$year = $p6[$n]['year'];
												?>
													<li class="list-group-item"><a  href="<?php echo strtolower(get_file("papers/get/P6_".$subjname."_$year")); ?>">P6 <?php echo $p6[$n]['name']." ".$p6[$n]['year']; ?></a></li>
												<?php
											}
										?><div class="mt-2"></div>
										<li style="text-align: right"><a class="btn btn-success" href="<?php echo strtolower(get_file('papers/p6')) ?>">VIEW MORE</a></li>
									</ul>
								<?php
							}else{
								echo "No Primary papers";
							}
						?>
						
					</div>
					<div class="col-md-3">
						
					</div>
				</div>
			</div>
		</div>
		<div class="mt-5"></div>
		<div class="row">
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-9">
						<h1>S3 papers</h1>
						<p class="text-muted">O'Level leaving exam papers and their answers</p>
						<?php
							$s3 = level_papers("S3");
							if($p6){
								?>
									<ul class="list-group">
										<?php
											for($n=0; $n<count($s3); $n++){
												$subjname = $s3[$n]['name'];
												$year = $s3[$n]['year'];
												?>
													<li class="list-group-item"><a href="<?php echo strtolower(get_file("papers/get/S3_".$subjname."_$year")); ?>">S3 <?php echo $subjname." ".$year; ?></a></li>
												<?php
											}
										?>
										<div class="mt-2"></div>
										<li style="text-align: right"><a class="btn btn-success" href="<?php echo get_file('papers/s3'); ?>">VIEW MORE</a></li>
									</ul>
								<?php
							}else{
								echo "No S3 papers";
							}
						?>
						
					</div>
					<div class="col-md-3">
						
					</div>
				</div>
			</div>
		</div>
		<div class="mt-5"></div>
		<div class="row">
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-9">
						<h1>Secondary papers</h1>
						<p class="text-muted">High school leaving exam papers and their answers</p>
						<?php
							$s6 = level_papers("S6");
							if($s6){
								?>
									<ul class="list-group">
										<?php
											for($n=0; $n<count($s6); $n++){
												$subjname = $s6[$n]['name'];
												$year = $s6[$n]['year'];
												?>
													<li class="list-group-item"><a href="<?php echo strtolower(get_file("papers/get/S6_".$subjname."_$year")); ?>">S6 <?php echo $subjname." ".$year; ?></a></li>
												<?php
											}
										?>
										<div class="mt-2"></div>
										<li style="text-align: right"><a class="btn btn-success" href="<?php echo get_file('papers/s6'); ?>">VIEW MORE</a></li>
									</ul>
								<?php
							}else{
								echo "No Secondary papers";
							}
						?>
						
					</div>
					<div class="col-md-3">
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include "modules/footer.php"; ?>
</body>
</html>
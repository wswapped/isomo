<div class="container">
	<div class="row">
		<div class="col-md-9">
			<div class="row">
				<?php
					$levels = get_levels();
					foreach ($levels as $key => $level) {
						$levelname = $level['name'];
						$levelprintname = $level['printname'];
						$intro = $level['short_intro'];
						$level_papers = level_papers($levelname);
						?>
							<div class="col-md-12">
								<h1><?php echo $levelprintname ?> Papers</h1>
								<ul class="list-group">
									<?php
										for($n=0; $n<count($level_papers); $n++){
											$paper = $level_papers[$n];
											$subjname = $level_papers[$n]['name'];
											$papername = $paper['name'];
											$year = $level_papers[$n]['year'];
											?>
												<li class="list-group-item"><a  href="<?php echo strtolower(get_file("papers/get/".stripURL($papername))); ?>"><?php echo $papername; ?></a></li>
											<?php
										}
									?><div class="mt-2"></div>
									<li style="text-align: right"><a class="btn btn-primary" href="<?php echo strtolower(get_file('papers/'.$levelname)) ?>">VIEW MORE</a></li>
								</ul>
							</div>
						<?php

					}
				?>
			</div>
		</div>
	</div>
	<div class="mt-5"></div>
	<!-- <div class="row">
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
									<li style="text-align: right"><a class="btn btn-primary" href="<?php echo get_file('papers/s6'); ?>">VIEW MORE</a></li>
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
	</div> -->
</div>
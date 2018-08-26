<?php
	//Highlighting the menus
	$page_parts = page_parts();
	$pname = $page_parts[0];
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div style="    background: #fd4c01;padding: 12px;color: #fff;">
				<ul class="list-inline pull-right">
					<li class="list-inline-item"><i class="fa fa-phone"></i> +250 788 761 869 /whatsapp</li>
					<li class="list-inline-item"><i class="fa fa-envelope"></i> info@isomo.info</li>
				</ul>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<div class="xs-menu-cont">
		<a id="menutoggle"><i class="fa fa-align-justify"></i> </a>
		<nav class="xs-menu displaynone">
			<ul>
				<li class="<?php echo $pname==''?'active':'' ?>">
					<a href="<?php echo get_file('index'); ?>">Home</a>
				</li>
				<li class="<?php echo $pname=='about'?'active':'' ?>">
					<a href="<?php echo get_file('about'); ?>">About us</a>
				</li>
				<li class="<?php echo $pname=='driving_theory_exams'?'active':'' ?>">
					<a href="<?php echo get_file("driving_theory_exams") ?>">Driving Theory Exams</a>
				</li>
				<li class="<?php echo $pname=='traffic_rules'?'active':'' ?>">
					<a href="<?php echo get_file("traffic_rules") ?>">Amategeko y'umuhanda</a>
				</li>
				<li>
					<a href="#">Scholarships</a>
				</li>
				

			</ul>
		</nav>
	</div>
	<nav class="menu">
		<ul>
			<li class="logo">
	           <a href="<?php echo get_file("") ?>"><img class="logo" src="<?php echo get_file('isomo.jpg'); ?>" /></a>
	        </li>
			<li class="<?php echo ($pname=='' || $pname == 'index')?'active':'' ?>">
				<a href="<?php echo get_file('index'); ?>">Home</a>
			</li>
			<li class="<?php echo $pname=='about'?'active':'' ?>">
				<a href="<?php echo get_file('about'); ?>">About us</a>
			</li>		
			
			<li class="com-menu <?php echo $pname=='papers'?'active':'' ?>">
				<a href="<?php echo get_file('papers') ?>">
					<span>National exams <i class="fa fa-caret-down"></i></span>
				</a>
				<div class="menu-content fadeIn animated">
					<div class="row">
						<div class="col-md-3">
							<span class="left-images">
							<img class="img img-responsive" src="<?php echo get_file("img/exam_qa.jpg") ?>">
							<!-- <p>Most Popular Exam Resources</p> -->
						</div>						
						<div class="col-md-3">
							<span class="categories-list">
								<ul>
									<span>Primary 6</span>
									<?php
										//get promoted subjects in s6
										$s6_subjects = menu_promoted_subjects('s6');
										$n = 0;
										foreach ($s6_subjects as $key => $value) {
											$subjectData = get_subject($value['subject'], 's6');
											echo "<li><a href='/$subjectData[link]'>$subjectData[name]</a></li>";
											$n++;
											if($n>3){
												break;
											}
										}
									?>
									<!-- <li><a href="">Mathematics</a></li>
									<li><a href="<?php echo get_file("papers/p6/english") ?>">English</a></li>
									<li><a href="<?php echo get_file("papers/p6/ikinyarwanda") ?>">Ikinyarwanda</a></li>
									<li><a href="<?php echo get_file("papers/p6") ?>">Science and Elementary Technology</a></li>
									<li><a href="<?php echo get_file("papers/p6") ?>">Social Studies</a></li> -->
									<li><a class="mm-view-more" href="<?php echo get_file("papers/p6") ?>">View more →</a></li>
								</ul>
							</span>							
						</div>
					
						<div class="col-md-3">							
							<span class="categories-list">
								<ul>
									<span>Senior 3</span>
									<?php
										//get promoted subjects in s3
										$s3_subjects = menu_promoted_subjects('s3');
										$n = 0;
										foreach ($s3_subjects as $key => $value) {
											$subjectData = get_subject($value['subject'], 's3');
											echo "<li><a href='/$subjectData[link]'>$subjectData[name]</a></li>";
											$n++;
											if($n>3){
												break;
											}
										}
									?>
									<li><a class="mm-view-more" href="<?php echo get_file("papers/s3") ?>">View more →</a></li>
								</ul>
							</span>							
						</div>
						<div class="col-md-3">
							<span class="categories-list">
								<ul>
									<span>Senior 6</span>
									<?php
										//get promoted subjects in s6
										$s6_subjects = menu_promoted_subjects('s6');
										$n = 0;
										foreach ($s6_subjects as $key => $value) {
											$subjectData = get_subject($value['subject'], 's6');
											echo "<li><a href='/$subjectData[link]'>$subjectData[name]</a></li>";
											$n++;
											if($n>3){
												break;
											}
										}
									?>
									<!-- <li>Mathematics</li>
									<li>Physics</li>
									<li>Geography</li>
									<li>History</li>
									<li>Entrepreneurship</li> -->
								   	<li><a class="mm-view-more" href="<?php echo get_file("papers/s6") ?>">View more →</a></li>
								</ul>
							</span>
						</div>
					</div>
				</div>
			</li>
			<li class="<?php echo $pname=='driving_theory_exams'?'active':'' ?>">
				<a href="<?php echo get_file("driving_theory_exams") ?>">Driving Theory Exams</a>
			</li>
			<li class="<?php echo $pname=='traffic_rules'?'active':'' ?>">
				<a href="<?php echo get_file("traffic_rules") ?>">Amategeko y'umuhanda</a>
			</li>
			<li>
				<a href="#">Scholarships</a>
			</li>
			<li>
				<a href="<?php echo get_file('contact'); ?>">Contact</a>
			</li>
			<li class="pull-right">
				<ul class="list-inline inline">
					<li class="list-inline-item"><a style="text-decoration: none;" href="https://www.facebook.com/isomo.info"><img src="/img/fb_icon.svg" height="32px" /></a></li>
					<li class="list-inline-item"><a style="text-decoration: none;" href="https://twitter.com/Isomo_info"><i class="fa fa-2x fa-twitter"></i></a></li>
				</ul>
			</li>
		</ul>
			
	</nav>

	<?php
		//check if someone just skipped the search module
		if(!empty($skipSearchModule) && $skipSearchModule){

		}else{
	?>
		<div class="row">
			<div class="col-md-12">
				<div class="pull-right mt-2 mb-3" style="z-index: 1">
					<form method="GET" action="/search">
						<div class="input-group">
						  	<input type="text" max="30" min="1" class="form-control" name='q' value="<?php echo retain_input('GET', 'q'); ?>" required="required">
						  	<div class="input-group-append">
						    	<button class="btn btn-primary" type="submit">Search</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	<?php
		}
	?>
</div>
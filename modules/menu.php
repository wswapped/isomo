<?php
	//Highlighting the menus
	$page_parts = page_parts();
	$pname = $page_parts[0];
?>
<div class="container-fluid">
	<div class="xs-menu-cont">
		<a id="menutoggle"><i class="fa fa-align-justify"></i> </a>
		<nav class="xs-menu displaynone">
			<ul>
				<li class="<?php echo $pname==''?'active':'' ?>">
					<a href="<?php echo get_file('index'); ?>">Home</a>
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
				<li class="<?php echo $pname=='about'?'active':'' ?>">
					<a href="<?php echo get_file('about'); ?>">About us</a>
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
			<li class="com-menu <?php echo $pname=='papers'?'active':'' ?>">
				<a href="<?php echo get_file('papers') ?>">
					<span>National exams <i class="fa fa-caret-down"></i></span>
				</a>
				<div class="menu-content fadeIn animated">
					<div class="row">
						<div class="col-md-3">
							<span class="left-images">
							<img class="img img-responsive" src="<?php echo get_file("img/exam_qa.jpg") ?>">
							<p>Most Popular Exam Resources</p>
						</div>						
						<div class="col-md-3">
							<span class="categories-list">
								<ul>
									<span>Primary 6</span>
									<li>Mathematics</li>
									<li>English</li>
									<li>Ikinyarwanda</li>
									<li>Science and Elementary Technology</li>
									<li>Social Studies</li>
									<li><a class="mm-view-more" href="#">View more →</a></li>
								</ul>
							</span>							
						</div>
					
						<div class="col-md-3">
							<span class="categories-list">
								<ul>
									 <span>Senior 3</span>
										<li>Mathematics</li>
										<li>Physics</li>
										<li>Geography</li>
										<li>History</li>
										<li>Entrepreneurship</li>
										<li><a class="mm-view-more" href="#">View more →</a></li>
								</ul>
							</span>							
						</div>
						<div class="col-md-3">
							<span class="categories-list">
								<ul>
									<span>Senior 6</span>
									<li>Mathematics</li>
									<li>Physics</li>
									<li>Geography</li>
									<li>History</li>
									<li>Entrepreneurship</li>
								   	<li><a class="mm-view-more" href="#">View more →</a></li>
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
			<li class="<?php echo $pname=='about'?'active':'' ?>">
				<a href="<?php echo get_file('about'); ?>">About us</a>
			</li>
			
			<!-- <li>
				<a href="<?php echo get_file('contact'); ?>">Contact</a>
			</li> -->
		</ul>
	</nav>
</div>
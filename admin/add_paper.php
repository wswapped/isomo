<?php
	include_once 'setup.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		$title = "Add paper";
		include_once 'modules/head.php';
		$languages = array('kin'=>'Ikinyarwanda', 'en'=>'English', 'fr'=>'France');
	?>

	<!-- plugins -->
	<link rel="stylesheet" type="text/css" href="asset/css/plugins/datatables.bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="asset/css/plugins/animate.min.css"/>
	<link href="asset/css/style.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="asset/css/plugins/select2.min.css"/>
	<link rel="stylesheet" type="text/css" href="asset/css/plugins/summernote.css"/>
	<!-- end: Css -->
</head>

<body id="mimin" class="dashboard">
			<!-- start: Header -->
				<?php include "modules/menu.php" ?>
			<!-- end: Header -->

			<div class="container-fluid mimin-wrapper">
	
					<!-- start:Left Menu -->
						<div id="left-menu">
							<?php
								include 'sidebar.php';
							?>
						</div>
					<!-- end: Left Menu -->


						<!-- start: Content -->
						<div id="content">
							 <div class="panel box-shadow-none content-header">
									<div class="panel-body">
										<div class="col-md-12">
												<h3 class="animated fadeInLeft">Add Paper</h3>
												<p class="animated fadeInDown">
													Provide information for new paper
												</p>
										</div>
									</div>
							</div>
							<div class="col-md-12 top-20 padding-0">
								<div class="col-md-12">
									<div class="panel">
										<?php
											$paper_type = $_GET['type']??"";
											
											$papers_conf = array('ne'=>'national_exams', 'dte'=>'driving_exam', 'tr'=>'traffic_rules');

											$cat_papers = category_papers($papers_conf[$paper_type]);
											$paper_cat = $papers_conf[$paper_type];
											$paper_cat_name = ucfirst(str_ireplace("_", " ", $paper_cat));

										?>
										<div class="panel-heading"><h3><?php echo $paper_cat_name; ?></h3></div>
										<div class="panel-body">
											<form class="cmxform" id="signupForm" method="POST" action="<?php echo $_SERVER['REQUEST_URI'] ?>" novalidate="novalidate">
													<div class="col-md-6">

														<?php
														//checking form submission
														if($_SERVER['REQUEST_METHOD'] == 'POST'){

															$subt = $_POST['subt']??"";
															if($subt == 'ne'){
																//National exam submission
																$raw_subject = explode(" ", $_POST['subject']??" ");
																$level = $raw_subject[0];
																$subject = $raw_subject[1];
																$year = $_POST['year']??"";
																
																$name = $_POST['papername']??"";

																$paper_content = $_POST['paper'];

																$answer_content = $_POST['paper'];

																//saving paper into file
																$filename = "papers/".time().".html";
																$file = fopen("../".$filename, "w+");
																fwrite($file, $paper_content);

																$sql = "INSERT INTO papers(subject, level, name, year, file) VALUES (\"$subject\", \"$level\", \"$name\", \"$year\", \"$filename\")";


																//putting in the database
																$query = $db->query($sql);

																if($query){
																	//Checking if answers were set
																	if(strlen($answer_content)>10){
																		//attach answers to the paper
																		addAnswerPaper($db->insert_id, $answer_content);
																	}
																	?>
																		<p class="text-success">Paper submitted successfully</p>
																	<?php
																}else{
																	?>
																		<p class="text-warning">Error submitting paper <?php echo $db->error; ?></p>
																	<?php
																}

															}else{
																
																//paper category
																$pcat = $papers_conf[$subt];

																//Other papers submission
																$name = $_POST['papername']??"";													

																$paper_content = $_POST['paper'];

																$answer_content = $_POST['paper'];

																//paper lamguage
																$language = $_POST['language']??"";

																//get subject ID
																$subjq = $db->query("SELECT S.* FROM subjects S JOIN subject_type T ON S.type = T.id WHERE T.name = '$pcat' AND S.language = \"$language\"  ") or trigger_error($conn->error);
																$subjData = $subjq->fetch_assoc();

																$subject = $subjData['id'];

																//saving paper into file
																$filename = "papers/".time().".html";
																$file = fopen('../'.$filename, "w+");
																fwrite($file, $paper_content);

																$sql = "INSERT INTO papers(subject, name, file) VALUES (\"$subject\", \"$name\",\"$filename\")";

																//putting in the database
																$query = $db->query($sql);

																if($query){
																		//Checking if answers were set
																		if(strlen($answer_content)>10){
																			//attach answers to the paper
																			addAnswerPaper($db->insert_id, $answer_content);
																		}
																	?>
																		<p class="text-success">Paper submitted successfully</p>
																	<?php
																}else{
																	?>
																		<p class="text-warning">Error submitting paper <?php echo $db->error; ?></p>
																	<?php
																}
															}
														}
														

														//subject types and subject
														$query = $db->query("SELECT *, s.name as subjectname FROM subjects as s JOIN subject_levels as l ON s.id  = l.subject ") or die("Error $db->error");
														$subj = array();
														while ($data = $query->fetch_assoc()) {
															$subj[$data['level']][] = $data;                          
														}
														?>

														<div class="form-group">
															<label class="control-label text-right">Paper name</label>
															<div class=""><input type="text" name="papername" class="form-control" id="papername" ></div>
														</div>

														<?php
															if($paper_type == 'ne'){
																?>
																<div class="form-group">
																	<select class="select2-A" id="selectSubject" name="subject">
																		<?php
																			foreach ($subj as $key => $subjects ) {
																				$nelevel = $key;
																				?>
																					<optgroup label="<?php echo $key; ?>">
																						<?php
																							foreach ($subjects as $key => $subj_det) {
																								echo "<option value='$nelevel $subj_det[id]' data-name='$nelevel $subj_det[subjectname]'>$subj_det[subjectname]</option>";
																							}
																						?>
																					</optgroup>
																				<?php
																			}
																		?>
																	</select>
																	<input type="hidden" name="subt" value="<?php echo $paper_type; ?>">
																	<input type="hidden" id="papertype" value="<?php echo $paper_type; ?>">
																</div>
																<div class="form-group form-cond" data-for="national_exams" data-role='year'>
																	<label for="fileup">Paper year</label>
																	<input type="number" min="1900" max="<?php echo date('Y'); ?>" name="year" class="form-control" id="examYearInput" placeholder="year" required="required">
																</div>
																<?php
															}else{
																?>
																	<div class="form-group">
																		<label for="selectLanguage" class="block">Language</label>
																		<select class="select2-A" id="selectLanguage" name="language">
																			<option value="kin">Ikinyarwanda</option>
																			<option value="fr">French</option>
																			<option value="en">English</option>
																		</select>
																		<input type="hidden" name="subt" value="<?php echo $paper_type; ?>">
																		<input type="hidden" id="papertype" value="<?php echo $paper_type; ?>">
																	</div>
																<?php
															}
														?>

														
														<div class="form-group">
															<label for="selectLanguage" class="block">Question sheet</label>
															<textarea name="paper" id="paperContEdit" placeholder="Type in your paper question" required="required"></textarea>  
														</div>

														<div class="form-group">
															<label for="selectLanguage" class="block">Answers sheet</label>
															<textarea name="answers" class="paperEdit" id="paperContEdit" placeholder="Type Your Message.." required="required"></textarea>  
														</div>
													</div>
													
															 
													<div class="col-md-12">
														<div class="form-group form-animate-checkbox">
																<input type="checkbox" class="checkbox valid" id="validate_agree" name="validate_agree" aria-required="true" aria-describedby="validate_agree-error">
																<label>Please agree to our policy</label>
															<em id="validate_agree-error" class="error"></em>
														</div>
														<input class="submit btn btn-danger" type="submit" value="Submit">
													</div>
											</form>

										</div>
								</div>
							</div>  
							</div>
						</div>
					<!-- end: content --> 

					
			</div>

			<!-- start: Mobile -->
			<button id="mimin-mobile-menu-opener" class="animated rubberBand btn btn-circle btn-danger">
				<span class="fa fa-bars"></span>
			</button>

			 <!-- end: Mobile -->

<!-- start: Javascript -->
<script src="asset/js/jquery.min.js"></script>
<script src="asset/js/jquery.ui.min.js"></script>
<script src="asset/js/bootstrap.min.js"></script>



<!-- plugins -->
<script src="asset/js/plugins/moment.min.js"></script>
<script src="asset/js/plugins/jquery.datatables.min.js"></script>
<script src="asset/js/plugins/datatables.bootstrap.min.js"></script>
<script src="asset/js/plugins/jquery.nicescroll.js"></script>
<script src="asset/js/plugins/select2.full.min.js"></script>
<script src="asset/js/plugins/summernote.min.js"></script>

<script src="asset/js/plugins/tinymce/tinymce.min.js"></script>
<!-- <script type="text/javascript" src="js/"></script> -->

<!-- custom -->
<script type="text/javascript" src="asset/js/js.js"></script>
<script src="asset/js/main.js"></script>
<script type="text/javascript">

	$(document).ready(function(){
		$('#datatables-example').DataTable();
	});

	$(".select2-A").select2({
		placeholder: "Select a subject",
		allowClear: true
	});

	//JS for paper addition
	const papertype = $("#papertype").val()
	if(papertype == 'ne'){
		$("#examYearInput").on('keyup', function(){
			var examYear = $(this).val();

			//checking if the year is completed
			if(examYear.toString().length == 4){
				//get subject
				var subject = $('#selectSubject').val();
				subjname = $('#selectSubject option:selected').data('name')

				$("input#papername").val(subjname+" "+examYear)
				
			}
		})

		//Check the subject
		$("#selectSubject").on('change', function(){
			$("#examYearInput").trigger('keyup')
			return true;
		})

		//Limiting more inout
		$("#examYearInput").on('keypress', function(){
			var examYear = $(this).val();
			if(examYear.toString().length+1>4){				
				return false;
			}
		});
	}

	

	$("#examYearInput").on('keyup', function(){
		value = $(this).val();

		//limiting number of chars
		if(value.toString().length>4){
			return false;
		}
	})

	// tinymce.init({
	//   selector: '#paperContEdit',
	//   menubar: false,  // removes the menubar
	//   image_advtab: true,
	// });

	$('#paperContEdit').summernote({
		height: 400
	});

	$('.paperEdit').summernote({
		height: 400
	});

</script>
<!-- end: Javascript -->
</body>
</html>